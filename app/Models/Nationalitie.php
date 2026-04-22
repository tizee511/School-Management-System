<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationalitie extends Model
{
    use HasTranslations;
    public $translatable = ['nat_name'];
     protected $table = 'nationalities';
     protected $fillable = ['nat_name'];

}
