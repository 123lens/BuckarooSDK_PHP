<?php

namespace Buckaroo\Models\Adapters;

use Buckaroo\Models\Model;
use Buckaroo\Models\ServiceParameter;

abstract class ServiceParametersKeysAdapter extends ServiceParameter
{
    private Model $model;
    protected array $hidden = [];
    protected array $keys = [];

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function __get($property)
    {
        if (property_exists($this->model, $property))
        {
            return $this->model->$property;
        }

        return null;
    }

    public function serviceParameterKeyOf($propertyName): string
    {
        return (isset($this->keys[$propertyName]))? $this->keys[$propertyName] : ucfirst($propertyName);
    }

    public function toArray(): array
    {
        return $this->model->toArray();
    }

    public function get_object_vars(): array
    {
        return $this->model->get_object_vars();
    }
}