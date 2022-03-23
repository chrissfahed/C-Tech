<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\items;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Item;
use Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('checkout');
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
        // if ($this->productsAreNoLongerAvailable()){
        //     return back()->withErrors('Sorry! One of the items in your cart is no longer available.');
        // }
        
        $uid=$request->u_id;
        
        $order = Order::create([
            // dd($request) 
            'user_id' => auth()->user()->id,
            'billing_name' => $request->u_name,
            'billing_email' => auth()->user()->email,
            'billing_address' => $request->u_Address,
            'billing_phone' => $request->u_phonenumber,
            'billing_total' => $request->c_total,
            'shipped' => 0,
        ]);

        foreach(Cart::content() as $item){
            orderItem::create([
                'order_id' => $order->id,
                'item_id' => $item->id,
                'quantity' => $item->qty,
            ]);
        }
        foreach (Cart::content() as $item){
             $product = item::find($item->id);
            //dd($item->qty);
            //item::update(['quantity' => $product->quantity - $item->qty]); 
            //$item::where('id',$item->id)->update(['quantity' => $product->quantity - $item->qty]);
        }


        Cart::destroy();
        return view('thankyou');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    // protected function productsAreNoLongerAvailable()
    // {
    //     foreach (Cart::content() as $product){
    //         $item = item::find($item->id);
    //         if ($product->quantity < $item->qty){
    //             return TRUE;
    //         }
    //     }
    //     return FALSE;
    // }
}
