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
        $stock=$this->get_qty($product->quantity);
        return view('pages.single',['product'=>$product,'products'=>$products,'stock'=>$stock]);
    }

    protected function get_qty($qty){
        if($qty>setting('admin.qty')){
            return '<span class="bg-green-600 font-bold rounded-full p-1 text-white">high stock</span>';
        }elseif ($qty<setting('admin.qty') and $qty>0){
            return '<span class="bg-yellow-600 font-bold rounded-full p-1 text-white">low stock</span>';
        }else{
            return '<span class="bg-red-600 font-bold rounded-full p-1 text-white">unavailable</span>';
        }
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
       
        $products=Product::filters($filter)->inRandomOrder()->paginate(9);
        $products->withPath(request()->getUri());
        return view('pages.shop',['products'=>$products,'categories'=>$categories,'name'=>\request()->category]);



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
