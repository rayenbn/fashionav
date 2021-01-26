<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Warranty extends Model implements TranslatableContract
{
    use Translatable; // 2. To add translation methods
    // protected $fillable = [
    //     'title',
    //     'content'
    // ];
      // 3. To define which attributes needs to be translated
      public $translatedAttributes = ['title', 'content'];
}
