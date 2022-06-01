<?php

namespace Buckaroo\Model\Adapters\ServiceParametersKeys;

use Buckaroo\Model\Address;

class AfterpayDigiAcceptAddressAdapter extends Adapter
{
    protected $prefix = '';

    protected array $keys = [
        'phone'        => 'PhoneNumber'
    ];

    public function __construct(Address $address, $prefix = '')
    {
        $this->prefix = $prefix;

        return parent::__construct($address);
    }

    public function serviceParameterKeyOf($propertyName): string
    {
        if(isset($this->keys[$propertyName])) {
            return $this->prefix . $this->keys[$propertyName];
        }

        return $this->prefix . ucfirst($propertyName);
    }
}