@extends('layouts.app')

@section('content')

<style>

body{
    font-family:Inter, Arial, sans-serif;
    color:#111;
    background:#f8f9fc;
}


.favorites-page{
    padding:60px 15px;
}

.favorites-container{
    width:100%;
    max-width:1200px;
    margin:auto;
}


.favorites-title{
    text-align:center;
    font-size:36px;
    font-weight:900;
    margin-bottom:35px;
    color:#111827;
}


.favorites-box{
    background:white;
    border-radius:24px;
    padding:35px;
    box-shadow:0 15px 40px rgba(0,0,0,0.05);
}


.table-responsive{
    overflow-x:auto;
}

.favorites-table{
    width:100%;
    border-collapse:collapse;
    min-width:650px;
}

.favorites-table thead th{
    text-align:left;
    padding:16px 12px;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:0.5px;
    color:#888;
    border-bottom:1px solid #eee;
}

.favorites-table tbody td{
    padding:24px 12px;
    border-bottom:1px solid #f3f4f6;
    vertical-align:middle;
}

.favorites-table tbody tr{
    transition:0.25s;
}

.favorites-table tbody tr:hover{
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
    font-size:15px;
    font-weight:700;
    color:#111827;
}


.remove-btn{
    width:38px;
    height:38px;
    border:none;
    border-radius:12px;
    background:#f3f4f6;
    color:#6b7280;
    font-size:20px;
    cursor:pointer;
    transition:0.25s;
}

.remove-btn:hover{
    background:#111827;
    color:white;
}


.empty-favorites{
    text-align:center;
    padding:60px 20px;
    font-size:18px;
    color:#6b7280;
}


@media(max-width:992px){

    .favorites-box{
        padding:25px;
    }

    .favorites-title{
        font-size:30px;
    }
}

@media(max-width:768px){

    .favorites-page{
        padding:40px 10px;
    }

    .favorites-box{
        padding:18px;
        border-radius:18px;
    }

    .favorites-title{
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
}

@media(max-width:576px){

    .favorites-table{
        min-width:550px;
    }

    .favorites-title{
        font-size:24px;
    }

    .remove-btn{
        width:34px;
        height:34px;
        font-size:18px;
    }
}

</style>

<div class="favorites-page">

    <div class="favorites-container">

        <div class="favorites-title">

            {{ __('messages.your_favorites') }}

        </div>

        <div class="favorites-box">

            @if($articles->count() > 0)

            <div class="table-responsive">

                <table class="favorites-table">

                    <thead>

                        <tr>

                            <th>
                                {{ __('messages.product') }}
                            </th>

                            <th>
                                {{ __('messages.price') }}
                            </th>

                            <th>
                                {{ __('messages.action') }}
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($articles as $article)

                        <tr>

                            <td>

                                <div class="product">

                                    <img src="{{ $article->image }}" alt="">

                                    <div class="product-name">

                                        {{ $article->title }}

                                    </div>

                                </div>

                            </td>

                            <td class="price-cell">

                                {{ $article->price }}
                                {{ __('messages.lei_currency') }}

                            </td>

                            <td>

                                <form action="{{ route('favorites.remove', $article->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="remove-btn">

                                        ×

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            @else

            <div class="empty-favorites">

                {{ __('messages.no_favorites') }}

            </div>

            @endif

        </div>

    </div>

</div>

@endsection