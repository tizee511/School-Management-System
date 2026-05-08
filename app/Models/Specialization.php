<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasTranslations;
    public $translatable = ['Name_spec'];
    protected $table = 'specializations';
    protected $fillable = ['Nane_spec']; 
    
}
