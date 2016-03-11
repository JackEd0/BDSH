<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\testPhpUnit;

/**
 * Created by PhpStorm.
 * User: carm1306
 * Date: 2016-03-03
 * Time: 13:46
 */
class testTest extends TestCase
{
    public function testTest(){
        $expected = 6;
        $test = new testPhpUnit\Test();

        $actual = $test->add(2, 4);

        $this->assertEquals($expected, $actual);
    }
}