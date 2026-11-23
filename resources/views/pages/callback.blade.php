@extends('layouts.site')

@section('title', 'Заказать звонок | Serein - Эко СПА салон красоты')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/callback.css') }}">
@endpush

@section('content')
    <header class="page-header">
        <h1 class="page-title">Заказать звонок</h1>
        <p class="page-subtitle">Заполните форму, чтобы оставить заявку на обратный звонок</p>
    </header>

    <div class="form-section">
        <div class="form-container">
            @if (session('callbackSubmitted'))
                <p role="status">Спасибо! Ваша заявка принята.</p>
            @endif
            <form id="callbackForm" action="{{ route('callback.store') }}" method="POST">
                @csrf
                <p id="callbackError" role="alert"></p>
                <div class="form-group">
                    <label for="name" class="form-label">Ваше имя</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Имя" value="{{ old('name') }}" autocomplete="name" maxlength="255" aria-describedby="nameError" @error('name') aria-invalid="true" @enderror required>
                    <span id="nameError" class="field-error" aria-live="polite">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Номер телефона</label>
                    <input type="tel" id="phone" name="phone" class="form-input" placeholder="+375 (XX) XXX-XX-XX" value="{{ old('phone') }}" autocomplete="tel" maxlength="50" aria-describedby="phoneError" @error('phone') aria-invalid="true" @enderror required>
                    <span id="phoneError" class="field-error" aria-live="polite">{{ $errors->first('phone') }}</span>
                </div>

                <div class="form-group">
                    <label for="comment" class="form-label">Комментарий (необязательно)</label>
                    <textarea id="comment" name="comment" class="form-textarea" placeholder="Укажите удобное время для звонка..." maxlength="1000" aria-describedby="commentError" @error('comment') aria-invalid="true" @enderror>{{ old('comment') }}</textarea>
                    <span id="commentError" class="field-error" aria-live="polite">{{ $errors->first('comment') }}</span>
                </div>

                <button type="submit" class="submit-btn">Заказать звонок</button>
            </form>
        </div>
    </div>

    <!-- Всплывающее окно -->
    <div class="popup-overlay" id="popupOverlay"></div>
    <div class="popup-message" id="successPopup">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h2 style="color: #28a745; margin-bottom: 15px;">✅ Звонок успешно оформлен!</h2>
        <p id="successText" style="font-size: 18px; margin-bottom: 20px; line-height: 1.5;">
            Спасибо! Ваша заявка принята.
        </p>
        <div style="margin-top: 25px;">
            <button id="closeCallbackPopup" type="button" style="padding: 12px 30px; background-color: #964943; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">
                Отлично!
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/callback.js') }}" defer></script>
@endpush
