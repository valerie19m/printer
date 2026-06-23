@php
    $editMode = session('editMode', false);
@endphp

@extends('layouts.app')

@section('title', 'Acordul Printer.md')

@push('styles')
<style>
      *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    body {
        background: #f5f5f5;
    }
    
    .container{
        width:100%;
        max-width:1250px;
        margin:auto;
    }
    .agreement-page {
        padding: 30px 0;
        color: #111;
        font-family: 'Inter', sans-serif;
    }

    .hero-section {
        background: #111;
        color: #fff;
        border-radius: 30px;
        padding: 70px 60px;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        width: 320px;
        height: 320px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
        top: -120px;
        right: -100px;
    }

    .hero-section h1 {
        font-size: 58px;
        font-weight: 900;
        margin-bottom: 20px;
        letter-spacing: -2px;
    }

    .hero-section p {
        font-size: 18px;
        line-height: 1.9;
        color: rgba(255,255,255,0.8);
        max-width: 900px;
    }

    .agreement-card {
        background: #fff;
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 30px;
        border: 1px solid #e8e8e8;
        box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        transition: 0.3s ease;
    }

    .agreement-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    }

    .section-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 25px;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 15px;
        letter-spacing: 1px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 60px;
        height: 3px;
        background: #111;
    }

    .agreement-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .agreement-item {
        background: #fafafa;
        border: 1px solid #ededed;
        border-radius: 18px;
        padding: 22px;
        transition: 0.25s ease;
    }

    .agreement-item:hover {
        background: #111;
        color: #fff;
        transform: translateX(6px);
    }

    .agreement-item h4 {
        margin: 0;
        font-size: 16px;
        line-height: 1.9;
        font-weight: 500;
    }

    @media(max-width: 768px) {

        .hero-section {
            padding: 50px 30px;
        }

        .hero-section h1 {
            font-size: 40px;
        }

        .agreement-card {
            padding: 28px;
        }

        .section-title {
            font-size: 22px;
        }

        .agreement-item {
            padding: 18px;
        }
    }
</style>
@endpush

@section('content')

<div class="container agreement-page">

    <div class="hero-section">
       <h1>{{ __('messages.agreement_title') }}</h1>

<p>
    {{ __('messages.agreement_desc') }}
</p>
    </div>

    {{-- SECTION 1 --}}
    <div class="agreement-card">
       <h2 class="section-title">
    {{ __('messages.section_1_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
              <h4>{{ __('messages.section_1_item_1') }}</h4>
            </div>

            <div class="agreement-item">
             <h4>{{ __('messages.section_1_item_2') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_1_item_3') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_1_item_4') }}</h4>
            </div>

            <div class="agreement-item">
              <h4>{{ __('messages.section_1_item_5') }}</h4>
            </div>
        </div>
    </div>

    {{-- SECTION 2 --}}
    <div class="agreement-card">
       <h2 class="section-title">
    {{ __('messages.section_2_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
             <h4>{{ __('messages.section_2_item_1') }}</h4>
            </div>

            <div class="agreement-item">
              <h4>{{ __('messages.section_2_item_2') }}</h4>
            </div>

            <div class="agreement-item">
             <h4>{{ __('messages.section_2_item_3') }}</h4>
            </div>

            <div class="agreement-item">
              <h4>{{ __('messages.section_2_item_4') }}</h4>
            </div>
        </div>
    </div>

    {{-- SECTION 3 --}}
    <div class="agreement-card">
       <h2 class="section-title">
    {{ __('messages.section_3_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
             <h4>{{ __('messages.section_3_item_1') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_3_item_2') }}</h4>
            </div>

            <div class="agreement-item">
             <h4>{{ __('messages.section_3_item_3') }}</h4>
            </div>

            <div class="agreement-item">
             <h4>{{ __('messages.section_3_item_4') }}</h4>
            </div>
        </div>
    </div>

    {{-- SECTION 4 --}}
    <div class="agreement-card">
   <h2 class="section-title">
    {{ __('messages.section_4_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
             <h4>{{ __('messages.section_4_item_1') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_4_item_2') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_4_item_3') }}</h4>
            </div>

            <div class="agreement-item">
             <h4>{{ __('messages.section_4_item_4') }}</h4>
            </div>

            <div class="agreement-item">
             <h4>{{ __('messages.section_4_item_5') }}</h4>
            </div>
        </div>
    </div>

    {{-- SECTION 5 --}}
    <div class="agreement-card">
     <h2 class="section-title">
    {{ __('messages.section_5_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
                <h4>{{ __('messages.section_5_item_1') }}</h4>

            </div>

            <div class="agreement-item">
                <h4>{{ __('messages.section_5_item_2') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_5_item_3') }}</h4>
            </div>

            <div class="agreement-item">
                <h4>{{ __('messages.section_5_item_4') }}</h4>
            </div>
        </div>
    </div>

    {{-- SECTION 6 --}}
    <div class="agreement-card">
       <h2 class="section-title">
    {{ __('messages.section_6_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
               <h4>{{ __('messages.section_6_item_1') }}</h4>
            </div>

            <div class="agreement-item">
              <h4>{{ __('messages.section_6_item_2') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_6_item_3') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_6_item_4') }}</h4>

            </div>
        </div>
    </div>

    {{-- SECTION 7 --}}
    <div class="agreement-card">
       <h2 class="section-title">
    {{ __('messages.section_7_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
               <h4>{{ __('messages.section_7_item_1') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_7_item_2') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_7_item_3') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_7_item_4') }}</h4>
            </div>
        </div>
    </div>

    {{-- SECTION 8 --}}
    <div class="agreement-card">
        <h2 class="section-title">
    {{ __('messages.section_8_title') }}
</h2>

        <div class="agreement-list">
            <div class="agreement-item">
              <h4>{{ __('messages.section_8_item_1') }}</h4>
            </div>

            <div class="agreement-item">
                <h4>{{ __('messages.section_8_item_2') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_8_item_3') }}</h4>
            </div>

            <div class="agreement-item">
               <h4>{{ __('messages.section_8_item_4') }}</h4>
            </div>
        </div>
    </div>

</div>

@endsection