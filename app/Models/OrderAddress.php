<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Symfony\Component\Intl\Countries;

class OrderAddress extends Pivot
{

    protected $table = 'order_addresses';
    protected $fillable = [
        'order_id',
        'type',
        'first_name',
        'last_name',
        'email',
        'phone',
        'street_address',
        'city',
        'postal_code',
        'state',
        'country',
    ];

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn() => ucfirst($this->first_name ?? '') . ' ' . ucfirst($this->last_name ?? ''),
        );
    }

    protected function CountryName(): Attribute
    {
        return Attribute::make(
            get: fn() => Countries::getName($this->country),
        );
    }
}
