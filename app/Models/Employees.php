<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthdate',
        'monthly_salary'
    ];
}
