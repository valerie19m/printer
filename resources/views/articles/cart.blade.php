@extends('layouts.app')

@section('content')

<style>

body{
    font-family:Inter, Arial, sans-serif;
    color:#111;
    background:#f8f9fc;
}

.cart-page{
    padding:60px 15px;
}

.cart-container{
    width:100%;
    max-width:1200px;
    margin:auto;
}

.cart-title{
    text-align:center;
    font-size:36px;
    font-weight:900;
    margin-bottom:35px;
    color:#111827;
}

.cart-box{
    background:white;
    border-radius:24px;
    padding:35px;
    box-shadow:0 15px 40px rgba(0,0,0,0.05);
}

.table-responsive{
    overflow-x:auto;
}

.cart-table{
    width:100%;
    border-collapse:collapse;
    min-width:700px;
}

.cart-table thead th{
    text-align:left;
    padding:16px 12px;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:0.5px;
    color:#888;
    border-bottom:1px solid #eee;
}

.cart-table tbody td{
    padding:24px 12px;
    border-bottom:1px solid #f3f4f6;
    vertical-align:middle;
}

.cart-table tbody tr{
    transition:0.25s;
}

.cart-table tbody tr:hover{
    background:#fafafa;
}

.product{
    display:flex;
    align-items:center;
    gap:16px;
}

.product img{
    width:85px;
    height:85px;
    object-fit:cover;
    border-radius:16px;
    border:1px solid #eee;
    background:white;
}

.product-name{
    font-size:15px;
    font-weight:800;
    line-height:1.4;
    color:#111827;
}

.price-cell{
    font-weight:600;
    color:#374151;
}

.total-cell{
    font-size:16px;
    font-weight:800;
    color:#111827;
}

.qty{
    display:flex;
    align-items:center;
    gap:10px;
}

.qty form{
    margin:0;
}

.qty button{
    width:34px;
    height:34px;
    border-radius:10px;
    border:1px solid #e5e7eb;
    background:white;
    font-size:16px;
    font-weight:700;
    transition:0.25s;
    cursor:pointer;
}

.qty button:hover{
    background:#111827;
    color:white;
    border-color:#111827;
}

.qty span{
    min-width:24px;
    text-align:center;
    font-weight:700;
}

.remove-btn{
    width:36px;
    height:36px;
    border:none;
    border-radius:10px;
    background:#f3f4f6;
    color:#6b7280;
    font-size:20px;
    transition:0.25s;
    cursor:pointer;
}

.remove-btn:hover{
    background:#111827;
    color:white;
}

.bottom-section{
    margin-top:35px;
    display:flex;
    justify-content:flex-end;
}

.summary{
    width:100%;
    max-width:360px;
    border:1px solid #eee;
    border-radius:20px;
    padding:25px;
    box-shadow:0 15px 40px rgba(0,0,0,0.05);
    background:white;
}

.summary h3{
    font-size:22px;
    margin-bottom:20px;
    font-weight:800;
}

.summary-row{
    display:flex;
    justify-content:space-between;
    margin-bottom:12px;
    font-size:15px;
    color:#6b7280;
}

.total{
    margin-top:20px;
    padding-top:20px;
    border-top:1px solid #eee;
    font-size:24px;
    font-weight:900;
    color:#111827;
}

.checkout-btn{
    width:100%;
    margin-top:20px;
    padding:15px;
    border:none;
    border-radius:16px;
    background:#111827;
    color:white;
    font-weight:700;
    font-size:15px;
    transition:0.25s;
}

.checkout-btn:hover{
    transform:translateY(-2px);
    background:black;
}

.empty-cart{
    text-align:center;
    padding:60px 20px;
    font-size:18px;
    color:#6b7280;
}

@media(max-width:992px){

    .cart-box{
        padding:25px;
    }

    .cart-title{
        font-size:30px;
    }
}

@media(max-width:768px){

    .cart-page{
        padding:40px 10px;
    }

    .cart-box{
        padding:18px;
        border-radius:18px;
    }

    .cart-title{
        font-size:26px;
        margin-bottom:25px;
    }

    .product{
        gap:12px;
    }

    .product img{
        width:70px;
        height:70px;
    }

    .product-name{
        font-size:14px;
    }

    .qty{
        gap:6px;
    }

    .qty button{
        width:30px;
        height:30px;
    }

    .summary{
        max-width:100%;
    }

    .total{
        font-size:22px;
    }
}

@media(max-width:576px){

    .cart-table{
        min-width:650px;
    }

    .cart-title{
        font-size:24px;
    }

    .summary{
        padding:20px;
    }

    .checkout-btn{
        padding:14px;
    }
}

</style>

<div class="cart-page">

    <div class="cart-container">


        <div class="cart-title">
            {{ __('messages.shopping_cart') }}
        </div>

        <div class="cart-box">

            @php $total = 0; @endphp

            @if($cart->count() > 0)

            <div class="table-responsive">

                <table class="cart-table">

                    <thead>

                        <tr>

                            <th>{{ __('messages.product') }}</th>

                            <th>{{ __('messages.price') }}</th>

                            <th>{{ __('messages.quantity') }}</th>

                            <th>{{ __('messages.total') }}</th>

                            <th></th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($cart as $item)

                        @php
                            $subtotal = $item->article->price * $item->quantity;
                            $total += $subtotal;
                        @endphp

                        <tr>

                            <td>

                                <div class="product">

                                    <img src="{{ $item->article->image }}" alt="">

                                    <div class="product-name">

                                        {{ $item->article->title }}

                                    </div>

                                </div>

                            </td>

                            <td class="price-cell">

                                {{ $item->article->price }}
                                {{ __('messages.lei_currency') }}

                            </td>


                            <td>

                                <div class="qty">

                                    <form action="{{ route('cart.decrease', $item->article_id) }}"
                                          method="POST">

                                        @csrf

                                        <button type="submit">−</button>

                                    </form>

                                    <span>{{ $item->quantity }}</span>

                                    <form action="{{ route('cart.increase', $item->article_id) }}"
                                          method="POST">

                                        @csrf

                                        <button type="submit">+</button>

                                    </form>

                                </div>

                            </td>

                            <td class="total-cell">

                                {{ $subtotal }}
                                {{ __('messages.lei_currency') }}

                            </td>

                            <td>

                                <form action="{{ route('cart.remove', $item->article_id) }}"
                                      method="POST">

                                    @csrf

                                    <button class="remove-btn">
                                        ×
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            <div class="bottom-section">

                <div class="summary">

                    <h3>
                        {{ __('messages.total') }}
                    </h3>

                    <div class="summary-row">

                        <span>
                            {{ __('messages.total') }}
                        </span>

                        <span>
                            {{ $total }} {{ __('messages.lei_currency') }}
                        </span>

                    </div>

                    <div class="total">

                        {{ $total }}
                        {{ __('messages.lei_currency') }}

                    </div>

                    <a href="{{ route('checkout.index') }}">

                        <button class="checkout-btn">

                            {{ __('messages.proceed_checkout') }}

                        </button>

                    </a>

                </div>

            </div>

            @else

            <div class="empty-cart">

                {{ __('messages.cart_empty') }}

            </div>

            @endif

        </div>

    </div>

</div>

@endsection