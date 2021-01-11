<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password','address','phone'
    ];
}
