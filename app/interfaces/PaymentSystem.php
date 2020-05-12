<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface PaymentSystem {
    //This method will allow to pay and also will return if the pay was succeed
    public static function pay(Request $request, $user, $amount);
}
