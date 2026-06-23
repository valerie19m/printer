@extends('layouts.app')

@section('content')

<style>

    body{
        background:#f5f5f5;
        font-family:Inter, Arial, sans-serif;
        color:#111;
    }

    .register-page{
        min-height:100vh;
        padding:10px 20px;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .register-card{
        width:100%;
        max-width:560px;
        background:#fff;
        border-radius:34px;
        border:1px solid #e8e8e8;
        box-shadow:0 10px 35px rgba(0,0,0,0.05);
        overflow:hidden;
    }

    /* HEADER */
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
        width:260px;
        height:260px;
        background:rgba(255,255,255,0.04);
        border-radius:50%;
        top:-120px;
        right:-90px;
    }

    .card-header h1{
        font-size:42px;
        font-weight:900;
        letter-spacing:-2px;
        margin-bottom:10px;
        position:relative;
        z-index:2;
    }

    .card-header p{
        margin:0;
        color:rgba(255,255,255,0.75);
        font-size:14px;
        line-height:1.6;
        position:relative;
        z-index:2;
    }

    /* BODY */
    .card-body{
        padding:45px;
    }

    .form-group{
        display:flex;
        flex-direction:column;
        margin-bottom:20px;
    }

    .form-group label{
        font-size:12px;
        font-weight:700;
        letter-spacing:1px;
        text-transform:uppercase;
        margin-bottom:10px;
        color:#555;
    }

    .form-group input{
        width:100%;
        background:#fafafa;
        border:1px solid #ededed;
        border-radius:16px;
        padding:16px 18px;
        font-size:15px;
        color:#111;
        transition:.3s ease;
        outline:none;
    }

    .form-group input:focus{
        background:#fff;
        border-color:#111;
        box-shadow:0 0 0 3px rgba(0,0,0,0.05);
    }

    .error-text{
        margin-top:8px;
        font-size:13px;
        color:#d00;
    }

    /* ACTIONS */
    .form-actions{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:20px;
        margin-top:25px;
    }

    .login-link{
        font-size:14px;
        color:#666;
        text-decoration:none;
        transition:.3s ease;
    }

    .login-link:hover{
        color:#111;
    }

    .submit-btn{
        background:#111;
        color:#fff;
        border:none;
        padding:16px 28px;
        border-radius:50px;
        font-size:15px;
        font-weight:700;
        cursor:pointer;
        transition:.3s ease;
        width:100%;
    }

    .submit-btn:hover{
        background:#000;
        transform:translateY(-2px);
    }

    /* RESPONSIVE */
    @media(max-width:600px){

        .card-header{
            padding:45px 30px;
        }

        .card-header h1{
            font-size:34px;
        }

        .card-body{
            padding:30px;
        }

        .form-actions{
            flex-direction:column;
        }

    }

</style>

<div class="register-page">

    <div class="register-card">

        <!-- HEADER -->
        <div class="card-header">

                <h1>{{ __('messages.create_account') }}</h1>

            <p>
                {{ __('messages.register_desc') }}
            </p>

        </div>

        <!-- BODY -->
        <div class="card-body">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Username -->
                <div class="form-group">
                     <label>{{ __('messages.username') }}</label>
                    <x-text-input id="username"
                        type="text"
                        name="username"
                        :value="old('username')"
                        required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="error-text" />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label>{{ __('messages.email') }}</label>
                    <x-text-input id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-text" />
                </div>

                <!-- Password -->
                <div class="form-group">
                   <label>{{ __('messages.password') }}</label>
                    <x-text-input id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-text" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                     <label>{{ __('messages.confirm_password') }}</label>
                    <x-text-input id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-text" />
                </div>

                <!-- Actions -->
                <div class="form-actions">

                    <a class="login-link" href="{{ route('login') }}">
                         {{ __('messages.already_have_account') }}
                    </a>

                </div>

                <div style="margin-top:15px;">
                    <button type="submit" class="submit-btn">
                         {{ __('messages.register') }}
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection