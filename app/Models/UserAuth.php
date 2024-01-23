<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    protected $table = 'user_auth';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
