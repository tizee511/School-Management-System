<?php

namespace App\Models;

use App\Models\Quizze;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function Quizzes(){
        return $this->belongsTo(Quizze::class,'Quizze_id');
    }
}
