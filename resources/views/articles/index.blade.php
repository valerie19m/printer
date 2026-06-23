@php
$editMode = session('editMode', false);
@endphp

@extends('layouts.app')
@section('title', 'Home')

@push('styles')
        <style>
        * {
    margin: 0;
    padding: 0;
       }
     
.points {
    display: flex;
    border: 1px solid rgb(242, 242, 242);
    margin: 60px auto;
    width: fit-content;
}
.points div {
    width: auto;
    border: 1px solid rgb(242, 242, 242);
    margin: 0;
}
.points .crd img {
    width: 50px;
    height: 50px;
}
.points div h3 {
    font-size: 15px;
    margin-bottom: 5px;
    margin-top: 10px;
}
.points div h5 {
    font-size: 10px;
    color: #747474;
}
.s3 .crd{
    display: flex;
    padding: 15px 30px;
    gap: 15px;
}
.s3 .info{
    border: none;
    text-align: left;
}
.s4 {
    padding: 60px 20px;
    margin-top: -30px;
}
.s4 h2 {
    margin-bottom: 40px;
}

.s4 .categories {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 30px;
}

.s4 .card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 220px;
    margin-bottom: 30px;
    color: black;
    text-decoration: none;
    border: none;
    transition: all 0.3s ease;
    border-radius: 20px;
    padding: 10px;
}
.s4 .card:hover {
    transform: translateY(-10px) scale(1.03);
    background: white;
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

.s4 .card .img_container {
    background-color: rgb(241, 241, 241);
    padding: 0px;
    border-radius: 10px;
    margin-bottom: 10px;
}
.s4 .card .img {
    width: 150px;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.s4 .card img {
    width: 150px;
    height: auto;
    margin: 0 auto;
    display: block;
}

.s4 .card h3 {
    font-size: 18px;
    margin-bottom: 10px;
    text-align: center;
}

.s4 .card h5 {
    text-align: center;
}
.s4 div .card h5 {
    font-size: 14px;
    color: #555;
}
.s5 {
    padding: 80px 12px;
    margin-top: -70px;
}

.s5 h2 {
    font-size: clamp(28px, 4vw, 40px);
    margin-bottom: 50px;
    color: #111827;
}

.s5 .cards {
    display: grid;

    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));

    gap: 28px;

    max-width: 1400px;
    margin: 0 auto;
}

.s5 .card {
    position: relative;

    display: flex;
    justify-content: space-between;

    min-height: 260px;
    overflow: hidden;

    padding: 45px 20px;

    border: none;
    border-radius: 28px;

    background: white;

    box-shadow:
        0 10px 25px rgba(0,0,0,0.06),
        0 2px 8px rgba(0,0,0,0.04);

    transition:
        transform 0.45s cubic-bezier(0.22, 1, 0.36, 1),
        box-shadow 0.45s cubic-bezier(0.22, 1, 0.36, 1);
}

.s5 .card:hover {
    transform: translateY(-8px);

    box-shadow:
        0 20px 45px rgba(0,0,0,0.10),
        0 8px 18px rgba(0,0,0,0.06);
}

.s5 .left {
    width: 52%;
    position: relative;
    z-index: 3;
}

.s5 .left h3 {
    font-size: clamp(20px, 2vw, 26px);
    margin-bottom: 14px;
    color: #111827;
    line-height: 1.2;
}

.s5 .left h5 {
    font-size: 13px;
    line-height: 1.7;
    color: #6b7280;
    font-weight: 400;
}

.s5 .service {
    position: absolute;

    right: 0;
    bottom: 0;

    width: 48%;
    height: 100%;

    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
}

.s5 .service img {
    width: 100%;
    height: 100%;

    object-fit: cover;
    object-position: center;

    display: block;
}

.s5 .service::after {
    content: "";
    position: absolute;
    inset: 0;

    background: linear-gradient(
        to left,
        rgba(255,255,255,0) 35%,
        rgba(255,255,255,0.96) 100%
    );
}

