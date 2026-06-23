@php
    $editMode = session('editMode', false);
@endphp

@extends('layouts.app')

@section('title', 'Livrare')

@push('styles')
<style>

    body{
        background:#f5f5f5;
        font-family:Inter, Arial, sans-serif;
        color:#111;
    }

    .delivery-page{
        padding:30px 0;
    }

    .delivery-hero{
        background:#111;
        border-radius:32px;
        padding:80px 60px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:50px;
        position:relative;
        overflow:hidden;
        margin-bottom:40px;
    }

    .delivery-hero::after{
        content:'';
        position:absolute;
        width:340px;
        height:340px;
        background:rgba(255,255,255,0.04);
        border-radius:50%;
        top:-120px;
        right:-80px;
    }

    .hero-content{
        position:relative;
        z-index:2;
        max-width:600px;
    }

    .hero-content h1{
        font-size:62px;
        line-height:1.05;
        font-weight:900;
        color:#fff;
        margin-bottom:25px;
        letter-spacing:-2px;
    }

    .hero-content p{
        color:rgba(255,255,255,0.75);
        font-size:18px;
        line-height:1.9;
        margin-bottom:35px;
    }

    .hero-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        background:#fff;
        color:#111;
        padding:16px 34px;
        border-radius:50px;
        font-weight:700;
        text-decoration:none;
        transition:.3s ease;
    }

    .hero-btn:hover{
        background:#f2f2f2;
        color:#111;
        transform:translateY(-2px);
    }

    .hero-image{
        position:relative;
        z-index:2;
    }

    .hero-image img{
        width:100%;
        max-width:320px;
        filter:grayscale(100%) brightness(1.2);
    }

    .delivery-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(280px,1fr));
        gap:25px;
        margin-bottom:30px;
    }

    .delivery-card{
        background:#fff;
        border-radius:28px;
        padding:35px 30px;
        border:1px solid #e8e8e8;
        box-shadow:0 5px 20px rgba(0,0,0,0.04);
        transition:.3s ease;
    }

    .delivery-card:hover{
        transform:translateY(-5px);
        box-shadow:0 15px 35px rgba(0,0,0,0.08);
    }

    .delivery-icon{
        width:72px;
        height:72px;
        border-radius:22px;
        background:#111;
        display:flex;
        align-items:center;
        justify-content:center;
        margin-bottom:25px;
    }

    .delivery-icon img{
        width:34px;
        height:34px;
        filter:brightness(0) invert(1);
    }

    .delivery-card h3{
        font-size:24px;
        font-weight:800;
        margin-bottom:18px;
        color:#111;
        letter-spacing:-1px;
    }

    .delivery-card p{
        color:#666;
        line-height:1.9;
        margin:0;
        font-size:15px;
    }

    .delivery-pricing{
        background:#fff;
        border-radius:32px;
        padding:50px;
        border:1px solid #e8e8e8;
        box-shadow:0 5px 20px rgba(0,0,0,0.04);
        margin-top:40px;
    }

    .delivery-pricing h2{
        text-align:center;
        font-size:42px;
        font-weight:900;
        margin-bottom:40px;
        letter-spacing:-1px;
    }

    .pricing-items{
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(260px,1fr));
        gap:25px;
    }

    .pricing-box{
        background:#fafafa;
        border:1px solid #ededed;
        border-radius:28px;
        padding:35px;
        text-align:center;
        transition:.3s ease;
    }

    .pricing-box:hover{
        background:#111;
        color:#fff;
        transform:translateY(-4px);
    }

    .pricing-box h4{
        font-size:22px;
        font-weight:700;
        margin-bottom:18px;
    }

    .price{
        font-size:48px;
        font-weight:900;
        margin-bottom:12px;
        letter-spacing:-2px;
    }

    .pricing-box p{
        color:#777;
        line-height:1.7;
    }

    .pricing-box:hover p{
        color:rgba(255,255,255,0.7);
    }
    @media(max-width:991px){

        .delivery-hero{
            flex-direction:column;
            text-align:center;
            padding:55px 35px;
        }

        .hero-content h1{
            font-size:46px;
        }
    }

    @media(max-width:768px){

        .hero-content h1{
            font-size:38px;
        }

        .hero-content p{
            font-size:16px;
        }

        .delivery-card{
            padding:28px;
        }

        .delivery-pricing{
            padding:35px 25px;
        }

        .delivery-pricing h2{
            font-size:34px;
        }

        .price{
            font-size:38px;
        }
    }

</style>
@endpush

@section('content')

<div class="delivery-page">

    <div class="container">

        <div class="delivery-hero">

            <div class="hero-content">

                <h1>
                    {{ __('messages.delivery_fast_safe') }}
                </h1>

                <p>
                   {{ __('messages.delivery_hero_desc') }}
                </p>

                <a href="{{ url('/articles.products') }}" class="hero-btn">
                    {{ __('messages.start_shopping') }}
                </a>

            </div>

            <div class="hero-image">
                <img src="https://cdn-icons-png.flaticon.com/512/679/679922.png" alt="Delivery">
            </div>

        </div>

        <div class="delivery-grid">

            <div class="delivery-card">

                <div class="delivery-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/66/66163.png">
                </div>

                <h3>{{ __('messages.delivery_time') }}</h3>

                <p>
                   {{ __('messages.delivery_time_desc') }}
                </p>

            </div>

            <div class="delivery-card">

                <div class="delivery-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/71/71222.png">
                </div>

                <h3>{{ __('messages.delivery_conditions') }}
</h3>

                <p>
                   {{ __('messages.delivery_conditions_desc') }}
                </p>

            </div>

            <div class="delivery-card">

                <div class="delivery-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/126/126341.png">
                </div>

                <h3>{{ __('messages.order_confirmation') }}</h3>

                <p>
                   {{ __('messages.order_confirmation_desc') }}
                </p>

            </div>

        </div>

        <div class="delivery-grid">

            <div class="delivery-card">

                <div class="delivery-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/807/807323.png">
                </div>

                <h3>{{ __('messages.technical_support') }}</h3>

                <p>
                    {{ __('messages.technical_support_desc') }}
                </p>

            </div>

            <div class="delivery-card">

                <div class="delivery-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/10614/10614603.png">
                </div>

                <h3>{{ __('messages.product_check') }}</h3>

                <p>
                  {{ __('messages.product_check_desc') }}
                </p>

            </div>

            <div class="delivery-card">

                <div class="delivery-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/4718/4718655.png">
                </div>

                <h3>{{ __('messages.professional_service') }}</h3>

                <p>
                    {{ __('messages.professional_service_desc') }}
                </p>

            </div>

        </div>

        <div class="delivery-pricing">

            <h2>{{ __('messages.shipping_cost') }}</h2>

            <div class="pricing-items">

                <div class="pricing-box">

                    <h4>{{ __('messages.chisinau') }}</h4>

                    <div class="price">
                       {{ __('messages.delivery_price_chisinau') }}
                    </div>

                    <p>
                       {{ __('messages.delivery_city_desc') }}
                    </p>

                </div>

                <div class="pricing-box">

                    <h4>{{ __('messages.in_moldova') }}</h4>

                    <div class="price">
                       {{ __('messages.delivery_price_chisinau') }}
                    </div>

                    <p>
                       {{ __('messages.delivery_moldova_desc') }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection