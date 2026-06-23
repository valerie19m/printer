@extends('layouts.app')

@section('content')

<style>
body{
    font-family: Inter, Arial, sans-serif;
    color:#111;
}

/* PAGE WRAPPER */
.success-page{
    padding:80px 20px;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CARD */
.success-card{
    width:100%;
    max-width:520px;
    background:#fff;
    border-radius:20px;
    padding:45px 35px;
    text-align:center;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
    border:1px solid #eee;
}

/* ICON */
.success-icon{
    width:70px;
    height:70px;
    margin:0 auto 20px;
    border-radius:50%;
    background:#111;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:30px;
}

/* TITLE */
.success-title{
    font-size:26px;
    font-weight:900;
    margin-bottom:10px;
}

/* TEXT */
.success-text{
    font-size:14px;
    color:#666;
    margin-bottom:25px;
    line-height:1.5;
}

/* BUTTON */
.back-btn{
    display:inline-block;
    padding:14px 22px;
    background:#111;
    color:#fff;
    border-radius:12px;
    text-decoration:none;
    font-weight:700;
    transition:0.25s ease;
}

.back-btn:hover{
    transform:translateY(-2px);
}

/* SECONDARY TEXT */
.small-note{
    margin-top:15px;
    font-size:12px;
    color:#999;
}
</style>

<div class="success-page">

    <div class="success-card">

        <div class="success-icon">✓</div>

        <div class="success-title"> {{ __('messages.order_successful') }}</div>

        <div class="success-text">
           {{ __('messages.order_success_text') }}
        </div>

        <a href="/" class="back-btn">
             {{ __('messages.back_to_products') }}
        </a>

        <div class="small-note">
            {{ __('messages.confirmation_note') }}
        </div>

    </div>

</div>

@endsection