<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $fillable = array('judul','tgl_rilis');
    public $timestamps =true;
}
