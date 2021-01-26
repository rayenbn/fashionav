<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorTranslation extends Model
{
    protected $fillable = ['color_name'];
    public $timestamps = false;
}
