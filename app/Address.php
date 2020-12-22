<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = ['company_id', 'latitude', 'longitude'];

    public function company()
    {
        return $this->belongsTo(
            Company::class,
            'company_id',
            'id'
        );
    }
}
