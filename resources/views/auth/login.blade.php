@extends('layouts.app')

@section('title', __('messages.login') . ' - BeBePe')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="report-card" style="width: 100%; max-width: 500px;">
            <div class="text-center mb-4">
                <i class="fas fa-shield-alt fa-3x" style="color: #1abc9c;"></i>
                <h3 class="mt-3" style="font-family: var(--font-heading); color: var(--primary-dark); font-weight: 700;">{{ __('messages.login') }}</h3>
                <p class="text-muted">{{ __('messages.access_secure_space') }}</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label-custom">{{ __('messages.email_label') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="far fa-envelope text-muted"></i></span>
                        <input type="email" name="email" class="form-control form-control-custom border-start-0 ps-0" placeholder="{{ __('messages.email_placeholder') }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-custom">{{ __('messages.password_label') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control form-control-custom border-start-0 ps-0" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 small">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label text-muted" for="remember">{{ __('messages.remember_me') }}</label>
                    </div>
                    <a href="#" class="text-decoration-none" style="color: var(--primary-green);">{{ __('messages.forgot_password') }}</a>
                </div>

                <button type="submit" class="btn btn-cyan-block mb-3">
                    <i class="fas fa-sign-in-alt me-2"></i> {{ __('messages.login_btn') }}
                </button>

                <div class="text-center small">
                    <p class="mb-0 text-muted">{{ __('messages.no_account') }} <a href="{{ route('register') }}" style="color: var(--primary-green); font-weight: 600; text-decoration: none;">{{ __('messages.register_link') }}</a></p>
                    <p class="mt-2"><a href="{{ url('/') }}" class="text-muted text-decoration-none"><i class="fas fa-arrow-left me-1"></i> {{ __('messages.back_to_home') }}</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
