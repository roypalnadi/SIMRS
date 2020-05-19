<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poliklinik extends Model
{
	protected $fillable = ['name'];
   
    public function doctor(){
    	return $this->hasMany('App\doctor');
    }

    public function pasien(){
    	return $this->hasMany('App\pasien');
    }
}
