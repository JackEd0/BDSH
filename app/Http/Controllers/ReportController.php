<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Card;
use App\Document;
use App\DocumentDownload;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function reportDateInterval($periodType)
    {
        $date = Carbon::now('America/Toronto');

        switch ($periodType) {
            case 'week':
                $date = $date->copy()->subWeek(1);
                break;
            case 'month':
                $date = $date->copy()->subMonth(1);
                break;
            case 'semester':
                $date = $date->copy()->subMonths(4);
                break;
            case 'year':
                $date = $date->copy()->subYear(1);
                break;
        }

        return $date;
    }

    /**
     * @return View reportTransaction
     */
    public function reportTransactionView()
    {
        $reportTypeUrl = 'report.generateFastReportTransactions';

        return view('report.reportTransaction', compact('reportTypeUrl'));
    }

    public function generateFastReportTransactions($periodType)
    {
        $startDate = $this->reportDateInterval($periodType);
        $endDate = Carbon::now('America/Toronto');

        $reportTransactionList = Transaction::where('transactions.created_at', '>', $startDate)
            ->join('transactions_documents', 'transactions_documents.transaction_id', '=', 'transactions.id')
            ->join('documents', 'documents.id', '=', 'transactions_documents.document_id')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->join('licence_types', 'licence_types.id', '=', 'transactions.licence_type_id')
            ->select('transactions.id as id',
                'users.username as username',
                'user_types.name_fr as user_type_name_fr',
                'documents.file_name as file_name',
                'licence_types.name_fr as licence_type_name_fr',
                'transactions.created_at as created_at')
            ->get();
        $reportTypeUrl = 'report.generateFastReportTransactions';

        return view('report.reportTransaction', compact('reportTransactionList', 'startDate', 'endDate', 'reportTypeUrl'));
    }

    public function generateSpecificReportTransactions($startDate, $endDate)
    {
        $reportTransactionList = Transaction::whereBetween('transactions.created_at', [$startDate, $endDate])
            ->join('transactions_documents', 'transactions_documents.transaction_id', '=', 'transactions.id')
            ->join('documents', 'documents.id', '=', 'transactions_documents.document_id')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->join('licence_types', 'licence_types.id', '=', 'transactions.licence_type_id')
            ->select('transactions.id as id',
                'users.username as username',
                'user_types.name_fr as user_type_name_fr',
                'documents.file_name as file_name',
                'licence_types.name_fr as licence_type_name_fr',
                'transactions.created_at as created_at')
            ->get();
        $reportTypeUrl = 'report.generateFastReportTransactions';

        return view('report.reportTransaction', compact('reportTransactionList', 'startDate', 'endDate', 'reportTypeUrl'));
    }

    /**
     * @return View reportDownload
     */
    public function reportDownloadView()
    {
        $reportTypeUrl = 'report.generateFastReportDownloads';

        return view('report.reportDownload', compact('reportTypeUrl'));
    }

    public function generateFastReportDownloads($periodType)
    {
        $startDate = $this->reportDateInterval($periodType);
        $endDate = Carbon::now('America/Toronto');

        $reportDownloadList = DocumentDownload::where('document_downloads.created_at', '>', $startDate)
            ->join('documents', 'documents.id', '=', 'document_downloads.document_id')
            ->join('users', 'users.id', '=', 'document_downloads.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->select('document_downloads.id as id',
                'users.username as username',
                'user_types.name_fr as user_type_name_fr',
                'documents.file_name as file_name',
                'document_downloads.comment as comment',
                'document_downloads.created_at as created_at')
            ->get();
        $reportTypeUrl = 'report.generateFastReportDownloads';

        return view('report.reportDownload', compact('reportDownloadList', 'startDate', 'endDate', 'reportTypeUrl'));
    }

    public function generateSpecificReportDownloads($startDate, $endDate)
    {
        $reportDownloadList = DocumentDownload::whereBetween('document_downloads.created_at', [$startDate, $endDate])
            ->join('documents', 'documents.id', '=', 'document_downloads.document_id')
            ->join('users', 'users.id', '=', 'document_downloads.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->select('document_downloads.id as id',
                'users.username as username',
                'user_types.name_fr as user_type_name_fr',
                'documents.file_name as file_name',
                'document_downloads.comment as comment',
                'document_downloads.created_at as created_at')
            ->get();
        $reportTypeUrl = 'report.generateFastReportDownloads';

        return view('report.reportDownload', compact('reportDownloadList', 'startDate', 'endDate', 'reportTypeUrl'));
    }

    /**
     * @return View reportCardCreation
     */
    public function reportCardCreationView()
    {
        $includeCardWithImages = 'all';
        $reportTypeUrl = 'report.generateFastReportCardCreation';

        return view('report.reportCardCreation', compact('reportTypeUrl', 'includeCardWithImages'));
    }

    public function generateFastReportCardCreation($periodType)
    {
        $includeCardWithImages = 'all';
        $startDate = $this->reportDateInterval($periodType);
        $endDate = Carbon::now('America/Toronto');

        $reportCardWithImagesList = Card::where('cards.created_at', '>', $startDate)
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->join('documents', 'documents.card_id', '=', 'cards.id')
            ->select('cards.card_number as card_number',
                'card_types.name_fr as name_fr',
                'documents.file_name as file_name',
                'cards.created_at as created_at')
            ->get();

        $cardIdToExclude = array();
        $cardToExcludeList = Document::select('card_id')->get();
        foreach ($cardToExcludeList as $cardToExclude) {
            $cardIdToExclude[] = $cardToExclude;
        }
        $reportCardWithoutImagesList = Card::where('cards.created_at', '>', $startDate)
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->whereNotIn('cards.id', $cardIdToExclude)
            ->select('cards.card_number as card_number',
                'card_types.name_fr as name_fr',
                'cards.created_at as created_at')
            ->get();
        $reportTypeUrl = 'report.generateFastReportCardCreation';

        return view('report.reportCardCreation', compact('reportCardWithImagesList', 'reportCardWithoutImagesList', 'reportCardList', 'startDate', 'endDate', 'reportTypeUrl', 'includeCardWithImages'));
    }

    public function generateSpecificReportCardCreation($includeCardWithImages, $startDate, $endDate)
    {
        if ($includeCardWithImages == 'with') {
            $reportCardList = Card::whereBetween('cards.created_at', [$startDate, $endDate])
                ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
                ->join('documents', 'documents.card_id', '=', 'cards.id')
                ->select('cards.card_number as card_number',
                    'card_types.name_fr as name_fr',
                    'documents.file_name as file_name',
                    'cards.created_at as created_at')
                ->get();
        } elseif ($includeCardWithImages == 'without') {
            $cardIdToExclude = array();
            $cardToExcludeList = Document::select('card_id')->get();
            foreach ($cardToExcludeList as $cardToExclude) {
                $cardIdToExclude[] = $cardToExclude;
            }
            $reportCardList = Card::whereBetween('cards.created_at', [$startDate, $endDate])
                ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
                ->whereNotIn('cards.id', $cardIdToExclude)
                ->select('cards.card_number as card_number',
                    'card_types.name_fr as name_fr',
                    'cards.created_at as created_at')
                ->get();
        } else {
            $reportCardWithImagesList = Card::whereBetween('cards.created_at', [$startDate, $endDate])
                ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
                ->join('documents', 'documents.card_id', '=', 'cards.id')
                ->select('cards.card_number as card_number',
                    'card_types.name_fr as name_fr',
                    'documents.file_name as file_name',
                    'cards.created_at as created_at')
                ->get();

            $cardIdToExclude = array();
            $cardToExcludeList = Document::select('card_id')->get();
            foreach ($cardToExcludeList as $cardToExclude) {
                $cardIdToExclude[] = $cardToExclude;
            }
            $reportCardWithoutImagesList = Card::whereBetween('cards.created_at', [$startDate, $endDate])
                ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
                ->whereNotIn('cards.id', $cardIdToExclude)
                ->select('cards.card_number as card_number',
                    'card_types.name_fr as name_fr',
                    'cards.created_at as created_at')
                ->get();
        }
        $reportTypeUrl = 'report.generateFastReportCardCreation';

        return view('report.reportCardCreation', compact('reportCardWithImagesList', 'reportCardWithoutImagesList', 'reportCardList', 'startDate', 'endDate', 'reportTypeUrl', 'includeCardWithImages'));
    }

    /**
     * @return View reportPicture
     */
    public function reportPictureView()
    {
        $reportTypeUrl = 'report.generateFastReportPicture';

        return view('report.reportPicture', compact('reportTypeUrl'));
    }

    public function generateFastReportPicture($periodType)
    {
        $startDate = $this->reportDateInterval($periodType);
        $endDate = Carbon::now('America/Toronto');

        $reportPictureList = Document::where('documents.created_at', '>', $startDate)
            ->join('cards', 'cards.id', '=', 'documents.card_id')
            ->join('collections', 'collections.id', '=', 'cards.collection_id')
            ->select('documents.created_at as created_at',
                'documents.file_name as file_name',
                'collections.code as code',
                'collections.name as collection_name')
            ->get();
        $reportTypeUrl = 'report.generateFastReportPicture';

        return view('report.reportPicture', compact('reportPictureList', 'startDate', 'endDate', 'reportTypeUrl'));
    }

    public function generateSpecificReportPicture($startDate, $endDate)
    {
        $reportPictureList = Document::whereBetween('documents.created_at', [$startDate, $endDate])
            ->join('cards', 'cards.id', '=', 'documents.card_id')
            ->join('collections', 'collections.id', '=', 'cards.collection_id')
            ->select('documents.created_at as created_at',
                'documents.file_name as file_name',
                'collections.code as code',
                'collections.name as collection_name')
            ->get();
        $reportTypeUrl = 'report.generateFastReportPicture';

        return view('report.reportPicture', compact('reportPictureList', 'startDate', 'endDate', 'reportTypeUrl'));
    }
}
