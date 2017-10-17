<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $fillable = [
        'user_id', 'role_id'
    ];

    public $timestamps = false;
}
