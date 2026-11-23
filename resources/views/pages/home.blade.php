@extends('layouts.site')

@section('title', 'Serein - Эко СПА салон красоты | Релакс и уход')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@section('content')
    <header class="main-header">
        <img src="{{ asset('assets/images/hero-banner.png') }}" alt="Баннер" class="banner">
        <div class="header-content">
            <h1 class="main-title">Serein</h1>
            <p class="main-subtitle">Место, где красота рождается в гармонии с природой!</p>
            <a href="{{ route('callback.form') }}" class="button primary-button">ЗАКАЗАТЬ ЗВОНОК</a>
            <p class="promo-text">Позвоните сейчас и получите скидку 20% на первый визит!</p>
        </div>
    </header>
    <section id="about" class="about-section">
        <div class="container">
            <h2 class="section-title">О нас</h2>
            <p class="about-description">
                Наш спа-салон — это больше, чем место для красоты и ухода. Это оазис, где мы создали пространство
                 для полного перезапуска вашего тела и духа. Мы верим, что истинная красота рождается из гармонии с природой,
                а потому построили наш философию на трех принципах:
            </p>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('assets/images/feature-icon.webp') }}" alt="Эко-подход" class="feature-sticker">
                    </div>
                    <h3 class="feature-title">Эффективность</h3>
                    <p class="feature-text">
                        Мы тщательно отбираем процедуры и средства, которые дают видимый и долговременный результат.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('assets/images/feature-icon.webp') }}" alt="Эко-подход" class="feature-sticker">
                    </div>
                    <h3 class="feature-title">Забота</h3>
                    <p class="feature-text">
                        Мы осознанно подходим к каждому аспекту нашей работы: от использования натуральной косметики
                        до переработки отходов и минимизации воздействия на окружающую среду.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('assets/images/feature-icon.webp') }}" alt="Эко-подход" class="feature-sticker">
                    </div>
                    <h3 class="feature-title">Экологичность</h3>
                    <p class="feature-text">
                        Забота не только о вас, но и о планете. Выбирая наши услуги, вы поддерживаете
                        экологичные инициативы и этичное производство.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="services-section">
        <div class="container">
            <h2 class="section-title">Услуги</h2>
            <div class="services-grid">
                <div class="service-card">
                    <h3 class="service-name">Уход за лицом</h3>
                    <div class="service-details">
                        <div class="service-detail">
                            <span class="detail-label">Длительность:</span>
                            <span class="detail-value">60-90 мин</span>
                        </div>
                        <div class="service-detail">
                            <span class="detail-label">Стоимость:</span>
                            <span class="detail-value">от 80 BYN</span>
                        </div>
                    </div>
                </div>
                <div class="service-card">
                    <h3 class="service-name">СПА массаж</h3>
                    <div class="service-details">
                        <div class="service-detail">
                            <span class="detail-label">Длительность:</span>
                            <span class="detail-value">60-120 мин</span>
                        </div>
                        <div class="service-detail">
                            <span class="detail-label">Стоимость:</span>
                            <span class="detail-value">от 100 BYN</span>
                        </div>
                    </div>
                </div>
                <div class="service-card">
                    <h3 class="service-name">Уход за телом</h3>
                    <div class="service-details">
                        <div class="service-detail">
                            <span class="detail-label">Длительность:</span>
                            <span class="detail-value">90-120 мин</span>
                        </div>
                        <div class="service-detail">
                            <span class="detail-label">Стоимость:</span>
                            <span class="detail-value">от 120 BYN</span>
                        </div>
                    </div>
                </div>
                <div class="service-card">
                    <h3 class="service-name">Комплексные программы</h3>
                    <div class="service-details">
                        <div class="service-detail">
                            <span class="detail-label">Длительность:</span>
                            <span class="detail-value">2-3 часа</span>
                        </div>
                        <div class="service-detail">
                            <span class="detail-label">Стоимость:</span>
                            <span class="detail-value">от 200 BYN</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
