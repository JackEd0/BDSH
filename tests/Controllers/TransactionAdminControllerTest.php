<?php

use App\User;
use App\Transaction;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionAdminControllerTest extends TestCase
{
    use DatabaseTransactions;


    public function testSendTransactionRefusedMail()
    {
        $subject = 'Commande refusée - Société d\'Histoire de Sherbrooke';
        $user = User::where('id', 1)->first();
        $transaction = Transaction::where('id', 1)->first();

        Mail::shouldReceive('send')->once()->with(
            'emails.transactionRefused',
            Mockery::on(function ($data) {
                $this->assertArrayHasKey('user', $data);
                $this->assertArrayHasKey('transaction', $data);
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

        $transactionAdminController = new App\Http\Controllers\TransactionAdminController();

        $transactionAdminController->sendTransactionRefusedMail($user, $transaction);
    }

    public function testSendTransactionPaymentRequestMail()
    {
        $subject = 'Commande acceptée/Demande de paiement - Société d\'Histoire de Sherbrooke';
        $user = User::where('id', 1)->first();
        $transaction = Transaction::where('id', 1)->first();

        Mail::shouldReceive('send')->once()->with(
            'emails.transactionPaymentRequest',
            Mockery::on(function ($data) {
                $this->assertArrayHasKey('user', $data);
                $this->assertArrayHasKey('transaction', $data);
                return true;
            }),
            Mockery::on(function (Closure $closure) use ($user, $subject) {
                $mock = Mockery::mock('Illuminate\Mailer\Message');
                $mock->shouldReceive('to')->once()->with($user->email)
                    ->andReturn($mock); //simulate the chaining
                $mock->shouldReceive('subject')->once()->with($subject);
                $mock->shouldReceive('attachData')->twice();
                $closure($mock);
                return true;
            })
        );

        $transactionAdminController = new App\Http\Controllers\TransactionAdminController();

        $transactionAdminController->sendTransactionPaymentRequestMail($user, $transaction);
    }
}
