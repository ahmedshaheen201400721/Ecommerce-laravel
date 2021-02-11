<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class couponController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['code'=>'required|exists:coupons,code']);
        $coupon=Coupon::where('code',$request->code)->first();
        $totalbefore=Cart::subtotal();
        $discount=$coupon->discount($totalbefore);
        $total=$totalbefore-$discount;
        session()->put(['subtotal'=>$total,'discount'=>$discount,'code'=>$request->code]);
//        $coupon->destroy();
        return redirect()->back()->with('success','coupen has been applied');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget(['code','discount','subtotal']);
        return redirect()->back()->with('success','coupen has been removed');
    }
}
