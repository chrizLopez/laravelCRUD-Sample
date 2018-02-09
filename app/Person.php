<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'email_address', 'password', 'gender', 'description',
    ];

    public $timestamps = false;
}
