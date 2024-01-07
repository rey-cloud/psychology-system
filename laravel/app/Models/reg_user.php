<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reg_user extends Model
{
    use HasFactory;

    protected $table = 'reg_users';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_initial',
        'birth_date',
        'gender',
        'phone',
        'address',
        'username',
        'email',
        'password',
        'type',
    ];
}
