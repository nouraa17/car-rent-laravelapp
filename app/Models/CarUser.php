<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CarUser extends Model
{
    use HasFactory;
    protected $table = 'carusers';

    protected $fillable = [
        'full_name',
        'user_name',
        'active',
        'email',
        'password',
        'email_verified_at',
    
    ];

}
