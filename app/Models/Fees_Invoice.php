<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fees_Invoice extends Model
{
    protected $table ='fees_invoices';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id'); // 'student_id' is the foreign key in the fees_invoices table
    
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id'); // 'Grade_id' is the foreign key in the fees_invoices table
    
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id'); // 'Classroom_id' is the foreign key in the fees_invoices table
    
    }
    public function fee()
    {
        return $this->belongsTo(Fee::class, 'Fee_id'); // 'fee_id' is the foreign key in the fees_invoices table
    
    }
    public function section()
    {
        return $this->hasMany(Section::class, 'section_id'); // 'section_id' is the foreign key in the Section table   
    }
}