.s5 .card::before {
    content: "";
    position: absolute;

    top: 0;
    left: 38%;

    width: 25%;
    height: 100%;

    background: linear-gradient(
        to right,
        rgba(255,255,255,1) 25%,
        rgba(255,255,255,0.92) 45%,
        rgba(255,255,255,0.55) 65%,
        rgba(255,255,255,0) 100%
    );

    z-index: 2;
    pointer-events: none;
}

@media (max-width: 992px){

    .s5 .cards{
        grid-template-columns: repeat(2, 1fr);
    }

    .s5 .card{
        min-height: 240px;
        padding: 35px 18px;
    }

    .s5 .left h3{
        font-size: 22px;
    }
}

@media (max-width: 768px){

    .s5{
        padding: 60px 14px;
    }

    .s5 .cards{
        grid-template-columns: 1fr;
    }

    .s5 .card{
        min-height: 420px;

        flex-direction: column;
        justify-content: flex-start;

        padding: 35px 25px;

        text-align: center;
    }

    .s5 .left{
        width: 100%;
    }

    .s5 .service{
        width: 100%;
        height: 55%;

        right: 0;
        bottom: 0;

        justify-content: center;
        align-items: flex-end;
    }

    .s5 .service img{
        width: 100%;
        height: 100%;
    }

    .s5 .service::after{
        background: linear-gradient(
            to top,
            rgba(255,255,255,0) 40%,
            rgba(255,255,255,0.98) 100%
        );
    }

    .s5 .card::before{
        display: none;
    }
}

@media (max-width: 480px){

    .s5 h2{
        margin-bottom: 35px;
    }

    .s5 .card{
        min-height: 360px;
        padding: 28px 18px;
        border-radius: 22px;
    }

    .s5 .left h3{
        font-size: 20px;
    }

    .s5 .left h5{
        font-size: 12px;
    }

    .s5 .service{
        height: 50%;
    }
}
.s6 {
    padding: 40px 20px;
    background: #f8f9fc;
    border-radius: 10px;
    margin-inline: 0;
    width: 100%;
}

