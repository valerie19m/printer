@extends('layouts.app')

@section('content')

<style>

    body{
        background:#f5f5f5;
        font-family:Inter, Arial, sans-serif;
        color:#111;
    }

    .login-page{
        min-height:100vh;
        padding:0px 20px;
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top: -30px;
    }

    .login-card{
        width:100%;
        max-width:520px;
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
        text-align:left;
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
        font-size:44px;
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
        margin-bottom:22px;
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

    /* REMEMBER + LINKS */
    .form-options{
        display:flex;
        justify-content:space-between;
        align-items:center;
        font-size:14px;
        margin-top:5px;
    }

    .form-options label{
        display:flex;
        align-items:center;
        gap:8px;
        color:#666;
        font-size:14px;
        text-transform:none;
        font-weight:500;
        letter-spacing:0;
    }

    .form-options input{
        accent-color:#111;
    }

    .forgot-link{
        color:#666;
        text-decoration:none;
        transition:.3s ease;
    }

    .forgot-link:hover{
        color:#111;
    }

    /* ACTIONS */
    .form-actions{
        margin-top:30px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:15px;
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

    /* ERROR STYLING */
    .error-text{
        margin-top:8px;
        font-size:13px;
        color:#d00;
    }

    /* RESPONSIVE */
    @media(max-width:600px){

        .card-header{
            padding:45px 30px;
        }

        .card-header h1{
            font-size:36px;
        }

        .card-body{
            padding:30px;
        }

    }

</style>

<div class="login-page">

    <div class="login-card">

        <!-- HEADER -->
        <div class="card-header">

            <h1>{{ __('messages.welcome_back') }}</h1>

            <p>
                {{ __('messages.login_desc') }}
            </p>

        </div>

        <!-- BODY -->
        <div class="card-body">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">

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

                <!-- Password -->
                <div class="form-group">
                     <label>{{ __('messages.password') }}</label>
                    <x-text-input id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-text" />
                </div>

                <!-- Options -->
                <div class="form-options">

                    <label>
                        <input id="remember_me" type="checkbox" name="remember">
                       {{ __('messages.remember_me') }}
                    </label>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                             {{ __('messages.forgot_password') }}
                        </a>
                    @endif

                </div>

                <!-- Submit -->
                <div class="form-actions">
                    <button type="submit" class="submit-btn">
                        {{ __('messages.log_in') }}
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection