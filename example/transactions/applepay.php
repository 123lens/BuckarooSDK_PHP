<?php

require('../bootstrap.php');

use Buckaroo\Buckaroo;

$buckaroo = new Buckaroo($_ENV['BPE_WEBSITE_KEY'], $_ENV['BPE_SECRET_KEY']);

//Also accepts json
//Pay
$response = $this->buckaroo->payment('applepay')->pay([
    'amountDebit' => 10,
    'invoice' => uniqid(),
    'paymentData' => uniqid(),
    'customerCardName'  => 'Buck Aroo'
]);


//Refund
$response = $this->buckaroo->payment('applepay')->refund([
    'amountCredit' => 10,
    'invoice' => '10000480',
    'originalTransactionKey' => '9AA4C81A08A84FA7B68E6A6A6291XXXX'
]);