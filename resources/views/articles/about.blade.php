@php
    $editMode = session('editMode', false);
@endphp

@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    body {
        background: #f5f5f5;
    }

    .about-page {
        padding: 30px 0;
        color: #111;
        font-family: 'Inter', sans-serif;
    }

    .hero-section {
        background: #111;
        color: #fff;
        border-radius: 30px;
        padding: 80px 60px;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        width: 350px;
        height: 350px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
        top: -120px;
        right: -120px;
    }

    .hero-section h1 {
        font-size: 64px;
        font-weight: 900;
        letter-spacing: -2px;
        margin-bottom: 20px;
    }

    .hero-section p {
        font-size: 18px;
        line-height: 1.9;
        max-width: 850px;
        color: rgba(255,255,255,0.85);
    }

    .section-card {
        background: #fff;
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 30px;
        border: 1px solid #e5e5e5;
        transition: 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.04);
    }

    .section-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    }

    .section-title {
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 15px;
    }

    .section-title::after {
        content: '';
        width: 60px;
        height: 3px;
        background: #111;
        position: absolute;
        left: 0;
        bottom: 0;
    }

    .service-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .service-list li {
        padding: 18px 20px;
        margin-bottom: 15px;
        border: 1px solid #ededed;
        border-radius: 18px;
        background: #fafafa;
        display: flex;
        align-items: center;
        font-size: 16px;
        transition: 0.25s ease;
    }

    .service-list li:hover {
        background: #111;
        color: #fff;
        transform: translateX(6px);
    }

    .service-list li::before {
        content: '•';
        font-size: 24px;
        margin-right: 14px;
        font-weight: bold;
    }

    .brands-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 18px;
        margin-top: 30px;
    }

    .brand-box {
        background: #111;
        color: #fff;
        border-radius: 20px;
        padding: 28px 20px;
        text-align: center;
        font-size: 18px;
        font-weight: 700;
        transition: 0.3s ease;
        border: 1px solid #111;
    }

    .brand-box:hover {
        background: #fff;
        color: #111;
        transform: scale(1.05);
    }

    .about-text {
        font-size: 17px;
        line-height: 2;
        color: #444;
        margin-bottom: 20px;
    }

    .highlight {
        font-weight: 800;
        color: #000;
    }

</style>
@endpush

@section('content')

<div class="container about-page py-4">

    <div class="hero-section">
        <div class="row">
            <div class="col-lg-8 col-md-10">
                <h1 class="display-5">{{ __('messages.about_company_title') }}</h1>
                <p class="lead">
                    {{ __('messages.about_company_desc') }}
                </p>
            </div>
        </div>
    </div>

    <div class="section-card">
        <h2 class="section-title">{{ __('messages.our_services') }}</h2>

        <div class="row">
            <div class="col-md-6">
                <ul class="service-list">
                    <li>{{ __('messages.service_delivery') }}</li>
                    <li>{{ __('messages.service_repair') }}</li>
                    <li>{{ __('messages.service_refill') }}</li>
                </ul>
            </div>

            <div class="col-md-6">
                <ul class="service-list">
                    <li>{{ __('messages.service_consumables') }}</li>
                    <li>{{ __('messages.service_it') }}</li>
                    <li>{{ __('messages.service_networks') }}</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="section-card">
        <h2 class="section-title">{{ __('messages.cost_reduction') }}</h2>

        <div class="row">
            <div class="col-md-6">
                <ul class="service-list">
                    <li>{{ __('messages.cost_original') }}</li>
                    <li>{{ __('messages.cost_refill') }}</li>
                </ul>
            </div>

            <div class="col-md-6">
                <ul class="service-list">
                    <li>{{ __('messages.cost_toner') }}</li>
                    <li>{{ __('messages.cost_paper') }}</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="section-card">
        <h2 class="section-title">{{ __('messages.brands') }}</h2>

        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">Samsung</div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">HP</div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">Canon</div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">Lenovo</div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">Asus</div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">Dell</div>
            </div>
        </div>
    </div>


    <div class="section-card">
        <h2 class="section-title">{{ __('messages.about_section') }}</h2>

        <p class="about-text">
            <span class="highlight">{{ __('messages.highlight_printer') }}</span>
            {{ __('messages.about_text_1') }}
        </p>

        <p class="about-text">
            {{ __('messages.about_text_2') }}
        </p>

        <div class="row">
            <div class="col-md-6">
                <ul class="service-list">
                    <li>{{ __('messages.advantage_fast') }}</li>
                    <li>{{ __('messages.advantage_quality') }}</li>
                    <li>{{ __('messages.advantage_consumables') }}</li>
                </ul>
            </div>

            <div class="col-md-6">
                <ul class="service-list">
                    <li>{{ __('messages.advantage_equipment') }}</li>
                    <li>{{ __('messages.advantage_support') }}</li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection