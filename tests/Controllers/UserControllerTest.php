<?php

use App\Http\Controllers\UserController;
use App\User;

/**
 * Created by PhpStorm.
 * User: matcaron
 * Date: 2016-03-26
 * Time: 15:07.
 */
class UserControllerTest extends PHPUnit_Framework_TestCase
{
    public function testUserList()
    {
        $userController = new UserController();

 /*       $class = $this->getMockClass(
            'User',
            array('paginate')
        );

        $class::staticExpects($this->once())->method('helper');
*/

     //   $mock = Mockery::mock('App\User');
  //      $mock->expects($this->once())->method('paginate');
     //   $mock->shouldReceive('paginate')->once()->andReturn(array());

       // $userController->userList();
    }
}
