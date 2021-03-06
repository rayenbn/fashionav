<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ProductPage extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = [
        'banner',
    ];

     // 3. To define which attributes needs to be translated
     public $translatedAttributes = ['page_title'];
}
