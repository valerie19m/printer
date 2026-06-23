@extends('layouts.app')

@section('content')

<style>
body{
    font-family: Inter, Arial, sans-serif;
    color:#111;
}

/* PAGE WRAPPER */
.checkout-page{
    padding:60px 20px;
    display:flex;
    justify-content:center;
}

/* CONTAINER */
.checkout-container{
    width:100%;
    max-width:1100px;
}

/* TITLE */
.checkout-title{
    text-align:center;
    font-size:32px;
    font-weight:900;
    margin-bottom:30px;
}

/* BOX */
.checkout-box{
    display:flex;
    gap:30px;
    flex-wrap:wrap;
}

/* FORM CARD */
.checkout-form{
    flex:1;
    min-width:320px;
    background:#fff;
    border-radius:18px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.checkout-form label{
    display:block;
    font-size:12px;
    text-transform:uppercase;
    color:#888;
    margin-bottom:8px;
    font-weight:700;
}

.checkout-form input{
    width:100%;
    padding:14px;
    border-radius:12px;
    border:1px solid #e5e5e5;
    margin-bottom:20px;
    font-size:14px;
    transition:0.2s;
}

.checkout-form input:focus{
    outline:none;
    border-color:#111;
}

/* BUTTON */
.place-order-btn{
    width:100%;
    padding:14px;
    background:#111;
    color:#fff;
    border:none;
    border-radius:12px;
    cursor:pointer;
    font-weight:700;
    transition:0.25s ease;
}

.place-order-btn:hover{
    transform:translateY(-2px);
}

/* ORDER SUMMARY */
.order-summary{
    width:320px;
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
    border:1px solid #eee;
    height:fit-content;
}

.order-summary h2{
    font-size:18px;
    margin-bottom:15px;
    font-weight:900;
}

.order-item{
    padding:12px 0;
    border-bottom:1px solid #f0f0f0;
    font-size:14px;
    color:#444;
}

.order-item:last-child{
    border-bottom:none;
}

.empty-cart{
    text-align:center;
    padding:20px;
    color:#888;
}
</style>

<div class="checkout-page">

<div class="checkout-container">

    <div class="checkout-title"> {{ __('messages.checkout') }}</div>

    <div class="checkout-box">

        <!-- FORM -->
        <form class="checkout-form" action="{{ route('checkout.process') }}" method="POST">
            @csrf

             <label>{{ __('messages.name') }}</label>
            <input type="text" name="name" required>

            <label>{{ __('messages.address') }}</label>
            <input type="text" name="address" required>

            <button class="place-order-btn" type="submit">
                {{ __('messages.place_order') }}
            </button>
        </form>

       <!-- ORDER SUMMARY -->
<div class="order-summary">

    <h2>{{ __('messages.order_summary') }}</h2>

    @php $total = 0; @endphp

    @if($cart->count() > 0)

        @foreach($cart as $item)

            @php
                $subtotal = $item->article->price * $item->quantity;
                $total += $subtotal;
            @endphp

            <div class="order-item" style="display:flex; justify-content:space-between; gap:10px; align-items:center; flex-wrap:wrap;">

                <!-- PRODUCT INFO -->
                <div>
                    <div style="font-weight:700;">
                        {{ $item->article->title }}
                    </div>

                    <div style="font-size:12px; color:#888;">
                        {{ $item->quantity }} ×  {{ $item->article->price }} {{ __('messages.lei_currency') }}
                    </div>
                </div>

                <!-- SUBTOTAL -->
                <div style="font-weight:800;">
                     {{ $subtotal }} {{ __('messages.lei_currency') }}
                </div>

            </div>

        @endforeach

        <!-- TOTAL -->
        <div style="margin-top:15px; padding-top:15px; border-top:1px solid #eee; display:flex; justify-content:space-between; font-weight:900; font-size:16px;">
            <span>Total</span>
            <span> {{ $total }} {{ __('messages.lei_currency') }}</span>
        </div>

    @else

        <div class="empty-cart"> {{ __('messages.empty_cart') }}</div>

    @endif

</div>

    </div>

</div>

</div>

@endsection