.section-header {
    max-width: 1400px;
    margin: 0 auto 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.section-header h2 {
    margin: 0;
    font-size: 34px;
    font-weight: 700;
    color: #111827;
}

.show-all-btn {
    padding: 12px 24px;
    border-radius: 16px;
    background: white;
    color: #111827;
    text-decoration: none;
    font-weight: 600;
    border: 1px solid #dbe1ea;
    transition: 0.25s ease;
}

.show-all-btn:hover {
    background: #111827;
    color: white;
}

.new-product-wrap {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

.new-product-btn {
    height: 48px;
    padding: 0 24px;
    border: none;
    border-radius: 14px;
    background: #1a1a1a;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.25s ease;
}

.new-product-btn:hover {
    transform: translateY(-2px);
}

.s6 .products {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 28px;
    max-width: 1400px;
    margin: 0 auto;
}

.s6 .card {
    position: relative;
    background: white;
    border-radius: 28px;
    
    overflow: hidden;
    border: 1px solid #e5e7eb;
    transition: 0.3s ease;
    box-shadow: 0 10px 35px rgba(0,0,0,0.05);
}

.s6 .card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px rgba(0,0,0,0.08);
}

.card-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.product-image {
    width: 100%;
    height: 230px;
    object-fit: contain;
    margin-bottom: 20px;
    display: block;
}


.s6 .card h3 {
    font-size: 20px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 10px;
    line-height: 1.4;
}

.description {
    font-size: 14px;
    line-height: 1.6;
    color: #6b7280;
    min-height: 22px;
   
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

.price {
  
    padding-bottom: 0px;
    font-size: 30px;
    font-weight: 700;
    color: #111827;
}

.bottom-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
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

.cart-btn:hover,
.favorite-btn:hover {
    background: #111827;
}

.cart-btn i,
.favorite-btn i {
    font-size: 20px;
    color: #6b7280;
    transition: 0.25s ease;
}

.cart-btn{
     width: 190px;
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

.cart-btn:hover,
.favorite-btn:hover i {
    color: white;
}

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

.admin-actions {
    display: flex;
    gap: 14px;
    margin-top: 0px;
    margin-bottom: 0px;
}

.admin-actions form {
    flex: 1;
}
.admin-actions a,
.admin-actions button {
    width: 100%;
    min-width: 120px;
    height: 44px;
    border: none;
    border-radius: 14px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
}

.edit-btn {
    background: #111827;
    color: white;
}

.edit-btn:hover {
    background: #000;
}

.delete-btn {
    background: #fee2e2;
    color: #dc2626;
}

.delete-btn:hover {
    background: #dc2626;
    color: white;
}


.s6 .card {
    background: white;
    border-radius: 28px;
    padding: 22px;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    transition: 0.3s ease;
    box-shadow: 0 10px 35px rgba(0,0,0,0.05);

    display: flex;
    flex-direction: column;
    height: 100%;
}

.card-link {
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.price {
    margin-top: 0;
    font-size: 30px;
    font-weight: 700;
    color: #111827;
    padding-top: 0px;
}

.card-actions {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.admin-actions {
    display: flex;
    gap: 14px;
}

.cart-form {
    flex: 1;
}

.favorite-form {
    width: 52px;
}

.admin-actions form {
    flex: 1;
}

.s6 .card h3 {
    font-size: 20px;
    font-weight: 700;
    color: #111827;
    line-height: 1.4;

    min-height: 56px;
    margin-bottom: 10px;
}

@media (max-width: 1200px) {
    .s6 .products {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 900px) {
    .s6 .products {
        grid-template-columns: repeat(2, 1fr);
    }

    .section-header {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 600px) {
    .s6 .products {
        grid-template-columns: 1fr;
    }

    .section-header h2 {
        font-size: 28px;
    }

    .price {
        font-size: 28px;
    }
}
.s2 {
    position: relative;
    width:99.5vw;
    margin-left: calc(-50vw + 50%);
    margin-top: -25px;
    padding: 0;
}
.promo-slider {
  width: 100%;
  height: 520px;
  overflow: hidden;
}

.slider-track {
  display: flex;
  width: 100%;
  height: 100%;
  transition: transform 0.6s ease-in-out;
}

.slider-track img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  flex-shrink: 0;
}

.arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0,0,0,0.5);
  color: white;
  border: none;
  font-size: 28px;
  padding: 12px 18px;
  cursor: pointer;
  z-index: 10;
  border-radius: 50%;
}

.arrow:hover {
  background: rgba(0,0,0,0.8);
}

.left {
  left: 15px;
}

.right {
  right: 15px;
}

.s3 .crd{
    display: flex;
    align-items: center;
    gap: 15px;

    padding: 20px;
    height: 100%;

    border: 1px solid rgb(242,242,242);
    border-radius: 16px;

    background: white;
    transition: 0.3s ease;
}

.s3 .crd:hover{
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.s3 .crd img{
    width: 50px;
    height: 50px;
    flex-shrink: 0;
}

.s3 .info{
    border: none;
}

.s3 .info h3{
    font-size: 15px;
    margin-bottom: 6px;
    font-weight: 600;
}

.s3 .info h5{
    font-size: 11px;
    color: #747474;
    line-height: 1.5;
    margin: 0;
}

@media (max-width: 992px){

    .s3 .crd{
        padding: 18px;
    }

    .s3 .info h3{
        font-size: 14px;
    }

    .s3 .info h5{
        font-size: 10px;
    }
}

@media (max-width: 576px){

    .s3 .crd{
        flex-direction: column;
        text-align: center;
        padding: 25px 20px;
    }

    .s3 .crd img{
        width: 55px;
        height: 55px;
    }

    .s3 .info h3{
        margin-top: 10px;
    }
}
</style>
@endpush

@section('content')
   
    <section class="s2">
   <div class="promo-slider">
    <button class="arrow left">&#10094;</button>

    <div class="slider-track">
     <img src="{{ asset('images/promo1.jpg') }}" alt="Promotion 1">
<img src="{{ asset('images/promo2.webp') }}" alt="Promotion 2">
      <img src="{{ asset('images/promo3.avif') }}" alt="Promotion 3">
    </div>

    <button class="arrow right">&#10095;</button>
  </div>

    </section>


    <section class="s3 container my-5">

    <div class="row g-3 justify-content-center">

        <div class="col-12 col-sm-6 col-lg">
            <div class="crd h-100">
                <img src="https://cdn-icons-png.flaticon.com/128/11338/11338453.png">

                <div class="info">
                    <h3>{{ __('messages.quality_assurance') }}</h3>
                    <h5>{{ __('messages.quality_assurance_desc') }}</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg">
            <div class="crd h-100">
                <img src="https://cdn-icons-png.flaticon.com/128/16135/16135988.png">

                <div class="info">
                    <h3>{{ __('messages.qualified_specialists') }}</h3>
                    <h5>{{ __('messages.qualified_specialists_desc') }}</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg">
            <div class="crd h-100">
                <img src="https://cdn-icons-png.flaticon.com/128/10614/10614603.png">

                <div class="info">
                    <h3>{{ __('messages.fast_delivery') }}</h3>
                    <h5>{{ __('messages.fast_delivery_desc') }}</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg">
            <div class="crd h-100">
                <img src="https://cdn-icons-png.flaticon.com/128/4460/4460756.png">

                <div class="info">
                    <h3>{{ __('messages.dedicated_support') }}</h3>
                    <h5>{{ __('messages.dedicated_support_desc') }}</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg">
            <div class="crd h-100">
                <img src="https://cdn-icons-png.flaticon.com/128/9841/9841927.png">

                <div class="info">
                    <h3>{{ __('messages.extended_warranty') }}</h3>
                    <h5>{{ __('messages.extended_warranty_desc') }}</h5>
                </div>
            </div>
        </div>

    </div>

</section>
    
    <section class="s4">
        <h2>{{ __('messages.top_categories') }}</h2>
    <div class="categories">
   <a href="{{ route('products', ['category' => 'Calculatoare si laptopuri']) }}" class="card">
       <div class="img_container"> <div class="img"><img src="{{ asset('images/pc2.png') }}"></div></div>
        <h3>{{ __('messages.computers_laptops') }}</h3>
       <h5>{{ $categoryCounts['Calculatoare si laptopuri'] }} {{ __('messages.items') }}</h5>
    </a>

   <a href="{{ route('products', ['category' => 'Materiale consumabile']) }}" class="card">
        <div class="img_container"> <div class="img"><img src="{{ asset('images/cartridge.png') }}" alt="Materiale consumabile"></div></div>
        <h3>{{ __('messages.consumables') }}</h3>
        <h5>{{ $categoryCounts['Materiale consumabile'] }} {{ __('messages.items') }}</h5>
    </a>

  <a href="{{ route('products', ['category' => 'Componente PC']) }}" class="card">
        <div class="img_container"> <div class="img"><img src="{{ asset('images/pc_components.png') }}" alt="Componente PC"></div></div>
        <h3>{{ __('messages.pc_components') }}</h3>
       <h5>{{ $categoryCounts['Componente PC'] }} {{ __('messages.items') }}</h5>
    </a>

    <a href="{{ route('products', ['category' => 'Imprimante si MFU']) }}" class="card">
        <div class="img_container"> <div class="img"><img src="{{ asset('images/printer.png') }}" alt="Imprimante și MFU"></div></div>
        <h3>{{ __('messages.printers_mfu') }}</h3>
        <h5>{{ $categoryCounts['Imprimante si MFU'] }} {{ __('messages.items') }}</h5>
    </a>

    <a href="{{ route('products', ['category' => 'Periferice PC']) }}" class="card">
        <div class="img_container">  <div class="img"><img src="{{ asset('images/keyboard2.png') }}" alt="Periferice PC"></div></div>
        <h3>{{ __('messages.pc_peripherals') }}</h3>
       <h5>{{ $categoryCounts['Periferice PC'] }} {{ __('messages.items') }}</h5>
    </a>
</div>
    </section>

    <section class="s5">
    <h2>{{ __('messages.services') }}</h2>
    <div class="cards">
        <div class="card">
           <div class="left"> <h3>{{ __('messages.cartridge_refill') }}</h3>
            <h5>{{ __('messages.cartridge_refill_desc') }}</h5></div>
            <div class="service"><img src="https://i.pinimg.com/1200x/ef/9b/ce/ef9bceedd9e358ab629b32b14c3b892d.jpg"></div>
        </div>
        <div class="card">
           <div class="left"> <h3>{{ __('messages.mfu_repair') }}</h3>
            <h5>{{ __('messages.mfu_repair_desc') }}</h5></div>
            <div class="service"><img src="https://i.pinimg.com/736x/1e/35/e1/1e35e14249a7ded6bbbc94160c09c479.jpg"></div>
        </div>
        <div class="card">
           <div class="left"> <h3>{{ __('messages.printer_repair') }}</h3>
            <h5>{{ __('messages.printer_repair_desc') }}</h5> </div>
            <div class="service"><img src="https://i.pinimg.com/1200x/b0/94/f9/b094f96762816d1eb31533c6d267f1ac.jpg"></div>
        </div>
        <div class="card">
           <div class="left"> <h3>{{ __('messages.desktop_repair') }}</h3>
            <h5>{{ __('messages.desktop_repair_desc') }}</h5></div>
             <div class="service"><img src="https://i.pinimg.com/1200x/f6/68/85/f66885a557d92dffff85c17d64fa1200.jpg"></div>
        </div>
        <div class="card">
           <div class="left"> <h3>{{ __('messages.laptop_repair') }}</h3>
            <h5>{{ __('messages.laptop_repair_desc') }}</h5>
        </div> 
        <div class="service"><img src="https://i.pinimg.com/736x/91/17/cb/9117cbb5f1e1f4e632adcd86a9b652a3.jpg"></div>
        </div>
        <div class="card">
           <div class="left"> <h3>{{ __('messages.scanner_repair') }}</h3>
            <h5>{{ __('messages.scanner_repair_desc') }}</h5></div> 
            <div class="service"><img src="https://image.coolblue.nl/max/624xauto/content/04f5757317b4b740628a7216b28783ed"></div>
        </div>
    </div>
    </section>

  <section class="s6">

    <div class="section-header">
        <h2>{{ __('messages.new_products') }}</h2>

        <a href="{{ route('products') }}" class="show-all-btn">
            {{ __('messages.show_all_products') }}
        </a>
    </div>

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
            {{ $article->price }} lei
        </div>

    </a>

    <div class="card-actions">

        <div class="bottom-actions">

            <form action="{{ route('cart.add', $article->id) }}" method="POST" class="cart-form">
                @csrf

                <button type="submit" class="cart-btn">
                    <h5>{{ __('messages.add_to_cart') }}</h5>
                </button>
            </form>

            <form action="{{ route('favorites.add', $article->id) }}" method="POST" class="favorite-form">
                @csrf

                <button type="submit" class="favorite-btn">
                    <i class="fa-solid fa-heart {{ in_array($article->id, $favoriteIds) ? 'active' : '' }}"></i>
                </button>
            </form>

        </div>

        @if($editMode)
        <div class="admin-actions">

            <a href="{{ route('articles.edit', $article->id) }}" class="edit-btn">
                <i class="fa-solid fa-pen"></i>
                {{ __('messages.edit') }}
            </a>

            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
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



const track = document.querySelector(".slider-track");
const slides = document.querySelectorAll(".slider-track img");
const nextBtn = document.querySelector(".right");
const prevBtn = document.querySelector(".left");

let currentIndex = 0;
let autoSlide;

function updateSlider() {
  track.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function nextSlide() {
  currentIndex++;

  if (currentIndex >= slides.length) {
    currentIndex = 0;
  }

  updateSlider();
}

function prevSlide() {
  currentIndex--;

  if (currentIndex < 0) {
    currentIndex = slides.length - 1;
  }

  updateSlider();
}


function startAutoSlide() {
  autoSlide = setInterval(nextSlide, 3000);
}

function pauseAutoSlide() {
  clearInterval(autoSlide);

  setTimeout(() => {
    startAutoSlide();
  }, 10000);
}

nextBtn.addEventListener("click", () => {
  nextSlide();
  pauseAutoSlide();
});

prevBtn.addEventListener("click", () => {
  prevSlide();
  pauseAutoSlide();
});

startAutoSlide();
</script>
@endsection