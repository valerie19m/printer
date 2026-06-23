@php
$editMode = session('editMode', false);
@endphp

@extends('layouts.app')
@section('title', 'Home')

@push('styles')
<style>


.shop-layout{
    display:flex;
    gap:30px;
    width:100%;
    padding:20px 0;
    align-items:flex-start;
}


.filters{
    width:260px;
    min-width:260px;
    background:white;
    border-radius:24px;
    padding:24px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    height:fit-content;
}

.filters h4{
    font-size:18px;
    font-weight:700;
    margin-bottom:15px;
    color:#111827;
}

.filters input[type="number"]{
    width:100%;
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:10px 14px;
    margin-bottom:12px;
    outline:none;
}

.filters label{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:10px;
    font-size:14px;
    color:#374151;
}

.filters button{
    width:100%;
    border:none;
    background:#111827;
    color:white;
    border-radius:16px;
    padding:12px;
    margin-top:15px;
    transition:0.3s;
}

.filters button:hover{
    background:black;
}


.s6{
    flex:1;
    background:#f8f9fc;
    border-radius:24px;
    padding:30px;
    width:100%;
}


.section-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    margin-bottom:30px;
}

.section-header h2{
    font-size:34px;
    font-weight:700;
    margin:0;
    color:#111827;
}


.subcategory-wrapper{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    margin-bottom:25px;
}

.sub-btn{
    padding:10px 18px;
    border-radius:30px;
    background:white;
    border:1px solid #ddd;
    color:black;
    text-decoration:none;
    font-size:14px;
    transition:0.3s;
}

.sub-btn:hover{
    background:black;
    color:white;
}

.sub-btn.active{
    background:black;
    color:white;
    border-color:black;
}


.new-product-wrap{
    margin-bottom:30px;
}

.new-product-btn{
    border:none;
    background:#111827;
    color:white;
    border-radius:16px;
    padding:12px 24px;
    transition:0.3s;
}

.new-product-btn:hover{
    transform:translateY(-2px);
}


.products{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
    gap:25px;
}


.card{
    border:none;
    border-radius:28px;
    overflow:hidden;
    background:white;
    box-shadow:0 10px 35px rgba(0,0,0,0.05);
    transition:0.3s;

    display:flex;
    flex-direction:column;
    height:100%;
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:0 20px 45px rgba(0,0,0,0.08);
}

.card-link{
    text-decoration:none;
    color:inherit;
    padding:22px;
    display:flex;
    flex-direction:column;
    flex:1;
}


.product-image{
    width:100%;
    height:230px;
    object-fit:contain;
    margin-bottom:20px;
}


.card h3{
    font-size:20px;
    font-weight:700;
    color:#111827;
    line-height:1.4;
    margin-bottom:12px;
    min-height:56px;
}


.description{
    font-size:14px;
    line-height:1.6;
    color:#6b7280;

    display:-webkit-box;
    -webkit-line-clamp:3;
    -webkit-box-orient:vertical;

    overflow:hidden;
}

.price{
    margin-top:auto;
    padding-top:20px;
    font-size:30px;
    font-weight:700;
    color:#111827;
}


.card-actions{
    padding:0 22px 22px;
}


.bottom-actions{
    display:flex;
    gap:12px;
    margin-top:15px;
}

.cart-form{
    flex:1;
}

.favorite-form{
    width:52px;
}


.cart-btn,
.favorite-btn{
    width:100%;
    height:52px;
    border:none;
    border-radius:16px;
    background:#f3f4f6;

    display:flex;
    align-items:center;
    justify-content:center;

    transition:0.3s;
}

.favorite-btn{
    width:52px;
}

.cart-btn:hover,
.favorite-btn:hover{
    background:#111827;
}

.cart-btn h5{
    margin:0;
    font-size:15px;
    font-weight:600;
    color:#111827;
    transition:0.3s;
}

.favorite-btn i{
    font-size:20px;
    color:#6b7280;
    transition:0.3s;
}

.cart-btn:hover h5,
.favorite-btn:hover i{
    color:white;
}

.favorite-btn i.active{
    color:#ff4d6d;
}


.admin-actions{
    display:flex;
    gap:12px;
    margin-top:14px;
}

.admin-actions form{
    flex:1;
}

.edit-btn,
.delete-btn{
    width:100%;
    height:46px;
    border:none;
    border-radius:14px;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;

    font-size:14px;
    font-weight:600;
    text-decoration:none;

    transition:0.3s;
}

.edit-btn{
    background:#111827;
    color:white;
}

.edit-btn:hover{
    background:black;
}

.delete-btn{
    background:#fee2e2;
    color:#dc2626;
}

.delete-btn:hover{
    background:#dc2626;
    color:white;
}

.pagination-wrapper{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    gap:10px;
    margin-top:40px;
}

.page-btn{
    padding:10px 14px;
    border-radius:12px;
    background:white;
    color:black;
    border:1px solid #ddd;
    text-decoration:none;
    min-width:42px;
    text-align:center;
    transition:0.3s;
}

.page-btn:hover{
    background:black;
    color:white;
}

.page-btn.active{
    background:black;
    color:white;
    border-color:black;
}

.page-btn.disabled{
    opacity:0.4;
    pointer-events:none;
}


@media(max-width:1200px){

    .products{
        grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
    }
}

@media(max-width:992px){

    .shop-layout{
        flex-direction:column;
    }

    .filters{
        width:100%;
        min-width:100%;
    }

    .s6{
        width:100%;
    }
}

@media(max-width:768px){

    .s6{
        padding:20px;
    }

    .products{
        grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
    }

    .section-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .section-header h2{
        font-size:28px;
    }

    .price{
        font-size:26px;
    }

    .bottom-actions{
        flex-direction:column;
    }

    .favorite-form{
        width:100%;
    }

    .favorite-btn{
        width:100%;
    }

    .admin-actions{
        flex-direction:column;
    }
}

