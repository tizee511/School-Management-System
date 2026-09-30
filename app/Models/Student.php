<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\StudentAccount;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['Name'];
    protected $table = 'students';
    protected $guarded=[];

    // علاقة بين الطلاب ونوع الجنس 
    public function Gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    // علاقة بين الطلاب والمراحل الدراسية   
    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
// علاقة الطلايدب مع الاقسام
    public function Sections()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
// علاقة الطلاب مع الفصول
    public function Classrooms()
    {
        return $this->belongsTo(Classroom::class,'Classroom_id');
    }
    // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
    public function images():MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // علاقة بين الطلاب والجنسيات  لجلب اسم الجنسية  في جدول الجنسيات

    public function Nationality()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }

    // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء
    public function myparent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }

      // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany(StudentAccount::class, 'Student_id');
    }
    // علاقة بين الطلاب والحضور والغياب لجلب الحضور والغياب في جدول الحضور والغياب
    public function Attendance(){
        return $this->hasMany(Attendance::class, 'Student_id');
    } 
    
}
