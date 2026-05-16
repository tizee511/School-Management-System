<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptStudent extends Model
{
    protected $table ='receipt_students';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id'); // 'student_id' is the foreign key in the receipt_students table
    
    }
}
