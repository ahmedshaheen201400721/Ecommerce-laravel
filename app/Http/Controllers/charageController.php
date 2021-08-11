<?php

namespace App\Http\Controllers;

use App\Http\Requests\chargeRequest;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
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
        try {
            $invoice= $this->invoice();
            $stripeCharge = $request->user()->charge(
                total($invoice['total']), $request->paymentMethodId
            );
             $this->creatOrder();
            $this->updateProduct();
            isset($stripeCharge)?Cart::destroy():'';
            Coupon::where('code',session('code'))->delete();
            session()->forget(['code','discount','subtotal']);

            return redirect(route('thanks'));
        }catch (\Exception $e){
            return back()->withErrors('Error !'. $e->getMessage());
        }

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

    protected function creatOrder(){
        $invoice= $this->invoice();

        $products=Cart::content()->map(function($v,$k){return [ 'qty'=>$v->qty,'product_id'=>$v->id] ;});

        Order::create([
            'user_id'=>auth()->id(),
            'billing_total'=>$invoice['total'],
            'billing_subtotal'=>$invoice['subtotal'],
            'billing_tax'=>$invoice['tax'],
            'products'=>$products,
        ]);
    }

    protected function updateProduct(){
        foreach (Cart::content() as $product){
            Product::find($product->model->id)->update(['quantity'=>$product->model->quantity-$product->qty]);
        }
    }
}
