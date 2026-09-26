<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    
    protected $fillable = [
        'integration',
        'Grade_id',
        'Classroom_id',
        'Section_id',
        'user_id',
        'meeting_id',
        'topic',
        'start_at',
        'duration',
        'password',
        'start_url',
        'join_url',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }
   
    public function sections()
    {
        return $this->belongsTo(Section::class, 'Section_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
