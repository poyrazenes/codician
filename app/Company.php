<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name', 'link'];

    public function people()
    {
        return $this->hasMany(
            Person::class,
            'company_id',
            'id'
        );
    }

    public function addresses()
    {
        return $this->hasMany(
            Address::class,
            'company_id',
            'id'
        );
    }
}
