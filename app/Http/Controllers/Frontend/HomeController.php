<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\HomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductPage;
use App\Slider;
use App\Warranty;
use App;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // \App::setLocale('en');
        $home_page = HomePage::first();
        $sliders = Slider::all();
        $categories = Category::orderBy('position', 'asc')->take(4)->get();
        $section_one_cat = Category::where('id', $home_page->sec1_cat_id)->first();
        $section_one = $section_one_cat->products();
        $section_three_cat = Category::where('id', $home_page->sec3_cat_id)->first();
        $section_three = $section_three_cat->products();
        // $section_four_cat = Category::where('id', $home_page->sec4_cat_id)->first();
        // $section_four = $section_four_cat->products();
        // dd($section_one);
        return view('frontend.index', compact('home_page','section_one','section_three', 'section_four','sliders', 'categories'));
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function warranty()
    {
        $warranty = Warranty::first();
        return view('frontend.warranty', compact('warranty'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function search(Request $request)
    {
    //   $products = FacadesDB::table('products')
    //     ->where('name', 'LIKE', "%{$request->product_name}%")
    //     ->where('deleted_at', null)
    //     ->paginate(12);
        // dd($products);
        $products = Product::whereTranslationLike('name', "%{$request->product_name}%", \App::getLocale())
        ->where('deleted_at', null)
        ->paginate(12);
// dd();
        $categories = Category::all();
        return view('frontend.products', compact('products', 'categories'));
    }

}
