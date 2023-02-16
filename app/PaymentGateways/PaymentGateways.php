<?php


namespace App\PaymentGateways;

use App\Models\Payment;

interface PaymentGateways
{
    //createPayment
    public function create($order):string;

    //verifyPayment
    public function verify($id):Payment;

    //public function getPayment($id);
}
