<?php

namespace Buckaroo\PaymentMethods;

use Buckaroo\Exceptions\SDKException;
use Buckaroo\Services\PayloadService;

class PaymentFacade
{
    private PaymentMethod $paymentMethod;

    public function __construct($client, $method)
    {
        $this->paymentMethod = PaymentMethodFactory::get($client, $method);
    }

    public function __call(string $name , array $arguments)
    {
        if(method_exists($this->paymentMethod, $name)) {

            $this->paymentMethod->setPayload((new PayloadService($arguments[0]))->toArray());

            return $this->paymentMethod->$name();
        }

        throw new SDKException($name, "Payment method you requested does not exist.");
    }
}