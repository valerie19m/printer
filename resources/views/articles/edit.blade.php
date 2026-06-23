@extends('layouts.app')

@section('content')

<style>

    body{
        background:#f5f5f5;
        font-family:Inter, Arial, sans-serif;
        color:#111;
    }

    .edit-product-page{
        min-height:100vh;
        padding:70px 20px;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .edit-product-card{
        width:100%;
        max-width:950px;
        background:#fff;
        border-radius:34px;
        border:1px solid #e8e8e8;
        box-shadow:0 10px 35px rgba(0,0,0,0.05);
        overflow:hidden;
    }

    .card-header{
        background:#111;
        color:#fff;
        padding:55px 50px;
        position:relative;
        overflow:hidden;
    }

    .card-header::after{
        content:'';
        position:absolute;
        width:300px;
        height:300px;
        background:rgba(255,255,255,0.04);
        border-radius:50%;
        top:-120px;
        right:-100px;
    }

    .card-header h1{
        font-size:48px;
        font-weight:900;
        letter-spacing:-2px;
        margin-bottom:15px;
        position:relative;
        z-index:2;
    }

    .card-header p{
        max-width:600px;
        line-height:1.8;
        color:rgba(255,255,255,0.75);
        position:relative;
        z-index:2;
        margin:0;
    }

    .card-body{
        padding:50px;
    }

    .product-form{
        display:flex;
        flex-direction:column;
        gap:28px;
    }

    .form-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:24px;
    }

    .form-group{
        display:flex;
        flex-direction:column;
    }

    .form-group.full-width{
        grid-column:1 / -1;
    }

    .form-group label{
        font-size:13px;
        font-weight:700;
        text-transform:uppercase;
        letter-spacing:1px;
        margin-bottom:10px;
        color:#555;
    }

    .form-group input,
    .form-group textarea{
        width:100%;
        background:#fafafa;
        border:1px solid #ededed;
        border-radius:18px;
        padding:18px 20px;
        font-size:15px;
        color:#111;
        transition:.3s ease;
        outline:none;
    }

    .form-group input:focus,
    .form-group textarea:focus{
        background:#fff;
        border-color:#111;
        box-shadow:0 0 0 3px rgba(0,0,0,0.05);
    }

    .form-group textarea{
        min-height:140px;
        resize:none;
        line-height:1.7;
    }

    .form-actions{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:20px;
        margin-top:10px;
    }

    .back-link{
        text-decoration:none;
        color:#666;
        font-size:15px;
        transition:.3s ease;
    }

    .back-link:hover{
        color:#111;
    }

    .submit-btn{
        background:#111;
        color:#fff;
        border:none;
        padding:16px 34px;
        border-radius:50px;
        font-size:15px;
        font-weight:700;
        cursor:pointer;
        transition:.3s ease;
    }

    .submit-btn:hover{
        background:#000;
        transform:translateY(-2px);
    }

    @media(max-width:768px){

        .card-header{
            padding:45px 30px;
        }

        .card-header h1{
            font-size:38px;
        }

        .card-body{
            padding:30px;
        }

        .form-grid{
            grid-template-columns:1fr;
        }

        .form-actions{
            flex-direction:column-reverse;
            align-items:stretch;
        }

        .submit-btn{
            width:100%;
        }

        .back-link{
            text-align:center;
        }
    }

</style>

<div class="edit-product-page">

    <div class="edit-product-card">

        <div class="card-header">

           <h1>{{ __('messages.edit_product') }}</h1>


        </div>

        <div class="card-body">

            <form
                action="{{ route('articles.update', $article) }}"
                method="POST"
                class="product-form"
            >

                @csrf
                @method('PUT')

                <div class="form-grid">

                    <div class="form-group full-width">
                       <label>{{ __('messages.product_title') }}</label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $article->title) }}"
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                       <label>{{ __('messages.description') }}</label>

                        <textarea
                            name="description"
                            required
                        >{{ old('description', $article->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>{{ __('messages.price_lei') }}</label>

                        <input
                            type="number"
                            name="price"
                            step="0.01"
                            value="{{ old('price', $article->price) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                      <label>{{ __('messages.brand') }}</label>

                        <input
                            type="text"
                            name="brand"
                            value="{{ old('brand', $article->brand) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                         <label>{{ __('messages.category') }}</label>

                        <input
                            type="text"
                            name="category"
                            value="{{ old('category', $article->category) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                          <label>{{ __('messages.subcategory') }}</label>

                        <input
                            type="text"
                            name="subcategory"
                            value="{{ old('subcategory', $article->subcategory) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                       <label>{{ __('messages.code') }}</label>

                        <input
                            type="text"
                            name="code"
                            value="{{ old('code', $article->code) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                          <label>{{ __('messages.image_url') }}</label>

                        <input
                            type="url"
                            name="image"
                            value="{{ old('image', $article->image) }}"
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                         <label>{{ __('messages.information') }}</label>
                        <textarea
                            name="information"
                            required
                        >{{ old('information', $article->information) }}</textarea>
                    </div>

                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('products', ['edit' => 1]) }}"
                        class="back-link">
                       {{ __('messages.back_to_products') }}
                    </a>

                    <button type="submit" class="submit-btn">
                         {{ __('messages.update_product') }}
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection