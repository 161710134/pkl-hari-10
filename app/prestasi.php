<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    protected $fillable = array('prestasi','keterangan','id_eskul');

    public function eskul()
    {
    	return $this->belongsTo('App\eskul','id_eskul');
    }
}
