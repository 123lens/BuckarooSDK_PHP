<?php 
require_once (__DIR__ . '/init.php');

use Buckaroo\SDK\Buckaroo\Payload\TransactionRequest;

$request = new TransactionRequest();
$request->setServiceName('ideal');
$request->setServiceVersion(2);
$request->setServiceAction('Pay');
$request->setAmountDebit(10.10);
$request->setInvoice($orderId);
$request->setOrder($orderId);
$request->setCurrency($currencyCode);
$request->setReturnURL($returnURL);
$request->setReturnURLCancel($returnURLCancel);
$request->setPushURL($pushURL);
$request->setServiceParameter('issuer', 'ABNANL2A');

try {
    $response = $client->post(
        $client->getTransactionUrl(),
        $request,
        'Buckaroo\SDK\Buckaroo\Payload\TransactionResponse'
    );
} catch (Exception $e) {
    return ['error' => $e->getMessage()];
}

var_dump($response);die();