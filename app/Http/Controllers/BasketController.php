<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Document;
use App\LicenceAttribute;
use App\LicenceAttributeType;
use App\LicenceFee;
use App\LicenceType;
use App\LicenceResponse;
use App\LicenceVersion;
use App\Transaction;
use App\TransactionDocument;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Dompdf\Exception;
use Mail;


class BasketController extends Controller
{
    public function __construct()
    {
        //    $this->middleware('auth');
    }

    public function visualise(Request $request)
    {
        $licenceAttributeTypes = LicenceAttributeType::all();
        $licenceTypes = LicenceType::all();
        $licenceAttributes = LicenceAttribute::all();
        $licences = LicenceVersion::all()->sortByDesc('version')->first();

        return view('basket.visualise',
            compact('licenceAttributes', 'licenceTypes', 'licences', 'licenceAttributeTypes'))
            ->with('cookie', $request->cookie('basket'));
    }

    protected function transaction()
    {
        if (Auth::check()) {
            //***** TABLE TRANSACTION *****//
            $user_id = Auth::user()->id;
            $createdDate = Carbon::now('America/Toronto');
            $licence_type_id = Input::get('use');
            $licence_version_id = LicenceVersion::whereRaw('id = (select max(`id`) from licence_versions)')->first();
            $fees_version_id = LicenceFee::whereRaw('id = (select max(`id`) from licence_fees)')->first();
            $comment_user = Input::get('comment_user');

            $insertTransaction = Transaction::create([
                'user_id' => $user_id,
                'created_at' => $createdDate,
                'licence_type_id' => $licence_type_id,
                'licence_version_id' => $licence_version_id->id,
                'licence_fee_id' => $fees_version_id->id,
                'comment_user' => $comment_user,
            ]);
            //***** TABLE LICENCE_RESPONSES *****//
            $transaction_id = $insertTransaction->id;
            $licenceAttributeTypes = LicenceAttributeType::where('licence_type_id', '=', $licence_type_id)->get();
            $valuesAttributes = array();
            foreach ($licenceAttributeTypes as $licenceAttributeType) {
                $valuesAttributes[] = Input::get($licenceAttributeType->licence_attribute_id);
                LicenceResponse::create([
                    'transaction_id' => $transaction_id,
                    'licence_attribute_id' => $licenceAttributeType->id,
                    'value' => Input::get($licenceAttributeType->licence_attribute_id),
                ]);
            }
            //***** TABLE TRANSACTION_DOCUMENTS *****//
            $documentsFiles = Input::get('documents');
            foreach (unserialize($documentsFiles) as $documentFile) {
                $id_doc = Document::where('file_name', '=', $documentFile)->first();
                TransactionDocument::create([
                    'document_id' => $id_doc->id,
                    'transaction_id' => $transaction_id,
                ]);
            }
            //***** TABLE LICENCE_OWNER *****//
            $enterprise = Input::get('enterprise');
            $firstname = Input::get('firstname');
            $lastname = Input::get('lastname');
            $mail = Input::get('mail');
            $address = Input::get('address');
            $city = Input::get('city');
            $province = Input::get('province');
            $postalcode = Input::get('postalcode');
            $country = Input::get('country');
            $phone = Input::get('phone');

            if (($enterprise != NULL) || (($firstname != NULL) && ($lastname != NULL))) {
                LicenceOwner::create([
                    'last_name' => $lastname,
                    'first_name' => $firstname,
                    'enterprise' => $enterprise,
                    'email' => $mail,
                    'address' => $address,
                    'town' => $city,
                    'postal_code' => $postalcode,
                    'province' => $province,
                    'country' => $country,
                    'phone' => $phone,
                ]);
            }
            $cookie = Cookie::queue(Cookie::forget('basket'));
            $this->sendTransactionConfirmationMail(Auth::user(), $transaction_id);
            $this->sendNewTransactionAlertMail($transaction_id);
            return view('basket.transaction',
                compact('user_id', 'licence_type_id', 'licence_version_id', 'fees_version_id', 'valuesAttributes', 'documentsFiles', 'transaction_id'))
                ->withCookie($cookie);
        } else {
            return view('auth.login');
        }
    }

    public function sendTransactionConfirmationMail($user, $transaction_id)
    {
        Mail::send('emails.transactionConfirmation', [
            'user' => $user,
            'transaction_id' => $transaction_id,
        ],
            function ($message) use ($user) {
                $message->to($user->email)->subject('Confirmation de commande - Société d\'Histoire de Sherbrooke');
            }
        );
    }

    public function sendNewTransactionAlertMail($transaction_id)
    {
        $admins = User::where('user_type_id', 1)->get();
        $adminMails = array();
        foreach ($admins as $admin) {
            $adminMails[] = $admin->email;
        }
        Mail::send('emails.newTransactionAlert', [
            'transaction_id' => $transaction_id
        ],
            function ($message) use ($adminMails) {
                $message->to($adminMails)->subject('Nouvelle commande - Société d\'Histoire de Sherbrooke');
            }
        );
    }
}
