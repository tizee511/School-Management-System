<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
     use HasTranslations;
    // protected $table = ;
    public $translatable = ['Name']; // translatable attributes

    protected $fillable = ['Name','Notes'];
    public $timestamps = false;

    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }
}
