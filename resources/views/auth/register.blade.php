<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.register') }} - BeBePe</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body style="background-color: #f0f8ff;">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="report-card" style="width: 100%; max-width: 500px;">
            <div class="text-center mb-4">
                <i class="fas fa-shield-alt fa-3x" style="color: #1abc9c;"></i>
                <h3 class="mt-3" style="font-family: var(--font-heading); color: var(--primary-dark); font-weight: 700;">{{ __('messages.register') }}</h3>
                <p class="text-muted">{{ __('messages.create_account_text') }}</p>
            </div>

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label-custom">{{ __('messages.full_name_label') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="far fa-user text-muted"></i></span>
                        <input type="text" name="name" class="form-control form-control-custom border-start-0 ps-0" placeholder="{{ __('messages.name_placeholder') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">{{ __('messages.email_label') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="far fa-envelope text-muted"></i></span>
                        <input type="email" name="email" class="form-control form-control-custom border-start-0 ps-0" placeholder="{{ __('messages.email_placeholder') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">{{ __('messages.password_label') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control form-control-custom border-start-0 ps-0" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-custom">{{ __('messages.confirm_password_label') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password_confirmation" class="form-control form-control-custom border-start-0 ps-0" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="privacy_accepted" id="privacy_accepted" class="form-check-input" required>
                        <label class="form-check-label small" for="privacy_accepted">
                            {{ __('messages.read_and_accept') }} <a href="{{ route('privacy') }}" target="_blank" style="color: var(--primary-green); text-decoration: underline;">{{ __('messages.privacy_policy') }}</a>
                        </label>
                        @error('privacy_accepted')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-cyan-block mb-3">
                    <i class="fas fa-user-plus me-2"></i> {{ __('messages.register_btn') }}
                </button>

                <div class="text-center small">
                    <p class="mb-0 text-muted">{{ __('messages.already_account') }} <a href="{{ route('login') }}" style="color: var(--primary-green); font-weight: 600; text-decoration: none;">{{ __('messages.login_link') }}</a></p>
                    <p class="mt-2"><a href="{{ url('/') }}" class="text-muted text-decoration-none"><i class="fas fa-arrow-left me-1"></i> {{ __('messages.back_to_home') }}</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
