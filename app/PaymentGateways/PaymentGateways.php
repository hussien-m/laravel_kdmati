<?php


namespace App\PaymentGateways;

use App\Models\Payment;


interface PaymentGateways
{
    //createPayment
    public function create($order,$user);

    //verifyPayment
    public function verify($id);

    //Form Options For PaymentGateways
    public function formOptions():array;
}
