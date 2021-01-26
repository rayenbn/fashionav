<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = [
        'category_image',
        'parent_category_id',
        'position'
    ];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
    
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['category_name'];

    public function products()
    {
    	return $this->belongsToMany('App\Product','prod_cat')->orderBy('created_at','ASC')->paginate(12);
    }


    // One level child
    public function child() {
        return $this->hasMany('App\Category', 'parent_category_id');
    }

    // Recursive children
    public function children() {
        return $this->hasMany('App\Category', 'parent_category_id')->with('children');
    }

    public function path()
    {
        return url(app()->getLocale() ."/products/" . "{$this->id}-" . Str::slug($this->category_name));
    }

    // One level parent
    public function parent() {
        return $this->belongsTo('App\Category', 'parent_category_id');
    }

    // Recursive parents
    public function parents() {
        return $this->belongsTo('App\Category', 'parent_category_id')->with('parent');
    }
    
    // public function getRouteKeyName()
    // {
    // 	return 'slug';
    // }
}
