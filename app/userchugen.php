<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userchugen extends Model
{
    protected $table = 'chugen2';
    protected $primaryley="id";
    protected $fillable = [
        'Account', 'Password',
    ];
}
