<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doktor extends Model
{
    protected $fillable = ['name', 'email', 'no_hp', 'alamat', 'poliklinik_id'];

    public function poliklinik(){
    	return $this->belongsTo('App\poliklinik');
    }
}
