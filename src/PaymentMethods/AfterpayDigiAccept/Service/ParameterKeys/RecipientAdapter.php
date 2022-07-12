<?php

namespace Buckaroo\PaymentMethods\AfterpayDigiAccept\Service\ParameterKeys;

class RecipientAdapter extends ServiceAdapter
{
    protected array $keys = [
        'culture'               => 'Language',
        'chamberOfCommerce'     => 'CompanyCOCRegistration',
        'vatNumber'             => 'VatNumber'
    ];

    public function serviceParameterKeyOf($propertyName): string
    {
        if(in_array($propertyName, ['companyName', 'chamberOfCommerce', 'vatNumber']))
        {
            return (isset($this->keys[$propertyName]))? $this->keys[$propertyName] : ucfirst($propertyName);
        }

        $name = (isset($this->keys[$propertyName]))? $this->keys[$propertyName] : ucfirst($propertyName);

        return $this->prefix . $name;
    }
}