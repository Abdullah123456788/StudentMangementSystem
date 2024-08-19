<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $fillable = [
        'name',
        ];

    public function classes()
    {
        return $this->belongstoMany(classes::class, 'class_subject', 'subject_id', 'class_id');
    }
}
