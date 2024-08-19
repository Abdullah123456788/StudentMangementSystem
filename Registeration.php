<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registeration extends Model
{ 
    protected $table = 'registrations';
    protected $fillable = [
        'name',
        'username',
        'email',
        'phonenumber',
        'password',
        'image',
    ];

    


}
