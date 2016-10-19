<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function computers(){
    	$this->hasMany('App\Computer');
    }

    public function monitors(){
    	$this->hasMany('App\Computer');
    }
}
