<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $guarded=[];

    public function student()
   {
       return $this->belongsTo('App\Models\Student', 'Student_id');
   }

   // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات
    public function From_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'From_Grade');
    }
    
    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات
    public function f_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'From_Classroom');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات
    public function f_section()
    {
        return $this->belongsTo('App\Models\Section', 'From_Section');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات

    public function t_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'To_Grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function t_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'To_Classroom');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function t_section()
    {
        return $this->belongsTo('App\Models\Section', 'To_Section');
    }

    
}
