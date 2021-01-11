<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    public function customer(){
        return $this->hasOne('App\customers' , 'id' , 'customers_id');
    }
    public function card(){
        return $this->hasOne('App\Cards' , 'id' , 'card_id');
    }
}
