<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessingFee extends Model
{
    protected $table = 'processing_fees';
    protected $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class, 'Student_id');
    }
}
