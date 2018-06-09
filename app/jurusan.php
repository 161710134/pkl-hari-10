<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $fillable = array('jurusan','keterangan');
     public $timestamps =true;

     public function fasilitas()
     {
         return $this->hasMany('App\fasilitas','id_jurusan');
     }
     public function industri()
     {
         return $this->hasMany('App\industri','id_jurusan');
     }
}
