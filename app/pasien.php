<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $fillable = ['name', 'email', 'no_hp', 'alamat', 'poliklinik_id', 'kategori_pasien'];

    public function poliklinik(){
    	return $this->belongsTo('App\poliklinik');
    }
}
