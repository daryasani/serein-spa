@extends('layouts.site')

@section('title', 'Контакты | Serein - Эко СПА салон красоты')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;family=Inter:wght@400;500;600&amp;family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/contacts.css') }}">
@endpush

@section('content')
    <header class="page-header">
        <h1 class="page-title">Наши контакты</h1>
        <p class="page-subtitle">Ждем вас, чтобы подарить моменты чистого блаженства и заботы о себе</p>
    </header>

    <section class="info-section">
        <div class="info-row">
            <div class="info-card">
                <div class="card-header">
                    <div class="card-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h3 class="card-title">Расположение</h3>
                </div>
                <div class="card-content">
                    <div class="address-line">
                        <i class="fas fa-building"></i>
                        <span>@include('partials.demo-address')</span>
                    </div>
                </div>
            </div>

            <div class="info-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="card-title">Телефон</h3>
                </div>
                <div class="card-content">
                    <div class="phone-number-text">
                        <i class="fas fa-phone"></i>
                        +375 (00) 482-76-31
                    </div>


                </div>
            </div>

            <div class="info-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="far fa-clock"></i>
                    </div>
                    <h3 class="card-title">Часы работы</h3>
                </div>
                <div class="card-content">
                    <div class="hours-item">
                        <span class="hours-day">Понедельник - Пятница</span>
                        <span class="hours-time">10:00 - 22:00</span>
                    </div>
                    <div class="hours-item">
                        <span class="hours-day">Суббота</span>
                        <span class="hours-time">10:00 - 20:00</span>
                    </div>
                    <div class="hours-item">
                        <span class="hours-day">Воскресенье</span>
                        <span class="hours-time">11:00 - 19:00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