@media(max-width:576px){

    .products{
        grid-template-columns:1fr;
    }

    .card h3{
        min-height:auto;
    }

    .subcategory-wrapper{
        justify-content:center;
    }
}

</style>

@section('content')

@if(!empty($subcategories))
<div class="subcategory-wrapper">

    <a href="{{ request()->fullUrlWithQuery(['subcategory' => null]) }}"
       class="sub-btn {{ !$currentSubcategory ? 'active' : '' }}">
       {{ __('messages.all') }}
    </a>

    @foreach($subcategories as $sub)

        <a href="{{ request()->fullUrlWithQuery(['subcategory' => $sub]) }}"
           class="sub-btn {{ $currentSubcategory == $sub ? 'active' : '' }}">

            {{ $sub }}

        </a>

    @endforeach

</div>
@endif

<div class="shop-layout">

    <aside class="filters">

        <form method="GET" action="{{ url()->current() }}">

            <input type="hidden" name="category" value="{{ request('category') }}">
            <input type="hidden" name="subcategory" value="{{ request('subcategory') }}">
            <input type="hidden" name="search" value="{{ request('search') }}">

            <h4>{{ __('messages.price') }}</h4>

            <input type="number"
                   name="min_price"
                   placeholder="{{ __('messages.min') }}"
                   value="{{ request('min_price') }}">

            <input type="number"
                   name="max_price"
                   placeholder="{{ __('messages.max') }}"
                   value="{{ request('max_price') }}">
            <h4>{{ __('messages.brand') }}</h4>

            @foreach($brands as $brand)

                <label>

                    <input type="checkbox"
                           name="brands[]"
                           value="{{ $brand }}"
                           {{ in_array($brand, request('brands', [])) ? 'checked' : '' }}>

                    {{ $brand }}

                </label>

            @endforeach

            <button type="submit">
                {{ __('messages.apply_filters') }}
            </button>

        </form>

    </aside>


    <section class="s6">

        @if($editMode)

            <div class="new-product-wrap">

                <a href="{{ route('articles.create')}}">

                    <button class="new-product-btn">
                        {{ __('messages.new_product') }}
                    </button>

                </a>

            </div>

        @endif

        <div class="products">

            @foreach($articles as $article)

            <div class="card">

                <a href="{{ route('articles.show', $article) }}" class="card-link">

                    <img class="product-image" src="{{ $article->image }}">

                    <h3>{{ $article->title }}</h3>

                    <p class="description">
                        {{ $article->description }}
                    </p>

                    <div class="price">
                        {{ $article->price }} {{ __('messages.lei_currency') }}
                    </div>

                </a>

                <div class="card-actions">

                    <div class="bottom-actions">


                        <form action="{{ route('cart.add', $article->id) }}"
                              method="POST"
                              class="cart-form">

                            @csrf

                            <button type="submit" class="cart-btn">

                                <h5>
                                    {{ __('messages.add_to_cart') }}
                                </h5>

                            </button>

                        </form>


                        <form action="{{ route('favorites.add', $article->id) }}"
                              method="POST"
                              class="favorite-form">

                            @csrf

                            <button type="submit" class="favorite-btn">

                                <i class="fa-solid fa-heart {{ in_array($article->id, $favoriteIds) ? 'active' : '' }}"></i>

                            </button>

                        </form>

                    </div>

                    @if($editMode)

                    <div class="admin-actions">

                        <a href="{{ route('articles.edit', $article->id) }}"
                           class="edit-btn">

                            <i class="fa-solid fa-pen"></i>

                            {{ __('messages.edit') }}

                        </a>

                        <form action="{{ route('articles.destroy', $article->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="delete-btn">

                                <i class="fa-solid fa-trash"></i>

                                {{ __('messages.delete') }}

                            </button>

                        </form>

                    </div>

                    @endif

                </div>

            </div>

            @endforeach

        </div>

    </section>

</div>


@if ($articles->hasPages())

<div class="pagination-wrapper">

    @if ($articles->onFirstPage())

        <span class="page-btn disabled">
            {{ __('messages.prev') }}
        </span>

    @else

        <a href="{{ $articles->previousPageUrl() }}"
           class="page-btn">

            {{ __('messages.prev') }}

        </a>

    @endif

    @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)

        @if ($page == $articles->currentPage())

            <span class="page-btn active">
                {{ $page }}
            </span>

        @else

            <a href="{{ $url }}" class="page-btn">
                {{ $page }}
            </a>

        @endif

    @endforeach


    @if ($articles->hasMorePages())

        <a href="{{ $articles->nextPageUrl() }}"
           class="page-btn">

            {{ __('messages.next') }}

        </a>

    @else

        <span class="page-btn disabled">
            {{ __('messages.next') }}
        </span>

    @endif

</div>

@endif


<script>
function showMessage(message) {
    const el = document.createElement('div');
    el.textContent = message;

    el.style.position = 'fixed';
    el.style.bottom = '20px';
    el.style.right = '20px';
    el.style.background = 'black';
    el.style.color = 'white';
    el.style.padding = '12px 18px';
    el.style.borderRadius = '10px';
    el.style.zIndex = '9999';
    el.style.fontSize = '14px';
    el.style.boxShadow = '0 10px 25px rgba(0,0,0,0.2)';

    document.body.appendChild(el);

    setTimeout(() => {
        el.remove();
    }, 2000);
}

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
                showMessage('Added to favorites');
            } else {
                showMessage('Removed from favorites');
            }
        });
    });
});

document.querySelectorAll('.cart-form').forEach(form => {
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
            showMessage('Product added to cart');
        });
    });
});

</script>

@endsection