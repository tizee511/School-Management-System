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

    public function students ()
    {
        return $this->belongsTo (Student::class, 'Student_id');
    }

    public function Gender ()
    {
        return $this->belongsTo (Gender::class, 'gender_id');
    }

    public function Grade ()
    {
        return $this->belongsTo (Grade::class, 'Grade_id');
    }

    public function Section ()
    {
        return $this->belongsTo (Section::class, 'Section_id');
    }
    
}
