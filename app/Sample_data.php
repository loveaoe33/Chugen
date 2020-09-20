<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample_data extends Model

{
    protected $table = 'chugen2';
    protected $primaryley="id";
    protected $fillable=['name','develop','category','now','dispose','exampleFormControlTextarea1'];
}

