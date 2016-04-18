<?php

use App\CommandPattern\Invoker;

/**
 * Created by PhpStorm.
 * User: carm1306
 * Date: 2016-03-04
 * Time: 11:30.
 */
class InvokerTest extends PHPUnit_Framework_TestCase
{
    public function testAddCommand()
    {
        $invoker = new Invoker();

        $mock = $this->getMockForAbstractClass('App\CommandPattern\AbstractCommand');
        $mock->expects($this->once())->method('add');

        $invoker->addCommand($mock);
    }
    public function testRemoveCommand()
    {
        $invoker = new Invoker();

        $mock = $this->getMockForAbstractClass('App\CommandPattern\AbstractCommand');
        $mock->expects($this->once())->method('remove');

        $invoker->removeCommand($mock);
    }
    public function testViewCommand()
    {
        $invoker = new Invoker();

        $mock = $this->getMockForAbstractClass('App\CommandPattern\AbstractCommand');
        $mock->expects($this->once())->method('view');

        $invoker->viewCommand($mock);
    }
    public function testSaveCommand()
    {
        $invoker = new Invoker();

        $mock = $this->getMockForAbstractClass('App\CommandPattern\AbstractCommand');
        $mock->expects($this->once())->method('save');

        $invoker->saveCommand($mock);
    }
}
