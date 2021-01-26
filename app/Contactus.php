<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Contactus extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = [
        'email',
        'phone',
        'mobile',
    ];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['title', 'description', 'address', 'working_hours'];
}
