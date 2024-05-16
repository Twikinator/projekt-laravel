<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [];
        }
        return view ('cart', ['cart' => $cart]);
    }

    public function addToCart(int $id){
        $product = Product::query()->findOrFail($id);
        $cart = session()->get('cart');
        $cart[$product->id] = $product;
        session()->put('cart', $cart); 
        return redirect()->route('shop.index');
    }

    public function removeFromCart(int $id){
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function clearCart(){
        session()->forget('cart');
        return redirect()->route('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
