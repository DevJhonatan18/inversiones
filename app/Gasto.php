<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    //
    protected $dates = ['cdate'];

    public function tgasto(){
    	return $this->belongsTo(Tgasto::class);
    }
    
}
