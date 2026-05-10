<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
     use HasTranslations;
     public $translatable = ['Name']; // translatable attributes
     protected $table = 'grades';

    protected $fillable = ['Name','Notes'];
    public $timestamps = false;

    public function Sections()
    {
        return $this->hasMany(Section::class, 'Grade_id');
    }
}
