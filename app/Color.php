<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Color extends Model implements TranslatableContract
{
    use Translatable; 
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'colors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'color_code',
        'slug',
    ];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['color_name'];

     /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
    
}
