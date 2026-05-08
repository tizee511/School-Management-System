<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Section'];
    protected $table = 'sections';
    protected $fillable = ['Name_Section', 'Grade_id', 'Class_id','Status'];

    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام
    public function My_classs()
    {   
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }
    // علاقة المعلمين مع الاقسام
    public function Teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
    }
}
