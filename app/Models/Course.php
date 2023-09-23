<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";

    public function specialist()
    {
        return $this->belongsTo(Specialist::class, 'teacher_id');
    }

    public function maqullagan()
    {
        return $this->belongsTo(User::class, 'maqullagan_id');
    }

    public function studentCourse()
    {
        return $this->hasOne(StudentCourse::class, 'course_id');
    }

    public function videolar()
    {
        return $this->hasMany(VideoDarslar::class, 'kurs_id');
    }
}
