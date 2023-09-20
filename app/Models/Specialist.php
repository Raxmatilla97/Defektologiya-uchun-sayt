<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;
    protected $table = "specialists";

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
