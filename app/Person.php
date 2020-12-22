<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'company_id', 'first_name', 'last_name',
        'title', 'email', 'phone'
    ];

    public function company()
    {
        return $this->belongsTo(
            Company::class,
            'company_id',
            'id'
        );
    }
}
