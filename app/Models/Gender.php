<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{
    use HasTranslations;
    public $translatable = ['Name_gend'];
    protected $table = 'genders';
    protected $fillable = ['Name_gend']; 
}
