<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $products = item::all();
        $products = item::paginate(6);

        $brand = Item::distinct()->get(['brand']);
        $type = Item::distinct()->get(['type']);

        // $products = $products->paginate(3);
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
        // YOU CANNOT PAGINATE AN ELOQUENT COLLECTION. 
        // THIS IS WHY YOU SHOULDNT FETCH DATA LIKE THIS ----> $products = item::all();

        $products = DB::table('items');
        // INSTEAD YOU SHOULD FETCH IT LIKE THIS ^

        if (request()->type) {
            $products = $products->where('type', request()->type);
        }

        if (request()->brand) {
            $products = $products->where('brand', request()->brand);
        }

        if (request()->status) {
            $products = $products->where('status', request()->status);
        }

        // ALWAYS PAGINATE AFTER FILTERING RESULTS.
        // IF YOU PAGINATE FO2 BYETLA3LAK INCOMPLETE RESULTS (3 ITEMS IN THIS CASE) 
        // IN OTHER WORDS YOU FILTER 3 ITEMS BADEL THE WHOLE ITEMS TABLE

        $products = $products->paginate(6);

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
