<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPageTranslation extends Model
{
    protected $fillable = ['page_title'];
    public $timestamps = false;
}
