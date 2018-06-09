<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gurustaf extends Model
{
    protected $fillable = array('foto','nama','mapel');
    public $timestamps =true;
}
