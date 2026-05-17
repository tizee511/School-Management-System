<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;
    public    $translatable = ['Name'];
    protected $table  = 'subjects';
    protected $guarded   = [];

    // علاقة بين المواد الدراسية والمراحل الدراسية   
    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
    // علاقة الواد الدراسية مع الفصول
    public function Classrooms()
    {
        return $this->belongsTo(Classroom::class,'Classroom_id');
    }
    // علاقة المواد الدراسية مع المدرسين
    public function Teachers()
    {
        return $this->belongsTo(Teacher::class,'Teacher_id');
    }
}
