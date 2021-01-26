<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{
    use Translatable; // 2. To add translation methods
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sliders';
     /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'picture',
    ];
    protected $guarded = [];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name', 'description'];

}
