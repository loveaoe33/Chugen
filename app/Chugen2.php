<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chugen2 extends Model
{
    protected $table = 'chugen2';
    protected $primaryley="id";
    protected $fillable=['name','develop','category','now','dispose','number','all'];
}
