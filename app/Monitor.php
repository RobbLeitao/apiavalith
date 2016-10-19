<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    public function client(){
    	$this->belongsTo('App\Client');
    }
}
