@php
$editMode = request()->has('edit');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel CRUD')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            overflow-x:hidden;
        }

        .custom-navbar{
            padding:15px 0;
            background:white;
            padding-inline: 20px;
        }

        .logo img{
            width:180px;
            max-width:100%;
        }

        .search-container{
            display:flex;
            align-items:center;
            background:#d9d9d9;
            border-radius:50px;
            overflow:hidden;
            width:100%;
        }

        .search-input{
            flex:1;
            border:none;
            background:transparent;
            padding:12px 18px;
            outline:none;
            min-width:0;
        }

        .search-select{
            border:none;
            background:transparent;
            padding:12px 15px;
            outline:none;
            border-left:1px solid white;
        }

        .search-button{
            border:none;
            background:transparent;
            width:55px;
            height:48px;
            border-left:1px solid white;
            transition:0.3s;
        }

        .search-button:hover{
            background:rgba(0,0,0,0.08);
        }

        .search-button img{
            width:22px;
        }


        .btns{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            flex-wrap:nowrap;
        }

        .circle-btn{
            width:50px;
            height:50px;
            border-radius:50%;
            background:#d9d9d9;
            display:flex;
            align-items:center;
            justify-content:center;
            transition:0.3s;
            position:relative;
        }

        .circle-btn:hover{
            background:#bdbdbd;
        }

        .circle-btn img{
            width:24px;
            height:24px;
            object-fit:contain;
        }

        .circle-btn a{
            width:100%;
            height:100%;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .lang{
            text-decoration:none;
            color:black;
            font-weight:600;
            font-size:18px;
        }


        .editMode{
            background:#d9d9d9;
            border-radius:50px;
            padding:12px 20px;
            transition:0.3s;
        }

        .editMode:hover{
            background:#bdbdbd;
        }

        .editMode button{
            border:none;
            background:none;
            font-weight:600;
        }

        .account-menu{
            position:relative;
        }

        .dropdown-menu-custom{
            display:none;
            position:absolute;
            top:50px;
            right:0;
            background:white;
            min-width:180px;
            padding:10px;
            border-radius:10px;
            box-shadow:0 5px 20px rgba(0,0,0,0.15);
            z-index:999;
        }

        .dropdown-menu-custom a{
            display:block;
            padding:8px 0;
            color:black;
            text-decoration:none;
        }

        .dropdown-menu-custom form button{
            border:none;
            background:none;
            padding:8px 0;
        }

        .account-menu:hover .dropdown-menu-custom{
            display:block;
        }

        .navbar2{
            background:#1d1d1f;
        }

        .navbar2 .nav-link{
            color:white !important;
            font-weight:600;
            padding:15px 20px;
        }

        .navbar2 .nav-link:hover{
            color:#d9d9d9 !important;
        }

        .s7{
            background:#1d1d1f;
            color:white;
            padding:10px 0 40px;
            margin-top:80px;
        }

        .footer-top{
            margin-bottom:60px;
        }

        .info{
            text-align:center;
            padding:20px;
        }

        .icons{
            width:70px;
            height:70px;
            border-radius:50%;
            background:#c7c7c7;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0 auto 20px;
        }

        .icons img{
            width:30px;
            height:30px;
            object-fit:contain;
        }

        .info h3{
            font-size:20px;
            margin-bottom:10px;
        }

        .info h4{
            color:#b5b5b5;
            font-size:15px;
            line-height:1.5;
        }

        .footer-links h3{
            margin-bottom:20px;
            font-size:18px;
        }

        .footer-links ul{
            list-style:none;
            padding:0;
        }

        .footer-links li{
            margin-bottom:12px;
        }

        .footer-links a{
            text-decoration:none;
            color:#b5b5b5;
            transition:0.3s;
        }

        .footer-links a:hover{
            color:white;
            padding-left:5px;
        }

        .footer-logo{
            width:220px;
            display:block;
            margin:50px auto 0;
            background:white;
            padding:10px 15px;
            border-radius:20px;
        }


        @media(max-width:992px){

            .btns{
                margin-top:15px;
            }

            .search-wrapper{
                margin-top:15px;
            }
        }

        @media(max-width:768px){

            .search-container{
                flex-direction:column;
                border-radius:20px;
            }

            .search-input,
            .search-select,
            .search-button{
                width:100%;
                border-left:none;
            }

            .search-select{
                border-top:1px solid white;
            }

            .search-button{
                border-top:1px solid white;
            }

            .navbar2 .nav{
                flex-direction:column;
                text-align:center;
            }

            .footer-links{
                text-align:center;
            }

            .footer-links h3{
                margin-top:20px;
            }
        }

        
    </style>

    @stack('styles')
</head>

<body>


<section class="s1">

    <div class="container-fluid custom-navbar">

        <div class="row align-items-center gy-3">

            <div class="col-lg-2 col-md-12 text-center text-lg-start">
                <a class="logo" href="{{ route('articles.index') }}">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo">
                </a>
            </div>

            <div class="col-lg-7 col-md-12 search-wrapper">

                <form method="GET" action="{{ route('products') }}">

                    <div class="search-container">

                        <input
                            type="text"
                            name="search"
                            placeholder="{{ __('messages.search_placeholder') }}"
                            class="search-input"
                            value="{{ request('search') }}"
                        >

                        <select name="category" class="search-select">

                            <option value="" {{ request('category') == '' ? 'selected' : '' }}>
                                {{ __('messages.all_categories') }}
                            </option>

                            <option value="Calculatoare si laptopuri"
                                {{ request('category') == 'Calculatoare si laptopuri' ? 'selected' : '' }}>
                                {{ __('messages.computers_laptops') }}
                            </option>

                            <option value="Materiale consumabile"
                                {{ request('category') == 'Materiale consumabile' ? 'selected' : '' }}>
                                {{ __('messages.consumables') }}
                            </option>

                            <option value="Componente PC"
                                {{ request('category') == 'Componente PC' ? 'selected' : '' }}>
                                {{ __('messages.pc_components') }}
                            </option>

                            <option value="Imprimante si MFU"
                                {{ request('category') == 'Imprimante si MFU' ? 'selected' : '' }}>
                                {{ __('messages.printers_mfu') }}
                            </option>

                            <option value="Periferice PC"
                                {{ request('category') == 'Periferice PC' ? 'selected' : '' }}>
                                {{ __('messages.pc_peripherals') }}
                            </option>

                        </select>

                        <button type="submit" class="search-button">
                            <img src="https://cdn-icons-png.flaticon.com/128/5636/5636698.png">
                        </button>

                    </div>

                </form>

            </div>

            <div class="col-lg-3 col-md-12">

                <div class="btns">

                    <div class="circle-btn">

                        @if(app()->getLocale() === 'ro')
                            <a class="lang" href="{{ route('lang.switch', 'ru') }}">RU</a>
                        @else
                            <a class="lang" href="{{ route('lang.switch', 'ro') }}">RO</a>
                        @endif

                    </div>


                    <div class="circle-btn">
                        <a href="{{ route('cart.index') }}">
                            <img src="https://cdn-icons-png.flaticon.com/128/3144/3144456.png">
                        </a>
                    </div>

                    <div class="circle-btn">
                        <a href="{{ route('favorites') }}">
                            <img src="https://cdn-icons-png.flaticon.com/128/151/151910.png">
                        </a>
                    </div>

                    <div class="circle-btn account-menu">

                        <img src="https://cdn-icons-png.flaticon.com/128/456/456212.png">

                        <div class="dropdown-menu-custom">

                            @guest

                                <a href="{{ route('login') }}">
                                    {{ __('messages.login') }}
                                </a>

                                <a href="{{ route('register') }}">
                                    {{ __('messages.register') }}
                                </a>

                            @endguest

                            @auth

                                <div class="mb-2 fw-bold">
                                    {{ auth()->user()->username }}
                                </div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit">
                                        {{ __('messages.logout') }}
                                    </button>
                                </form>

                            @endauth

                        </div>

                    </div>

                    @auth

                        @if(auth()->user()->username === 'admin')

                            @if(session('editMode', false))

                                <a href="/toggle-edit" class="text-decoration-none">

                                    <div class="editMode">

                                        <button>
                                            {{ __('messages.exit_edit_mode') }}
                                        </button>

                                    </div>

                                </a>

                            @else

                                <a href="/toggle-edit" class="text-decoration-none">

                                    <div class="editMode">

                                        <button>
                                            {{ __('messages.edit_mode') }}
                                        </button>

                                    </div>

                                </a>

                            @endif

                        @endif

                    @endauth

                </div>

            </div>

        </div>

    </div>


    <div class="navbar2">

        <div class="container">

            <ul class="nav justify-content-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.delivery') }}">
                        {{ __('messages.delivery') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.contact') }}">
                        {{ __('messages.contact') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.about') }}">
                        {{ __('messages.about') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.payment') }}">
                        {{ __('messages.payment') }}
                    </a>
                </li>

            </ul>

        </div>

    </div>

</section>


<div class="container mt-4">
    @yield('content')
</div>


<section class="s7">

    <div class="container">

        <!-- TOP INFO -->

        <div class="row footer-top gy-4">

            <div class="col-lg-4 col-md-6">

                <div class="info">

                    <div class="icons">
                        <img src="https://cdn-icons-png.flaticon.com/128/483/483947.png">
                    </div>

                    <h3>{{ __('messages.contact_us') }}</h3>

                    <h4>069805326</h4>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="info">

                    <div class="icons">
                        <img src="https://cdn-icons-png.flaticon.com/128/3177/3177361.png">
                    </div>

                    <h3>{{ __('messages.our_address') }}</h3>

                    <h4>{{ __('messages.address_text') }}</h4>

                </div>

            </div>

            <div class="col-lg-4 col-md-12">

                <div class="info">

                    <div class="icons">
                        <img src="https://cdn-icons-png.flaticon.com/128/4790/4790599.png">
                    </div>

                    <h3>{{ __('messages.working_hours') }}</h3>

                    <h4>{{ __('messages.work_time_text') }}</h4>

                </div>

            </div>

        </div>

        <div class="row footer-links gy-4">

            <div class="col-lg-3 col-md-6">

                <h3>{{ __('messages.info_title') }}</h3>

                <ul>

                    <li>
                        <a href="{{ route('articles.about') }}">
                            {{ __('messages.about_us') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles.delivery') }}">
                            {{ __('messages.delivery_info') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles.payment') }}">
                            {{ __('messages.security_agreement') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles.payment') }}">
                            {{ __('messages.printer_agreement') }}
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-3 col-md-6">

                <h3>{{ __('messages.customer_service_title') }}</h3>

                <ul>

                    <li>
                        <a href="{{ route('articles.contact') }}">
                            {{ __('messages.contact_us') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles.payment') }}">
                            {{ __('messages.returns') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles.contact') }}">
                            {{ __('messages.sitemap') }}
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-3 col-md-6">

                <h3>{{ __('messages.extra_title') }}</h3>

                <ul>

                    <li>
                        <a href="{{ route('articles.about') }}">
                            {{ __('messages.brands') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles.about') }}">
                            {{ __('messages.gift_certificates') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles.about') }}">
                            {{ __('messages.affiliates') }}
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-3 col-md-6">

                <h3>{{ __('messages.my_account_title') }}</h3>

                <ul>

                    <li>
                        <a href="#">
                            {{ __('messages.my_account_title') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('orders.index') }}">
                            {{ __('messages.order_history') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('favorites') }}">
                            {{ __('messages.wishlist') }}
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            {{ __('messages.newsletter') }}
                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <a class="logo" href="{{ route('articles.index') }}">
                    <img class="footer-logo" src="{{ asset('images/Logo.png') }}" alt="Logo">
                </a>

    </div>

</section>

</body>
</html>