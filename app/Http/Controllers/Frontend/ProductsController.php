<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\ProductPage;
use App\ProductsImage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(12);
        $productpage = ProductPage::first();
        $categories = Category::all();
        return view('frontend.products', compact('products', 'productpage', 'categories'));
    }

    public function category($lang, Category $category)
    {
        $products = $category->products();
        $productpage = ProductPage::first();
        $categories = Category::all();
        return view('frontend.products', compact('products', 'productpage', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Product $our_product)
    {
        $previous_record = Product::where('id', '<', $our_product->id)->orderBy('id','desc')->get()->take(2);
        $next_record = Product::where('id', '>', $our_product->id)->orderBy('id')->get()->take(3);
        $on_sale = Product::inRandomOrder()->limit(5)->get();
        // $images = ProductsImage::where('id', $our_product->id);
        $images = $our_product->images()->get();
        $categories = Category::all();
        $productpage = ProductPage::first();
        return view('frontend.product', compact('our_product', 'categories','previous_record', 'next_record','images', 'productpage', 'on_sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadfile($id)
    {
        $dl = Product::find($id);
        return response()->download(storage_path('app/public/products/files/'.$dl->file)); //Storage::download($dl->resume, $dl->name);
    }

}
