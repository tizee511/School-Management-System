<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    protected $table = 'payment_students';
    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id');
    }
}
