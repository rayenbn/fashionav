<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarrantyTranslation extends Model
{
    protected $fillable = ['title', 'content'];
    public $timestamps = false;
}
