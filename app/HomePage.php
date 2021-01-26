<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class HomePage extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = [
        'sec1_cat_id',
        'banner',
        'sec2_image1',
        'sec2_image2',
        'sec3_cat_id',
        'sec4_cat_id',
        'sec2_cat_id1',
        'sec2_cat_id2',

    ];

     // 3. To define which attributes needs to be translated
     public $translatedAttributes = ['sec1_title', 'sec2_title1', 'sec2_subtitle1', 'sec2_title2', 'sec2_subtitle2', 'sec3_title', 'sec4_title'];
}
