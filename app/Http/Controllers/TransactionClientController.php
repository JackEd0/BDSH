<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Card;
use App\Collection;
use App\ExternalParameter;
use App\LicenceFee;
use App\LicenceOwner;
use App\LicenceResponse;
use App\LicenceType;
use App\LicenceVersion;
use App\Transaction;
use App\TransactionDocument;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Dompdf\Dompdf;

class TransactionClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transactionList()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)
            ->join('licence_types', 'transactions.licence_type_id', '=', 'licence_types.id')
            ->join('transactions_documents', 'transactions.id', '=', 'transactions_documents.transaction_id')
            ->selectraw('transactions.id, transactions.created_at, transactions.accepted_date, transactions.paid_date, transactions.cancelled_date, transactions.refusal_date, licence_types.name_fr, count(transactions_documents.transaction_id) as countDoc')
            ->groupBy('transactions.id')->get();
        return view('transactionClient.transactionList', compact('transactions'));
    }

    public function transactionView($id)
    {
        $id = \Crypt::decrypt($id);
        $user = Auth::user();
        $transaction = Transaction::where('transactions.id', $id)
            ->join('licence_types', 'transactions.licence_type_id', '=', 'licence_types.id')
            ->join('licence_versions', 'transactions.licence_version_id', '=', 'licence_versions.id')
            ->join('licence_fees', 'transactions.licence_fee_id', '=', 'licence_fees.id')
            ->select('licence_types.name_fr as licenceType',
                'licence_versions.terms as licenceName',
                'licence_fees.*',
                'transactions.*')
            ->first();
        $licenceResponses = LicenceResponse::where('transaction_id', $id)
            ->join('licence_attributes', 'licence_responses.licence_attribute_id', '=', 'licence_attributes.id')
            ->select('licence_responses.value', 'licence_attributes.name_fr')
            ->get();
        $transactionDocuments = TransactionDocument::where('transaction_id', $id)
            ->join('documents', 'transactions_documents.document_id', '=', 'documents.id')
            ->select('transactions_documents.document_id', 'documents.file_name', 'documents.card_id')
            ->get();
        $paypalEmail = ExternalParameter::all()->sortByDesc('id')->first();

        if ($transaction->price_type_id == '0') {
            $utilisationType = 'private';
        } elseif ($transaction->price_type_id == '1') {
            $utilisationType = 'public';
        } else {
            $utilisationType = NULL;
        }
        $licenceFees = LicenceFee::where('id', $transaction->licence_fee_id)->firstOrFail();

        foreach ($transactionDocuments as $transactionDocument) {
            $collectionName[] = Card::where('cards.id', $transactionDocument->card_id)
                ->join('collections', 'cards.collection_id', '=', 'collections.id')
                ->select('collections.code as code', 'collections.name as name')->first();
        }

        if ($transaction->licence_owner_id != null) {
            $licenceOwner = LicenceOwner::where('id', $transaction->licence_owner_id)->first();
        } else {
            $licenceOwner = "0";
        }
        $created = new Carbon($transaction->paid_date);
        $now = Carbon::now('America/Toronto');
        $difference = ($created->diff($now)->days);

        if (($transaction->paid_date != null) && ($transaction->accepted_date != null) && ($difference < 21) && ($transaction->refusal_date == null)) {
            $canDownload = 1;
        } else {
            $canDownload = 0;
        }
        if (($transaction->paid_date == null) && ($transaction->accepted_date != null) && ($transaction->refusal_date == null)) {
            $canPay = 1;
        } else {
            $canPay = 0;
        }
        if (($transaction->accepted_date != null) && ($transaction->refusal_date == null)) {
            $canFacture = 1;
        } else {
            $canFacture = 0;
        }

        return view('transactionClient.transactionView', compact('id', 'collectionName', 'utilisationType', 'licenceFees', 'transaction', 'transactionDocuments', 'licenceOwner', 'licenceResponses', 'canDownload', 'canPay', 'canFacture', 'paypalEmail', 'user'));
    }

    public function transactionCheck()
    {
        //données retournées par paypal :
        $id = Input::get('custom'); // id de la commande
        $itemName = Input::get('item_name'); // nom de la commande: "Commande SHS numéro ..."
        $paymentStatus = Input::get('payment_status'); // status de la commande : Confirmed ...
        $currency = Input::get('mc_currency'); // devise du paiement
        $payedPrice = Input::get('mc_gross'); //prix du paiement
        $transactionNumber = Input::get('txn_id'); // numéro de transaction
        $receiverEmail = Input::get('receiver_email'); // email ayant reçu le paiement
        $payerEmail = Input::get('payer_email'); // email de l'acheteur

        $paypalEmail = ExternalParameter::all()->sortByDesc('id')->first();
        $transaction = Transaction::where('transactions.id', $id)
            ->join('licence_fees', 'transactions.licence_fee_id', '=', 'licence_fees.id')
            ->select('licence_fees.*', 'transactions.price_type_id')->first();
        $documentCount = TransactionDocument::where('transaction_id', $id)
            ->join('documents', 'transactions_documents.document_id', '=', 'documents.id')
            ->select('transactions_documents.document_id', 'documents.file_name', 'documents.card_id')
            ->count();
        if ($transaction->price_type_id == '1') {
            $realPrice = (($transaction->public_use) * $documentCount) + ($transaction->admin);
            //  echo $transaction->public_use;
        } else {
            $realPrice = (($transaction->private_use) * $documentCount) + ($transaction->admin);
            //  echo $transaction->private_use;
        }
        //       echo $documentCount;
        //      echo $transaction->price_type_id;
        $totalRealPrice = $realPrice + ($realPrice * (($transaction->tps) / 100)) + ($realPrice * ($transaction->tvq) / 100) + ($transaction->admin);
        $totalRealPriceFormated = number_format($totalRealPrice, 2);

        if ($id == NULL)
            $error_payment = "no_id";
        elseif ($paymentStatus != "Completed")
            $error_payment = "not_completed";
        elseif ($currency != "CAD")
            $error_payment = "not_CAD";
        elseif ($transactionNumber == NULL)
            $error_payment = "no_transaction";
        elseif ($receiverEmail != $paypalEmail->email)
            $error_payment = "wrong_receiver";
        elseif ($payedPrice == $totalRealPriceFormated) {
            Transaction::where('id', $id)
                ->update(
                    ['paid_date' => Carbon::now('America/Toronto')->format('Y-m-d H:i'),
                        'payer_email' => $payerEmail,
                        'paypal_id' => $transactionNumber]);
            $error_payment = "no_error";
        } else {
            $error_payment = "global_error";
        }

        return view('transactionClient.transactionCheck', compact('id', 'error_payment', 'itemName', 'paymentStatus', 'payedPrice', 'transactionNumber', 'receiverEmail', 'payerEmail', 'currency'));
    }

    public function generateFacturePDF($id)
    {
        $id = \Crypt::decrypt($id);
        $dompdf = new Dompdf();
        $transaction = Transaction::where('transactions.id', $id)
            ->join('licence_types', 'transactions.licence_type_id', '=', 'licence_types.id')
            ->join('licence_fees', 'transactions.licence_fee_id', '=', 'licence_fees.id')
            ->select('licence_types.name_fr as licenceType',
                'licence_fees.*',
                'transactions.*')
            ->first();
        $transactionDocuments = TransactionDocument::where('transaction_id', $id)
            ->join('documents', 'transactions_documents.document_id', '=', 'documents.id')
            ->select('transactions_documents.document_id', 'documents.file_name', 'documents.card_id')
            ->get();
        foreach ($transactionDocuments as $transactionDocument) {
            $collectionName[] = Card::where('cards.id', $transactionDocument->card_id)
                ->join('collections', 'cards.collection_id', '=', 'collections.id')
                ->select('collections.name as name')->first();
        }
        if ($transaction->licence_owner_id != null) {
            $licenceOwner = LicenceOwner::where('id', $transaction->licence_owner_id)->firstOrFail();

        } else {
            $licenceOwner = User::where('id', $transaction->user_id)->firstOrFail();
        }
        $factureRoot = view('transactionClient.generateFacture')->with(compact('id', 'collectionName', 'licenceType', 'transactionDocuments', 'licenceOwner', 'licenceFees', 'transaction'))->render();
        $dompdf->loadHtml($factureRoot);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('facture');
    }

    public function generateLicencePDF($id)
    {
        $id = \Crypt::decrypt($id);
        $dompdf = new dompdf();
        $transaction = Transaction::where('transactions.id', $id)
            ->join('licence_types', 'transactions.licence_type_id', '=', 'licence_types.id')
            ->join('licence_versions', 'transactions.licence_version_id', '=', 'licence_versions.id')
            ->select('licence_types.name_fr as licenceType',
                'licence_versions.terms as licenceName',
                'transactions.created_at',
                'transactions.*')
            ->first();
        $transactionDocuments = TransactionDocument::where('transaction_id', $id)
            ->join('documents', 'transactions_documents.document_id', '=', 'documents.id')
            ->select('transactions_documents.document_id', 'documents.file_name', 'documents.card_id')
            ->get();

        if ($transaction->licence_owner_id != null) {
            $licenceOwner = LicenceOwner::where('id', $transaction->licence_owner_id)->firstOrFail();

        } else {
            $licenceOwner = User::where('id', $transaction->user_id)->firstOrFail();
        }
        $licenceRoot = view('transactionClient.generateLicence')->with(compact('id', 'licenceOwner', 'transactionDocuments', 'transaction'))->render();
        $dompdf->loadHtml($licenceRoot);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('licence');
    }

    public function cancelTransaction()
    {
        $id = Input::get('idTransaction');
        if ($id != NULL) {
            $id = \Crypt::decrypt($id);
            Transaction::where('id', $id)->update(['cancelled_date' => Carbon::now('America/Toronto')->format('Y-m-d H:i')]);
        }
        return redirect()->route('transactionClient.transactionList');
    }
}