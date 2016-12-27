<?php

use App\LicenceVersion;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LicenceControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testLicencesList()
    {
        Auth::loginUsingId(1);
        $licenceListLink = 'licence';
        $this->visit($licenceListLink)
            ->seePageIs($licenceListLink)
            ->see('Liste des versions de la licence')
            ->see('Modifier');
    }

    public function testEditLicence()
    {
        $id = 1;
        $licence = LicenceVersion::where('id', $id)->firstOrFail();

        $expected = view('licence.editLicence', compact('licence'));
        $licenceController = new App\Http\Controllers\LicenceController();

        $actual = $licenceController->editLicence(\Crypt::encrypt($id));

        $this->assertEquals($expected, $actual);
    }

    public function testAddLicence()
    {
        $expected = 'Some text to test';
        $request = new Illuminate\Http\Request();
        $request['terms'] = $expected;

        $licenceController = new App\Http\Controllers\LicenceController();
        $licenceController->addLicence($request);

        $this->assertEquals($expected, LicenceVersion::whereRaw('id = (select max(`id`) from licence_versions)')->first()->terms);
    }
}
