<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Card;
use App\Collection;
use App\LicenceFee;
use App\LicenceOwner;
use App\LicenceResponse;
use App\LicenceType;
use App\LicenceVersion;
use App\Transaction;
use App\TransactionDocument;
use app\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Mail;

class TransactionAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ownerUser($transaction, $usersList, $ownersList)
    {
        if (isset($transaction->licence_owner_id)) {

            foreach ($ownersList as $owner) {
                if ($owner->id == $transaction->licence_owner_id) {
                    $ownerUser = $owner;
                    break;
                }
            }

            if ($ownerUser->last_name != '') {
                $ownerCategory = 1;//physical Owner
            } else {
                $ownerCategory = 2;//entreprise Owner
            }
        } else {
            foreach ($usersList as $user) {
                if ($user->id == $transaction->user_id) {
                    $ownerUser = $user;
                    break;
                }
            }
            $ownerCategory = 3;//user
        }

        return array($ownerUser, $ownerCategory);
    }

    public function transactionList()
    {
        $usersList = User::all();
        $ownersList = LicenceOwner::all();
        $transactions = DB::table('transactions')
            ->join('licence_types', 'transactions.licence_type_id', '=', 'licence_types.id')
            ->join('transactions_documents', 'transactions.id', '=', 'transactions_documents.transaction_id')
            ->selectraw('transactions.id, transactions.created_at, transactions.accepted_date, transactions.refusal_date, transactions.paid_date, transactions.licence_owner_id, transactions.user_id, licence_types.name_fr, count(transactions_documents.transaction_id) as countDoc')
            ->groupBy('transactions.id')->get();


        foreach ($transactions as $transaction) {
            $ownerOrUser = $this->ownerUser($transaction, $usersList, $ownersList);
            $ownerOrUserCategory = $ownerOrUser[1];
            if ($ownerOrUserCategory == 1) {
                $licenceOwner = $ownerOrUser[0]->first_name . ' ' . $ownerOrUser[0]->last_name;
            } elseif ($ownerOrUserCategory == 2) {
                $licenceOwner = $ownerOrUser[0]->enterprise;
            } elseif ($ownerOrUserCategory == 3) {
                $licenceOwner = $ownerOrUser[0]->first_name . ' ' . $ownerOrUser[0]->last_name;
            }
            $licenceOwners[] = $licenceOwner;
        }
        return view('transactionAdmin.transactionList', compact('transactions', 'licenceOwners'));
    }

    public function transactionView($id)
    {
        $id = \Crypt::decrypt($id);

        $transactionDocuments = Transaction::where('transactions.id', $id)
            ->join('transactions_documents', 'transactions.id', '=', 'transactions_documents.transaction_id')
            ->join('documents', 'transactions_documents.document_id', '=', 'documents.id')
            ->select('transactions.user_id', 'transactions.licence_owner_id', 'transactions.comment_user', 'transactions.comment_admin',
                'documents.file_name')
            ->get();

        if (isset($transactionDocuments[0]->licence_owner_id)) {

            $ownerOrUser = LicenceOwner::where('id', $transactionDocuments[0]->licence_owner_id)->firstOrFail();
            if ($ownerOrUser->last_name != '') {
                $ownerOrUserCategory = 1;//physical Owner
            } else {
                $ownerOrUserCategory = 2;//entreprise Owner
            }
        } else {

            $ownerOrUser = User::where('id', $transactionDocuments[0]->user_id)->firstOrFail();
            $ownerOrUserCategory = 3;//user
        }


        $transactionAdminComment = $transactionDocuments[0]->comment_admin;
        $transactionClientComment = $transactionDocuments[0]->comment_user;

        $collections = array();
        $collectionCodes = array();
        foreach ($transactionDocuments as $document) {
            $temp = explode('_', $document->file_name);
            $collectionCodes[] = $temp[0];
            $collection = Collection::where('code', $temp[0])->first();
            $collections[] = $collection->code . " - " . $collection->name;
        }

        if ($ownerOrUserCategory == 1) {
            $licenceOwner = $ownerOrUser;
            $ownerUserInfos[] = 'Propriétaire';
            $ownerUserInfoTitle[] = 'Catégorie';

            $ownerUserInfos[] = $licenceOwner->first_name . ' ' . $licenceOwner->last_name;
            $ownerUserInfoTitle[] = 'Nom';

            $ownerUserInfos[] = $licenceOwner->address;
            $ownerUserInfoTitle[] = 'Adresse';

            $ownerUserInfos[] = $licenceOwner->province;
            $ownerUserInfoTitle[] = 'Province';

            $ownerUserInfos[] = $licenceOwner->country;
            $ownerUserInfoTitle[] = 'Pays';

            $ownerUserInfos[] = $licenceOwner->postal_code;
            $ownerUserInfoTitle[] = 'Code postal';

            $ownerUserInfos[] = $licenceOwner->phone;
            $ownerUserInfoTitle[] = 'Phone';

            $ownerUserInfos[] = $licenceOwner->email;
            $ownerUserInfoTitle[] = 'Email';
        } elseif ($ownerOrUserCategory == 2) {
            $licenceOwner = $ownerOrUser;
            $ownerUserInfos[] = 'Entreprise';
            $ownerUserInfoTitle[] = 'Catégorie';

            $ownerUserInfos[] = $licenceOwner->enterprise;
            $ownerUserInfoTitle[] = 'Nom';

            $ownerUserInfos[] = $licenceOwner->address;
            $ownerUserInfoTitle[] = 'Adresse';

            $ownerUserInfos[] = $licenceOwner->province;
            $ownerUserInfoTitle[] = 'Province';

            $ownerUserInfos[] = $licenceOwner->country;
            $ownerUserInfoTitle[] = 'Pays';

            $ownerUserInfos[] = $licenceOwner->postal_code;
            $ownerUserInfoTitle[] = 'Code postal';

            $ownerUserInfos[] = $licenceOwner->phone;
            $ownerUserInfoTitle[] = 'Phone';

            $ownerUserInfos[] = $licenceOwner->email;
            $ownerUserInfoTitle[] = 'Email';
        } elseif ($ownerOrUserCategory == 3) {
            $licenceOwner = $ownerOrUser;
            $ownerUserInfos[] = 'Utilisateur';
            $ownerUserInfoTitle[] = 'Catégorie';

            $ownerUserInfos[] = $licenceOwner->first_name . ' ' . $licenceOwner->last_name;
            $ownerUserInfoTitle[] = 'Nom';

            $ownerUserInfos[] = $licenceOwner->address;
            $ownerUserInfoTitle[] = 'Adresse';

            $ownerUserInfos[] = $licenceOwner->province;
            $ownerUserInfoTitle[] = 'Province';

            $ownerUserInfos[] = $licenceOwner->country;
            $ownerUserInfoTitle[] = 'Pays';

            $ownerUserInfos[] = $licenceOwner->postal_code;
            $ownerUserInfoTitle[] = 'Code postal';

            $ownerUserInfos[] = $licenceOwner->phone;
            $ownerUserInfoTitle[] = 'Phone';

            $ownerUserInfos[] = $licenceOwner->email;
            $ownerUserInfoTitle[] = 'Email';
        }

        $licenceResponses = LicenceResponse::where('transaction_id', $id)
            ->join('licence_attributes', 'licence_responses.licence_attribute_id', '=', 'licence_attributes.id')
            ->select('licence_responses.*',
                'licence_attributes.*')
            ->get();
        return view('transactionAdmin.transaction', compact('id', 'transactionDocuments', 'licenceResponses', 'collections', 'collectionCodes',
            'ownerUserInfos', 'ownerUserInfoTitle', 'transactionAdminComment', 'transactionClientComment'));
    }

    public function acceptTransaction($id, Request $request)
    {
        $id = \Crypt::decrypt($id);
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        $billType = Input::get('billType');

        $transaction = Transaction::where('id', $id)->firstOrFail();
        $transaction->accepted_date = $dateTime;
        $transaction->refusal_date = null;
        $transaction->paid_date = null;
        if ($billType == 'private') {
            $transaction->price_type_id = 0;
        } elseif ($billType == 'public') {
            $transaction->price_type_id = 1;
        }
        $transaction->comment_admin = $request->commentAdmin;
        $transaction->save();

        $user = User::where('id', $transaction->user_id)->first();
        $this->sendTransactionPaymentRequestMail($user, $transaction);

        return redirect::to('transactionList');
    }

    public function refuseTransaction($id, Request $request)
    {
        $id = \Crypt::decrypt($id);
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');;

        $transaction = Transaction::where('id', $id)->first();
        $transaction->accepted_date = null;
        $transaction->refusal_date = $dateTime;
        $transaction->paid_date = null;
        $transaction->price_type_id = null;
        $transaction->comment_admin = $request->commentAdmin;
        $transaction->save();

        $user = User::where('id', $transaction->user_id)->first();

        $this->sendTransactionRefusedMail($user, $transaction);

        return redirect::to('transactionList');
    }

    public function payTransaction($id, Request $request)
    {
        $id = \Crypt::decrypt($id);
        $dateTime = Carbon::now('America/Toronto')->format('Y-m-d H:i');
        $billType = (isset($_POST['billType']) ? $_POST['billType'] : null);

        $transaction = Transaction::where('id', $id)->firstOrFail();
        if ($transaction->accepted_date == null) {
            $transaction->accepted_date = $dateTime;
        }

        $transaction->refusal_date = null;
        $transaction->paid_date = $dateTime;

        if ($billType == 'private') {
            $transaction->price_type_id = 0;
        } elseif ($billType == 'public') {
            $transaction->price_type_id = 1;
        }
        $transaction->comment_admin = $request->commentAdmin;
        $transaction->save();

        return redirect::to('transactionList');
    }

    public function sendTransactionRefusedMail($user, $transaction)
    {
        Mail::send('emails.transactionRefused', [
            'user' => $user,
            'transaction' => $transaction,
        ],
            function ($message) use ($user) {
                $message->to($user->email)->subject('Commande refusée - Société d\'Histoire de Sherbrooke');
            }
        );
    }

    public function sendTransactionPaymentRequestMail($user, $transaction)
    {
        Mail::send('emails.transactionPaymentRequest', [
            'user' => $user,
            'transaction' => $transaction,
        ],
            function ($message) use ($user, $transaction) {
                // Setting the variables
                $id = $transaction->id;
                $licenceType = LicenceType::where('id', $transaction->licence_type_id)->firstOrFail();
                $licenceVersion = LicenceVersion::where('id', $transaction->licence_version_id)->firstOrFail();
                $transactionDocuments = TransactionDocument::where('transaction_id', $id)
                    ->join('documents', 'transactions_documents.document_id', '=', 'documents.id')
                    ->select('transactions_documents.document_id', 'documents.file_name', 'documents.card_id')
                    ->get();
                if ($transaction->licence_owner_id != null) {
                    $licenceOwner = LicenceOwner::where('id', $transaction->licence_owner_id)->first();

                } else {
                    $licenceOwner = User::where('id', $transaction->user_id)->first();;
                }
                $licenceFees = LicenceFee::where('id', $transaction->licence_fee_id)->firstOrFail();
                if ($transaction->price_type_id == '0') {
                    $utilisationType = 'public';
                } elseif ($transaction->price_type_id == '1') {
                    $utilisationType = 'private';
                } else {
                    $utilisationType = 'NULL';
                }

                $licenceResponses = LicenceResponse::where('transaction_id', $id)
                    ->join('licence_attributes', 'licence_responses.licence_attribute_id', '=', 'licence_attributes.id')
                    ->select('licence_responses.value', 'licence_attributes.name_fr')
                    ->get();

                $collectionName = array();
                foreach ($transactionDocuments as $transactionDocument) {
                    $collectionId = Card::where('id', $transactionDocument->card_id)->firstOrFail();
                    $collectionName[] = Collection::where('id', $collectionId->collection_id)->firstOrFail();
                }

                // Generate licence pdf for mail
                $licenceRoot = view('transactionClient.generateLicence')->with(compact('id', 'licenceOwner', 'transactionDocuments', 'licenceType', 'licenceVersion', 'transaction'))->render();

                $dompdfLicence = new Dompdf();
                $dompdfLicence->loadHtml($licenceRoot);
                $dompdfLicence->setPaper('A4', 'portrait');
                $dompdfLicence->render();

                $factureRoot = view('transactionClient.generateFacture')->with(compact('id', 'collectionName', 'licenceType', 'transactionDocuments', 'licenceOwner', 'licenceResponses', 'utilisationType', 'licenceFees', 'transaction'))->render();

                // Generate facture pdf for mail
                $dompdfFacture = new Dompdf();
                $dompdfFacture->loadHtml($factureRoot);
                $dompdfFacture->setPaper('A4', 'portrait');
                $dompdfFacture->render();

                // Send mail
                $message->to($user->email)->subject('Commande acceptée/Demande de paiement - Société d\'Histoire de Sherbrooke');
                $message->attachData($dompdfLicence->output(), "Licence - La Société d'histoire de Sherbrooke - Commande " . $transaction->licence_type_id . ".pdf");
                $message->attachData($dompdfFacture->output(), "Facture - La Société d'histoire de Sherbrooke - Commande " . $transaction->licence_type_id . ".pdf");
            }
        );
    }
}
