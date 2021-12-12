<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = auth()->user()->id;
        $orders = Order::all()->where('user_id', '=', $uid);
        // dd($orders);
        return view("profile")->with([
            'orders' => $orders,
        
        ]);
    }

    public function showOrder($id)
    {
        $uid = auth()->user()->id;
        $orders = Order::all()->where('user_id', '=', $uid)->sortby('shipped');

        $order = Order::where('id',$id)->firstOrFail();
        $items = $order->items;
        // dd($order);
        // dd($items);

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'numeric'],
            'Address' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        if (! $request->filled('password')){
            $user->fill($input)->save();
            return back()->with('success_message', 'Profile updated successfully!');
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        return back()->with('success_message', 'Profile and Password updated successfully!');

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
