<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderItem;


class CheckoutController extends Controller
{
   public function index()
{
    $cart = Cart::with('article')
        ->where('user_id', auth()->id())
        ->get();

    return view('checkout.index', compact('cart'));
}

  

public function process(Request $request)
{
    $cart = Cart::with('article')
        ->where('user_id', auth()->id())
        ->get();

    if ($cart->isEmpty()) {
        return back()->with('error', 'Cart is empty');
    }

    $total = 0;

    foreach ($cart as $item) {
        $total += $item->article->price * $item->quantity;
    }

    $order = Order::create([
        'name' => $request->name,
        'address' => $request->address,
        'total' => $total
    ]);

    foreach ($cart as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'article_id' => $item->article_id,
            'quantity' => $item->quantity,
            'price' => $item->article->price
        ]);
    }

    Cart::where('user_id', auth()->id())->delete();

    return redirect()->route('checkout.success');
}

    public function success()
    {
        return view('checkout.success');
    }
    

public function orders()
{
    $orders = Order::with('items')->latest()->get();
    return view('orders.index', compact('orders'));
}
}
