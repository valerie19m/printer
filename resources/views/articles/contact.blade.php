@php
    $editMode = session('editMode', false);
@endphp

@extends('layouts.app')

@section('title', 'Contact')

@push('styles')
<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family: Inter, Arial, sans-serif;
        background:#f5f5f5;
        color:#111;
    }

    .container{
        width:100%;
        max-width:1250px;
        margin:auto;
    }

    .contact-hero{
        padding:30px 0 40px;
    }

    .hero-box{
        background:#111;
        color:#fff;
        border-radius:32px;
        padding:80px 60px;
        position:relative;
        overflow:hidden;
    }

    .hero-box::after{
        content:'';
        position:absolute;
        width:320px;
        height:320px;
        background:rgba(255,255,255,0.04);
        border-radius:50%;
        top:-120px;
        right:-80px;
    }

    .hero-box h1{
        font-size:64px;
        font-weight:900;
        letter-spacing:-2px;
        margin-bottom:20px;
    }

    .hero-box p{
        max-width:760px;
        line-height:1.9;
        color:rgba(255,255,255,0.8);
        font-size:18px;
    }
    .contact-section{
        padding:20px 0 90px;
    }

    .contact-grid{
        display:grid;
        grid-template-columns:1.1fr .9fr;
        gap:30px;
        align-items:stretch;
    }

    .modern-card{
        background:#fff;
        border:1px solid #e8e8e8;
        border-radius:28px;
        padding:40px;
        box-shadow:0 5px 20px rgba(0,0,0,0.04);
        transition:.3s ease;
    }


    .section-title{
        font-size:30px;
        font-weight:800;
        margin-bottom:12px;
        letter-spacing:-1px;
    }

    .section-subtitle{
        color:#666;
        line-height:1.8;
        margin-bottom:35px;
        font-size:15px;
    }

    .contact-form form{
        display:flex;
        flex-direction:column;
        gap:20px;
    }

    .form-row{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
    }

    .contact-form input,
    .contact-form textarea{
        width:100%;
        background:#fafafa;
        border:1px solid #ededed;
        border-radius:18px;
        padding:18px 20px;
        font-size:15px;
        outline:none;
        transition:.3s;
        color:#111;
    }

    .contact-form input:focus,
    .contact-form textarea:focus{
        background:#fff;
        border-color:#111;
        box-shadow:0 0 0 3px rgba(0,0,0,0.05);
    }

    .contact-form textarea{
        min-height:160px;
        resize:none;
    }

    .submit-btn{
        width:max-content;
        background:#111;
        color:#fff;
        border:none;
        padding:16px 34px;
        border-radius:50px;
        font-weight:600;
        cursor:pointer;
        transition:.3s ease;
    }

    .submit-btn:hover{
        background-color: #aeaeae;
        color: black;
        transform:translateY(-3px);
    }

    .info-items{
        display:flex;
        flex-direction:column;
        gap:18px;
    }

    .info-box{
        background:#fafafa;
        border:1px solid #ededed;
        border-radius:22px;
        padding:22px;
        transition:.3s ease;
    }

    .info-box span{
        display:block;
        font-size:13px;
        color:#777;
        margin-bottom:8px;
        text-transform:uppercase;
        letter-spacing:1px;
    }

   

    .info-box h4{
        font-size:17px;
        line-height:1.6;
        font-weight:600;
    }

    .hours-list{
        list-style:none;
        margin-top:12px;
    }

    .hours-list li{
        display:flex;
        justify-content:space-between;
        padding:10px 0;
        border-bottom:1px solid rgba(0,0,0,0.08);
        font-size:14px;
    }

    .map-section{
        padding-bottom:90px;
    }

    .map-wrapper{
        overflow:hidden;
        border-radius:35px;
        border:1px solid #e8e8e8;
        box-shadow:0 5px 20px rgba(0,0,0,0.04);
    }

    .map-wrapper iframe{
        width:100%;
        height:420px;
        border:none;
    }

    @media(max-width:992px){

        .contact-grid{
            grid-template-columns:1fr;
        }

        .hero-box h1{
            font-size:48px;
        }
    }

    @media(max-width:768px){

        .hero-box{
            padding:50px 30px;
        }

        .hero-box h1{
            font-size:40px;
        }

        .modern-card{
            padding:28px;
        }

        .form-row{
            grid-template-columns:1fr;
        }

        .map-wrapper iframe{
            height:300px;
        }
    }

</style>
@endpush

@section('content')

<section class="contact-hero">
    <div class="container">

        <div class="hero-box">
            <h1>{{ __('messages.contact') }}</h1>

            <p>
               {{ __('messages.contact_hero_desc') }}
            </p>
        </div>

    </div>
</section>

<section class="contact-section">

    <div class="container">

        <div class="contact-grid">

            <!-- FORM -->
            <div class="modern-card contact-form">

                <h2 class="section-title">
                    {{ __('messages.send_message') }}
                </h2>

                <p class="section-subtitle">
                   {{ __('messages.contact_form_desc') }}
                </p>

                <form>

                    <div class="form-row">
                        <input type="text" placeholder="{{ __('messages.your_name') }}">
                        <input type="email" placeholder="{{ __('messages.email') }}">
                    </div>

                    <div class="form-row">
                        <input type="text" placeholder="{{ __('messages.phone') }}">
                        <input type="text" placeholder="{{ __('messages.subject') }}">
                    </div>

                    <textarea placeholder="{{ __('messages.write_message') }}"></textarea>

                    <button class="submit-btn" type="submit">
                       {{ __('messages.send_message_btn') }}
                    </button>

                </form>

            </div>

            <div class="modern-card">

                <h2 class="section-title">
                   {{ __('messages.information') }}
                </h2>

                <p class="section-subtitle">
                    {{ __('messages.contact_info_desc') }}
                </p>

                <div class="info-items">

                    <div class="info-box">
                        <span>{{ __('messages.address') }}
</span>

                        <h4>
                           {{ __('messages.address_value') }}

                        </h4>
                    </div>

                    <div class="info-box">
                        <span>{{ __('messages.phone_label') }}</span>

                        <h4>
                            +(373) 69805326
                        </h4>
                    </div>

                    <div class="info-box">
                        <span>{{ __('messages.email_label') }}
</span>

                        <h4>
                            hello@printer.md
                        </h4>
                    </div>

                    <div class="info-box">

                        <span>{{ __('messages.schedule') }}
</span>

                        <ul class="hours-list">

                            <li>
                                <strong>{{ __('messages.monday_friday') }}
</strong>
                                <span>09:00 – 18:00</span>
                            </li>

                            <li>
                                <strong>{{ __('messages.break') }}</strong>
                                <span>13:00 – 14:00</span>
                            </li>

                            <li>
                                <strong>{{ __('messages.weekend') }}</strong>
                                <span>{{ __('messages.closed') }}</span>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="map-section">

    <div class="container">

        <div class="map-wrapper">

            <iframe
                src="https://maps.google.com/maps?q=Chisinau%20Columna%2086&t=&z=15&ie=UTF8&iwloc=&output=embed"
                allowfullscreen>
            </iframe>

        </div>

    </div>

</section>

@endsection