<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUpload extends Model
{
    //
    protected $fillable = ['QNo','QText','QValue'];
    public $timestamps= false;
    protected $table ='exceldata';
}
