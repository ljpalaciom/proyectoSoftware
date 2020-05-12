<?php

namespace App\Util;

use App\Interfaces\PaymentSystem;
use Illuminate\Http\Request;

class PaymentLocalSystem implements PaymentSystem {

  public static function pay(Request $request, $user, $amount){
    $owner = $request->input("owner");
    $cardNumber = $request->input("card_number");
    $cvv = $request->input("cvv");
    $expDate = $request->input("exp_date");

    if (!is_null($user)){
        //validate and do payment
        if($cardNumber == "4242424242424242" and $cvv == "898"){
            //Rest amount
            return true;
        }
      }
    return false;
  }
}
