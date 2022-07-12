<?php

require('../bootstrap.php');

use Buckaroo\Buckaroo;

$buckaroo = new Buckaroo($_ENV['BPE_WEBSITE_KEY'], $_ENV['BPE_SECRET_KEY']);

//Also accepts json
//Create payment
$response = $this->buckaroo->payment('ideal_qr')->generate([
    'serviceParameters' => [
        'ideal_qr'      => [
            'description'           => 'Test purchase',
            'minAmount'             => '0.10',
            'maxAmount'             => '10.0',
            'imageSize'             => '2000',
            'purchaseId'            => 'Testpurchase123',
            'isOneOff'              => false,
            'amount'                => '1.00',
            'amountIsChangeable'    => true,
            'expiration'            => '2030-09-30',
            'isProcessing'          => false
        ]
    ]
]);
