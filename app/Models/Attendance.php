<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'Student_id',
        'Grade_id',
        'Classroom_id',
        'Section_id',
        'Teacher_id',
        'attendance_date',
        'attendance_status',
    ];
}
