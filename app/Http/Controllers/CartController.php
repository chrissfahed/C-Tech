<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('cart');
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
        $duplicates = Cart::search(function($cartitem,$rowid) use ($request){
            return $cartitem->id == $request->id;
        });
        if($duplicates->isnotempty()){
            return redirect()->route('cart.index')->with('success_message','Item is already in your cart!');
        }
        Cart::add($request->id ,$request->name , 1 ,$request->price)
            ->associate('App\Models\Item');
            
            return redirect()->route('cart.index')->with('success_message','Item was added to your cart!');
    }
    public function empty()
    {

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
        
        return $request->All();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowid)
    {   
        Cart::remove($rowid);
        return back()->with('success_message','item has been removed');
    }

    
    
    public function emptycart( )
    {
        Cart::destroy();
        return back()->with('success_message','all items have been removed');
    }

}
