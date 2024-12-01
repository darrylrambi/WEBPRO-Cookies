<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tm_User extends Model
{
    protected $table = 'tm_user';

    protected $guarded = [];
    
    // protected $fillable = [
    //     'Nama',
    //     'NIM'
    // ];

    // biar ga ngecek kolom created_at, updated_at
    public $timestamps = false;
}
