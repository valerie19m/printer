<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Article;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('article')
            ->where('user_id', auth()->id())
            ->get();

        return view('articles.cart', compact('cart')); 
    }

    public function addToCart($id)
    {
        if (!auth()->check()) {
            return redirect('/index')
                ->with('error', 'You must login first.');
        }

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('article_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'article_id' => $id,
                'quantity' => 1
            ]);
        }

        return back()->with('success', 'Added to cart');
    }

    public function increaseQuantity($id)
{
    $cartItem = Cart::where('user_id', auth()->id())
        ->where('article_id', $id)
        ->first();

    if ($cartItem) {
        $cartItem->increment('quantity');
    }

    return back();
}

public function decreaseQuantity($id)
{
    $cartItem = Cart::where('user_id', auth()->id())
        ->where('article_id', $id)
        ->first();

    if ($cartItem) {

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }
    }

    return back();
}
public function remove($id)
{
    Cart::where('user_id', auth()->id())
        ->where('article_id', $id)
        ->delete();

    return back();
}
}