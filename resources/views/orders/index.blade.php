@extends('layouts.app')

@section('content')

<style>
body{
    font-family: Inter, Arial, sans-serif;
    color:#111;
}

/* PAGE WRAPPER */
.orders-page{
    padding:30px 20px;
    display:flex;
    justify-content:center;
}

/* CONTAINER */
.orders-container{
    width:100%;
    max-width:1000px;
}

/* TITLE */
.orders-title{
    text-align:center;
    font-size:32px;
    font-weight:900;
    margin-bottom:30px;
}

/* ORDER CARD */
.order-card{
    background:#fff;
    border-radius:18px;
    padding:25px;
    margin-bottom:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
    border:1px solid #eee;
    transition:0.2s ease;
}

.order-card:hover{
    transform:translateY(-2px);
}

/* HEADER */
.order-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
    flex-wrap:wrap;
    gap:10px;
}

.order-id{
    font-size:16px;
    font-weight:900;
}

.order-total{
    font-weight:800;
    color:#111;
}

/* ITEMS */
.order-items{
    border-top:1px solid #f0f0f0;
    padding-top:15px;
}

.order-item{
    display:flex;
    justify-content:space-between;
    padding:10px 0;
    font-size:14px;
    color:#444;
    border-bottom:1px solid #f7f7f7;
}

.order-item:last-child{
    border-bottom:none;
}

/* PRODUCT NAME */
.item-name{
    font-weight:700;
}

/* EMPTY */
.empty-state{
    text-align:center;
    padding:40px;
    color:#888;
    background:#fff;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}
</style>

<div class="orders-page">

<div class="orders-container">

    <div class="orders-title">  {{ __('messages.order_history') }}</div>

    @if($orders->count() > 0)

        @foreach($orders as $order)

            <div class="order-card">

                <!-- HEADER -->
                <div class="order-header">

                    <div class="order-id">
                        {{ __('messages.order') }} #{{ $order->id }}
                    </div>

                    <div class="order-total">
                        {{ __('messages.order_total') }}: {{ $order->total }} {{__('messages.lei_currency') }}
                    </div>

                </div>

                <!-- ITEMS -->
                <div class="order-items">

                    @foreach($order->items as $item)

                        <div class="order-item">

                            <div class="item-name">
                                {{ $item->article->title ?? 'Product' }}
                            </div>

                            <div>
                                x{{ $item->quantity }} • {{ $item->price }} {{__('messages.lei_currency') }}
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @endforeach

    @else

        <div class="empty-state">
           {{ __('messages.no_orders') }}
        </div>

    @endif

</div>

</div>

@endsection