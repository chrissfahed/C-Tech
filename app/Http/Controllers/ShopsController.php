<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = item::paginate(2);

        $brand = Item::distinct()->get(['brand']);
        $type = Item::distinct()->get(['type']);
        // $type =item::get(['type']);
        // dd($brand);
        return view('shop')->with([
            'products'=>$products,
            'brand'=>$brand,
            'type'=>$type
        ]);
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
    public function show($id)
    {   ($id);
        $products = item::where('id','=',$id)->get();
        //dd($products);
        return view('detail')->with('products',$products);
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


    public function search(Request $request)
    {
            $products = Item::paginate(2);
        if (request()->type) {
            $products = $products->where('type', request()->type)->paginate(2);
        }

        if (request()->brand) {
            $products = $products->where('brand', request()->brand)->paginate(2);
        }

        if (request()->status) {
            $products = $products->where('status', request()->status)->paginate(2);
        }

        // $products = $products->paginate(6);

        $brand = Item::distinct()->get(['brand']);
        $type = Item::distinct()->get(['type']);
    
        return view('shop')->with([
            'products'=>$products,
            'brand'=>$brand,
            'type'=>$type
        ]);
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

}
