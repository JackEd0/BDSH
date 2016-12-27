<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasketControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testVisualise()
    {
        Auth::loginUsingId(1);
        $url = '/basket';
        $this->visit($url)
            ->see('Mon Panier')
            ->seePageIs($url);
    }

    public function testSendTransactionConfirmationMail()
    {
        $subject = 'Confirmation de commande - Société d\'Histoire de Sherbrooke';
        $user = User::where('id', 1)->first();

        Mail::shouldReceive('send')->once()->with(
            'emails.transactionConfirmation',
            Mockery::on(function ($data) {
                $this->assertArrayHasKey('user', $data);
                $this->assertArrayHasKey('transaction_id', $data);
                return true;
            }),
            Mockery::on(function (Closure $closure) use ($user, $subject) {
                $mock = Mockery::mock('Illuminate\Mailer\Message');
                $mock->shouldReceive('to')->once()->with($user->email)
                    ->andReturn($mock); //simulate the chaining
                $mock->shouldReceive('subject')->once()->with($subject);
                $closure($mock);
                return true;
            })
        );

        $basketController = new App\Http\Controllers\BasketController();

        $basketController->sendTransactionConfirmationMail($user, 1);
    }

    public function testSendNewTransactionAlertMail()
    {
        $admins = User::where('user_type_id', 1)->get();
        $adminMails = array();
        foreach ($admins as $admin) {
            $adminMails[] = $admin->email;
        }
        $subject = 'Nouvelle commande - Société d\'Histoire de Sherbrooke';

        Mail::shouldReceive('send')->once()->with(
            'emails.newTransactionAlert',
            Mockery::on(function ($data) {
                $this->assertArrayHasKey('transaction_id', $data);
                return true;
            }),
            Mockery::on(function (Closure $closure) use ($adminMails, $subject) {
                $mock = Mockery::mock('Illuminate\Mailer\Message');
                $mock->shouldReceive('to')->once()->with($adminMails)
                    ->andReturn($mock); //simulate the chaining
                $mock->shouldReceive('subject')->once()->with($subject);
                $closure($mock);
                return true;
            })
        );

        $basketController = new App\Http\Controllers\BasketController();

        $basketController->sendNewTransactionAlertMail(1);
    }
}
