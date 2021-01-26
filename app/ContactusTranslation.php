<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactusTranslation extends Model
{
    protected $fillable = ['title', 'description', 'address', 'working_hours'];
    public $timestamps = false;
}
