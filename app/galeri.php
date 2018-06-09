<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    protected $fillable = array('nama','file_gambar');
    public $timestamps =true;

}
