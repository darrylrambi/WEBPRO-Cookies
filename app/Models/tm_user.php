<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tm_User extends Model
{
    protected $table = 'tm_user';
    
    protected $fillable = ['Nama', 'NIM'];
}
