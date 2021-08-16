<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saved=Cart::instance('saveForLater')->content();
        $products=Product::relatedproducts(4)->get();
        $cartProducts=Cart::instance('default')->content();
        return view('pages.cart',compact('products','cartProducts','saved'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(  $this->cartCheck($request,'default')){
           return redirect(route('cart.index'))->with('msg','item already in your');
        }

        Cart::instance('default')->add($request->id,$request->name,1,$request->price/100)->associate('App\Models\Product');
        return redirect(route('cart.index'))->with('msg','item added to cart successfully');
    }

    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator=Validator::make($request->all(),['value'=>'required|integer|between:1,6']);
        if($validator->fails()){
            session()->flash('error','this qunaity is overpriced');
            return response()->json(['success'=>true],500);
        }

        Cart::update($request->id,['qty'=>$request->value]);
        session()->flash('msg','quantity was updated');
        return ['success'=>true];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return  redirect(route('cart.index'))->with('msg','item was removed successfully');
    }


    public function switchToSaved($id)
    {
        $item=Cart::get($id);
        Cart::remove($id);
        $this->cartCheck($item,'saveForLater');

        Cart::instance('saveForLater')->add($item->id,$item->name,$item->qty,$item->price)->associate('App\Models\Product');

        return  redirect(route('cart.index'))->with('msg','item was saved  successfully');
    }

    public function back($id)
    {
        $item=Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

       $this->cartCheck($item,'default');

        Cart::instance('default')->add($item->id,$item->name,$item->qty,$item->price)->associate('App\Models\Product');

        return  redirect(route('cart.index'))->with('msg','item was returned back  successfully');
    }

    public function destroySaved($id)
    {
        Cart::instance('saveForLater')->remove($id);
        return  redirect(route('cart.index'))->with('msg','saved item was removed successfully');
    }


    public function cartCheck($item,$type){
        $duplicate=Cart::instance($type)->search(function ($cartItem, $rowId) use ($item){
            return $cartItem->id === $item->id;
        });

        if($duplicate->count()>0){
            return true;
        }
    }
}
