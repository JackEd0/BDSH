<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class ReportControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testReportDateInterval()
    {
        $date = Carbon::now('America/Toronto');
        $expectedWeek = $date->copy()->subWeek(1);
        $expectedMonth = $date->copy()->subMonth(1);
        $expectedSemester = $date->copy()->subMonths(4);
        $expectedYear = $date->copy()->subYear(1);

        $reportController = new App\Http\Controllers\ReportController();
        $reportWeekDate = $reportController->reportDateInterval("week");
        $reportMonthDate = $reportController->reportDateInterval("month");
        $reportSemesterDate = $reportController->reportDateInterval("semester");
        $reportYearDate = $reportController->reportDateInterval("year");

        $this->assertEquals($expectedWeek, $reportWeekDate);
        $this->assertEquals($expectedMonth, $reportMonthDate);
        $this->assertEquals($expectedSemester, $reportSemesterDate);
        $this->assertEquals($expectedYear, $reportYearDate);

    }

    public function testReportTransactionView()
    {
        $this->visit('report/transactions')
            ->seePageIs('login');
        Auth::loginUsingId(1);
        $this->visit('report/transactions')
            ->seePageIs('report/transactions');
    }

    public function testGenerateFastReportTransactions()
    {
        $date = Carbon::now('America/Toronto');
        $unexpectedStartDate = $date->copy()->subMonths(13);
        $unexpectedEndDate = $date->copy()->addDay(1);

        Auth::loginUsingId(1);
        $this->visit('report/transactions')
            ->seePageIs('report/transactions')
            //test pour la dernière année
            ->click('La dernière année')
            ->seePageIs('report/generateFastReport/transactions/year')
            ->see(substr($date, 0, 10))
            ->see('Rapport de vente des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

        //test pour les 4 derniers mois
        $unexpectedStartDate = $date->copy()->subMonths(5);
        $this->visit('report/transactions')
            ->click('Les 4 derniers mois')
            ->seePageIs('report/generateFastReport/transactions/semester')
            ->see(substr($date, 0, 10))
            ->see('Rapport de vente des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

        //test pour le dernier mois
        $unexpectedStartDate = $date->copy()->subMonth(1)->subDay(1);
        $this->visit('report/transactions')
            ->click('Le dernier mois')
            ->seePageIs('report/generateFastReport/transactions/month')
            ->see(substr($date, 0, 10))
            ->see('Rapport de vente des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

        //test pour la derniere semaine
        $unexpectedStartDate = $date->copy()->subMonths(5);
        $this->visit('report/transactions')
            ->click('La dernière semaine')
            ->seePageIs('report/generateFastReport/transactions/week')
            ->see(substr($date, 0, 10))
            ->see('Rapport de vente des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

    }

    public function testGenerateSpecificReportTransactions()
    {
        $startDate = new Carbon('first day of January 2008', 'America/Toronto');
        $endDate = Carbon::now('America/Toronto');
        $unexpectedStartDate = $startDate->copy()->subDay(1);
        $unexpectedEndDate = $endDate->copy()->addDay(1);

        Auth::loginUsingId(1);
        $this->visit('report/transactions')
            ->seePageIs('report/transactions')
            ->get('report/generateSpecificReport/transactions/' . $startDate . '/' . $endDate)
            ->see(substr($startDate, 0, 10))
            ->see(substr($endDate, 0, 10))
            ->see('Rapport de vente des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

    }

    public function testGenerateFastReportDownloads()
    {
        $date = Carbon::now('America/Toronto');
        $unexpectedStartDate = $date->copy()->subMonths(13);
        $unexpectedEndDate = $date->copy()->addDay(1);

        Auth::loginUsingId(1);
        $this->visit('report/downloads')
            ->seePageIs('report/downloads')
            //test pour la dernière année
            ->click('La dernière année')
            ->seePageIs('report/generateFastReport/downloads/year')
            ->see(substr($date, 0, 10))
            ->see('Rapport de téléchargement des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

        //test pour les 4 derniers mois
        $unexpectedStartDate = $date->copy()->subMonths(5);
        $this->visit('report/downloads')
            ->click('Les 4 derniers mois')
            ->seePageIs('report/generateFastReport/downloads/semester')
            ->see(substr($date, 0, 10))
            ->see('Rapport de téléchargement des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

        //test pour le dernier mois
        $unexpectedStartDate = $date->copy()->subMonth(1)->subDay(1);
        $this->visit('report/downloads')
            ->click('Le dernier mois')
            ->seePageIs('report/generateFastReport/downloads/month')
            ->see(substr($date, 0, 10))
            ->see('Rapport de téléchargement des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

        //test pour la derniere semaine
        $unexpectedStartDate = $date->copy()->subMonths(5);
        $this->visit('report/downloads')
            ->click('La dernière semaine')
            ->seePageIs('report/generateFastReport/downloads/week')
            ->see(substr($date, 0, 10))
            ->see('Rapport de téléchargement des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

    }

    public function testGenerateSpecificReportDownloads()
    {
        $startDate = new Carbon('first day of January 2008', 'America/Toronto');
        $endDate = Carbon::now('America/Toronto');
        $unexpectedStartDate = $startDate->copy()->subDay(1);
        $unexpectedEndDate = $endDate->copy()->addDay(1);

        Auth::loginUsingId(1);
        $this->visit('report/downloads')
            ->seePageIs('report/downloads')
            ->get('report/generateSpecificReport/downloads/' . $startDate . '/' . $endDate)
            ->see(substr($startDate, 0, 10))
            ->see(substr($endDate, 0, 10))
            ->see('Rapport de téléchargement des images')
            ->dontSee(substr($unexpectedStartDate, 0, 10))
            ->dontSee(substr($unexpectedEndDate, 0, 10));

    }

}
