<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religionist extends Model
{
    use HasTranslations;
    public $translatable = ['rel_name'];
    protected $table = 'religionists';
    protected $fillable = ['rel_name'];
}
