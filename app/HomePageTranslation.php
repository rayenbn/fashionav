<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageTranslation extends Model
{
    protected $fillable = [
        'sec1_title', 
        'sec2_title1', 
        'sec2_subtitle1', 
        'sec2_title2', 
        'sec2_subtitle2', 
        'sec3_title', 
        'sec4_title'
    ];
    public $timestamps = false;
}
