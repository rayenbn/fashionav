<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class Product extends Model implements TranslatableContract
{
    use Translatable; // 2. To add translation methods
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'price',
        'discount_price',
        'img',
        'availability',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name', 'description'];

    public function path()
    {
        return url(app()->getLocale() ."/our-products/" . "{$this->id}-" . Str::slug($this->name));
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Category', 'prod_cat')->orderBy('created_at','DESC')->withTimestamps();//->paginate(12);
    }

    public function colors()
    {
    	return $this->belongsToMany('App\Color', 'product_colors')->orderBy('created_at','DESC')->withTimestamps();//->paginate(12);
    }

    public function images()
    {
    	return $this->hasMany(ProductsImage::class);
    }
}
