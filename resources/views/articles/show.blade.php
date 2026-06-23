@php
$editMode = session('editMode', false);
@endphp
@extends('layouts.app')
@php
    $favoriteIds = $favoriteIds ?? [];
@endphp
@section('content')

<style>

    body{
        background:#f5f5f5;
        font-family:Inter, Arial, sans-serif;
        color:#111;
    }

    .product-page{
        padding:70px 0;
    }

    .product-container{
        width:92%;
        max-width:1200px;
        margin:auto;
    }

    .product-card{
        background:#fff;
        border:1px solid #e8e8e8;
        border-radius:36px;
        overflow:hidden;
        display:grid;
        grid-template-columns:1fr 1fr;
        box-shadow:0 10px 40px rgba(0,0,0,0.05);
    }

    /* IMAGE */
    .product-image-side{
        background:#111;
        padding:70px;
        display:flex;
        align-items:center;
        justify-content:center;
        position:relative;
        overflow:hidden;
    }

    .product-image-side::before{
        content:'';
        position:absolute;
        width:340px;
        height:340px;
        border-radius:50%;
        background:rgba(255,255,255,0.04);
        top:-140px;
        right:-100px;
    }

    .product-image{
        position:relative;
        z-index:2;
        width:100%;
        max-width:430px;
        max-height:430px;
        object-fit:contain;
        filter:drop-shadow(0 25px 40px rgba(0,0,0,0.4));
        transition:.4s ease;
    }

    .product-image:hover{
        transform:scale(1.03);
    }

    /* INFO */
    .product-info{
        padding:65px 60px;
        display:flex;
        flex-direction:column;
        justify-content:center;
    }

    .product-title{
        font-size:54px;
        font-weight:900;
        line-height:1.02;
        letter-spacing:-2px;
        margin-bottom:25px;
        color:#111;
    }

    .description{
        font-size:16px;
        line-height:1.9;
        color:#666;
        margin-bottom:35px;
        max-width:520px;
    }

    .price{
        font-size:58px;
        font-weight:900;
        letter-spacing:-2px;
        color:#111;
        margin-bottom:40px;
    }

    /* ACTIONS */
    .product-actions{
        display:flex;
        align-items:center;
        gap:16px;
        flex-wrap:wrap;
    }

    .cart-form,
    .favorite-form{
        margin:0;
    }

    .cart-btn{
        border:none;
        background:#111;
        color:#fff;
        padding:17px 34px;
        border-radius:50px;
        font-weight:700;
        font-size:15px;
        cursor:pointer;
        transition:.3s ease;
        display:flex;
        align-items:center;
        justify-content:center;
        min-width:190px;
    }

    .cart-btn h5{
        margin:0;
        font-size:15px;
        font-weight:700;
    }

    .cart-btn:hover{
        background:#000;
        transform:translateY(-2px);
    }

    /* FAVORITE BUTTON */
    .favorite-btn{
        width:58px;
        height:58px;
        border:none;
        border-radius:50%;
        background:#f3f3f3;
        color:#111;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        transition:.3s ease;
        font-size:20px;
    }

    .favorite-btn:hover{
        background:#111;
        color:#fff;
        transform:translateY(-2px);
    }

    .favorite-btn i.active{
        color:#111;
    }

    .favorite-btn:hover i.active{
        color:#fff;
    }

    /* BACK BUTTON */
    .btn-secondary{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:17px 30px;
        background:#f3f3f3;
        color:#111;
        border-radius:50px;
        text-decoration:none;
        font-weight:700;
        transition:.3s ease;
    }

    .btn-secondary:hover{
        background:#e8e8e8;
        color:#111;
        transform:translateY(-2px);
    }
/* ACTIVE HEART */
.favorite-btn i.active {
    color: #ff4d6d;
}

.favorite-btn {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    border: none;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.25s ease;
}

.favorite-btn:hover {
    background: #111827;
}

.favorite-btn i {
    font-size: 20px;
    color: #6b7280;
    transition: 0.25s ease;
}

.favorite-btn:hover i {
    color: white;
}

.favorite-btn i.active {
    color: #ff4d6d;
}
    /* RESPONSIVE */
    @media(max-width:991px){

        .product-card{
            grid-template-columns:1fr;
        }

        .product-image-side{
            padding:50px 30px;
        }

        .product-info{
            padding:45px 30px;
        }

        .product-title{
            font-size:42px;
        }

        .price{
            font-size:46px;
        }
    }

    @media(max-width:576px){

        .product-title{
            font-size:34px;
        }

        .description{
            font-size:15px;
        }

        .price{
            font-size:38px;
        }

        .product-actions{
            flex-direction:column;
            align-items:stretch;
        }

        .cart-btn,
        .btn-secondary{
            width:100%;
        }

        .favorite-btn{
            width:100%;
            border-radius:18px;
            height:56px;
        }
    }

</style>

<div class="product-page">

    <div class="product-container">

        <div class="product-card">

            <!-- IMAGE -->
            <div class="product-image-side">

                <img
                    src="{{ $article->image }}"
                    alt="{{ $article->title }}"
                    class="product-image"
                >

            </div>

            <!-- INFO -->
            <div class="product-info">

                <h1 class="product-title">
                    {{ $article->title }}
                </h1>

                <p class="description">
                    {{ $article->description }}
                </p>

                <div class="price">
                    {{ $article->price }} lei
                </div>

                <div class="product-actions">

                    <!-- ADD TO CART -->
                    <form action="{{ route('cart.add', $article->id) }}" method="POST" class="cart-form">
                        @csrf

                        <button type="submit" class="cart-btn">
                            <h5>{{ __('messages.add_to_cart') }}</h5>
                        </button>
                    </form>

                    <!-- FAVORITE -->
                    <form action="{{ route('favorites.add', $article->id) }}" method="POST" class="favorite-form">
                @csrf

                <button type="submit" class="favorite-btn">
                    <i class="fa-solid fa-heart {{ in_array($article->id, $favoriteIds) ? 'active' : '' }}"></i>
                </button>
            </form>

                    <!-- BACK -->
                    <a
                       href="{{ route('products') }}"
                        class="btn-secondary"
                    >
                        {{ __('messages.back_to_products') }}
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
<script>
  
document.querySelectorAll('.favorite-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': this.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            }
        })
        .then(() => {
            const icon = this.querySelector('i');
            const isActive = icon.classList.toggle('active');

              if (isActive) {
                showMessage('{{ __("messages.added_to_favorites") }}');
            } else {
                showMessage('{{ __("messages.removed_from_favorites") }}');
            }
        });
    });
});

    </script>
@endsection