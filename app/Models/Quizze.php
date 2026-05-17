<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasTranslations;
    public    $translatable = ['Name'];
    protected $table        = 'quizzes';

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'Teacher_id');

    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');

    }
    public function classroom(){

        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'Subject_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'Section_id');
    }
    // public function questions()
    // {
    //     return $this->hasMany(Question::class, 'Quiz_id');

    // }
    // public function students()
    // {
            
    //     }
    }
