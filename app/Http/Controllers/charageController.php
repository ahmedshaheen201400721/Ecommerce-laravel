<?php

namespace App\Http\Controllers;

use App\Http\Requests\chargeRequest;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class charageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartProducts=Cart::instance('default')->content();
        $invoice=$this->invoice();
        $invoice=array_merge($invoice,['cartProducts'=>$cartProducts]);
        return view('pages.charge',$invoice);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(chargeRequest $request)
    {
        $stripeCharge = $request->user()->charge(
            total( $this->invoice()['total']), $request->paymentMethodId
        );
        isset($stripeCharge)?Cart::destroy():'';
        Coupon::where('code',session('code'))->delete();
        session()->forget(['code','discount','subtotal']);

        return redirect(route('thanks'));
    }
   private function invoice()
    {
        if(session()->has('subtotal')){
//            dd(session()->all());
            $subtotal=session('subtotal');
            $tax=$subtotal*21/100;
            $total=$subtotal+$tax;
            $total=round($total,2);
            return compact('subtotal','tax','total');
        }else{
            $subtotal=Cart::subtotal();
            $tax=Cart::tax();
            $total=Cart::total();
            return compact('subtotal','tax','total');
        }

    }
}
