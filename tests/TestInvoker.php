<?php

use App\CommandPattern;

/**
 * Created by PhpStorm.
 * User: carm1306
 * Date: 2016-03-04
 * Time: 11:30
 */
class TestInvoker extends TestCase
{
    public function testAddCommand(){
            $invoker = new CommandPattern\Invoker();
            $command = new CommandPattern\UserCommand();

            $mock = $this->getMockBuilder('UserCommand')->setMethods(array('add'))->getMock();

            $mock->expects($this->once())->method('add');

            $invoker->addCommand($command);

/*            $invoker = new CommandPattern\Invoker();
            $command = new CommandPattern\UserCommand();

            // Create a stub for the UserCommand class.
            $userCommandMock = $this->getMockBuilder('UserCommand')->getMock();

            // Configure $userCommandMock.
            $userCommandMock->method('add')->willReturn(null);

            // Calling method

            $this->assertEquals(null, $invoker->addCommand($command));
        */

    }
/*    public function testRemoveCommand(){
        $invoker = new CommandPattern\Invoker();
        $command = new CommandPattern\UserCommand();

    }
    public function testViewCommand(){
        $invoker = new CommandPattern\Invoker();
        $command = new CommandPattern\UserCommand();

    }
    public function testSaveCommand(){
        $invoker = new CommandPattern\Invoker();
        $command = new CommandPattern\UserCommand();

    }*/
}