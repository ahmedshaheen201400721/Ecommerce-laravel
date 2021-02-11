<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\support\filters\ProductFilter;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products=Product::relatedproducts(12)->get();
        return view('pages.index',['products'=>$products]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)

    {
        $products=Product::where('slug','!=',$product->slug)->inRandomOrder()->take(4)->get();
        return view('pages.single',['product'=>$product,'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function shop(ProductFilter $filter)
    {
        $categories=Category::get();
        if(\request()->has('category') or \request()->has('order')){
            $products=Product::filters($filter)->paginate(9);
            $products->withPath(route('shop.index',['category'=>\request()->category,'order'=>\request()->order]));
            return view('pages.shop',['products'=>$products,'categories'=>$categories,'name'=>\request()->category]);
        }
        else{
            $products=Product::inRandomOrder()->paginate(9);
            return view('pages.shop',['products'=>$products,'categories'=>$categories]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
