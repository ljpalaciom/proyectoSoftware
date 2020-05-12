<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use App\User;
use Tests\TestCase;
use App\Util\PaymentLocalSystem;

class BasicTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPayment()
    {
        $request = new Request([
        'card_number'   => '4242424242424242',
        'cvv'  => '898',
        'owner' => 'Xavi Mané',
        'exp_date' => '12/21'
        ]);

        $user = new User();
        $amount = "200";
        $response = PaymentLocalSystem::pay($request,$user,$amount);

        $this->assertTrue($response);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFailedPayment()
    {
        $request = new Request([
        'card_number'   => '4242424242424242',
        'cvv'  => '315',
        'owner' => 'Xavi Mané',
        'exp_date' => '12/21'
        ]);

        $user = new User();
        $amount = "200";
        $response = PaymentLocalSystem::pay($request,$user,$amount);

        $this->assertFalse($response);
    }


}
