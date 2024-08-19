<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ="student";
    protected $fillable = [
        'name',
        'class_id',
        'marks',
        'gender',
    ];

    public function class()
    {
        return $this->belongsTo(classes::class , 'class_id');
    }
}

