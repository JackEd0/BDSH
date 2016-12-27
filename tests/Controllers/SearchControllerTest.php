<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testSearchHistory()
    {
        Auth::loginUsingId(1);
        $this->visit('searchHistory')
            ->see('Mot clés')
            ->see('Recherché par')
            ->see('Date de recherche')
            ->see('Actions');
    }

    public function testDeleteAllHistory()
    {
        Auth::loginUsingId(1);
        $this->get('searchHistory/delete')
            ->DontSeeInDatabase('search_history', ['term' => '']);
    }
}
