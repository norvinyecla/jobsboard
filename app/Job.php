<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];


    public function employer(){
    	return $this->belongsTo('App\User', 'employer_id');
    }
}
