<?php

namespace App\PaymentGateways;

use Exception;
use Illuminate\Support\Str;

class PaymentGatewayFactory
{
    public static function create($name)
    {
        $class = 'App\PaymentGateways\\' . Str::studly($name);
        try{

            return new $class();
        } catch(Exception $ex){
            throw new Exception("Payment Gateway [{$name}] Notfound .");
        }
    }
}
