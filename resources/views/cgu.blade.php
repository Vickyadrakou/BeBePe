@extends('layouts.app')

@section('title', __('messages.cgu.title') . ' - BeBePe')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section" style="min-height: 40vh;">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-shield-alt fa-lg me-2" style="color: #4db6ac !important;"></i>
                    <div>
                        BeBePe
                        <span>{{ __('messages.platform_description') }}</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li class="nav-item">
                            @auth
                                <a class="nav-link" href="{{ route('report') }}">{{ __('messages.report') }}</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.report') }}</a>
                            @endauth
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('resources.index') }}">{{ __('messages.resources') }}</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="hero-content container text-center py-5">
            <h1 class="hero-title" style="font-size: 2.5rem;">
                {{ __('messages.cgu.title') }}
            </h1>
            <p class="hero-subtitle">
                {{ __('messages.cgu.subtitle') }}
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                        
                        <p class="text-muted mb-4"><strong>{{ __('messages.last_update') }} :</strong> 18 janvier 2026</p>

                        <!-- Préambule -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.preamble_title') }}
                            </h2>
                            <p>
                                {{ __('messages.cgu.preamble_text_1') }}
                            </p>
                            <p>
                                {{ __('messages.cgu.preamble_text_2') }}
                            </p>
                            <div class="alert alert-info border-0 rounded-3">
                                <i class="fas fa-info-circle me-2"></i>
                                {{ __('messages.cgu.preamble_alert') }}
                            </div>
                        </div>

                        <!-- Article 1 : Définitions -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_1_title') }}
                            </h2>
                            <ul>
                                @foreach(__('messages.cgu.article_1_list') as $item)
                                    <li class="mb-2">{!! $item !!}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Article 2 : Objet -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_2_title') }}
                            </h2>
                            <p>{{ __('messages.cgu.article_2_intro') }}</p>
                            <ul>
                                @foreach(__('messages.cgu.article_2_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Article 3 : Accès et inscription -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_3_title') }}
                            </h2>
                            
                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_3_1_title') }}</h5>
                            <p>
                                {{ __('messages.cgu.article_3_1_text') }}
                            </p>

                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_3_2_title') }}</h5>
                            <p>{{ __('messages.cgu.article_3_2_intro') }}</p>
                            <ul>
                                @foreach(__('messages.cgu.article_3_2_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>

                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_3_3_title') }}</h5>
                            <p>
                                {{ __('messages.cgu.article_3_3_text') }}
                            </p>
                        </div>

                        <!-- Article 4 : Utilisation des services -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_4_title') }}
                            </h2>
                            
                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_4_1_title') }}</h5>
                            <p>{{ __('messages.cgu.article_4_1_intro') }}</p>
                            <ul>
                                @foreach(__('messages.cgu.article_4_1_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>

                            <div class="alert alert-warning border-0 rounded-3 mt-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>{{ __('messages.cgu.article_4_alert') }}</strong>
                            </div>

                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_4_2_title') }}</h5>
                            <p>
                                {{ __('messages.cgu.article_4_2_text') }}
                            </p>
                        </div>

                        <!-- Article 5 : Comportements interdits -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_5_title') }}
                            </h2>
                            <p>{{ __('messages.cgu.article_5_intro') }}</p>
                            <div class="row g-3">
                                @foreach(__('messages.cgu.article_5_list') as $item)
                                    <div class="col-md-6">
                                        <div class="p-3 bg-light rounded-3 h-100">
                                            <i class="fas fa-times-circle text-danger me-2"></i>
                                            {{ $item }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Article 6 : Propriété intellectuelle -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_6_title') }}
                            </h2>
                            <p>
                                {{ __('messages.cgu.article_6_text_1') }}
                            </p>
                            <p>
                                {{ __('messages.cgu.article_6_text_2') }}
                            </p>
                        </div>

                        <!-- Article 7 : Responsabilités -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_7_title') }}
                            </h2>
                            
                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_7_1_title') }}</h5>
                            <p>
                                {{ __('messages.cgu.article_7_1_text') }}
                            </p>

                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_7_2_title') }}</h5>
                            <p>
                                {{ __('messages.cgu.article_7_2_text') }}
                            </p>

                            <h5 class="fw-bold mt-4">{{ __('messages.cgu.article_7_3_title') }}</h5>
                            <p>
                                {{ __('messages.cgu.article_7_3_text') }}
                            </p>
                        </div>

                        <!-- Article 8 : Modération -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_8_title') }}
                            </h2>
                            <p>
                                {{ __('messages.cgu.article_8_intro') }}
                            </p>
                            <ul>
                                @foreach(__('messages.cgu.article_8_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Article 9 : Protection des mineurs -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_9_title') }}
                            </h2>
                            <div class="alert alert-success border-0 rounded-3">
                                <i class="fas fa-child me-2"></i>
                                <strong>{{ __('messages.cgu.article_9_alert') }}</strong>
                            </div>
                            <p>
                                {{ __('messages.cgu.article_9_text_1') }}
                            </p>
                            <p>
                                {{ __('messages.cgu.article_9_text_2') }}
                            </p>
                        </div>

                        <!-- Article 10 : Données personnelles -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_10_title') }}
                            </h2>
                            <p>
                                {{ __('messages.cgu.article_10_text_1') }}
                            </p>
                            <p>
                                {{ __('messages.cgu.article_10_text_2') }}
                            </p>
                        </div>

                        <!-- Article 11 : Modifications -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_11_title') }}
                            </h2>
                            <p>
                                {{ __('messages.cgu.article_11_text_1') }}
                            </p>
                            <p>
                                {{ __('messages.cgu.article_11_text_2') }}
                            </p>
                        </div>

                        <!-- Article 12 : Droit applicable -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_12_title') }}
                            </h2>
                            <p>
                                {{ __('messages.cgu.article_12_text') }}
                            </p>
                        </div>

                        <!-- Contact -->
                        <div class="mb-4">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                {{ __('messages.cgu.article_13_title') }}
                            </h2>
                            <p>{{ __('messages.cgu.article_13_intro') }}</p>
                            <div class="bg-light p-4 rounded-3">
                                <p class="mb-2"><i class="fas fa-building me-2" style="color: #0000;"></i><strong>BeBePe - {{ __('messages.platform_description') }}</strong></p>
                                <p class="mb-2"><i class="fas fa-map-marker-alt me-2" style="color: #0000;"></i>Lomé, Togo</p>
                                <p class="mb-2"><i class="fas fa-envelope me-2" style="color: #0000;"></i>v.adrakou@gmail.com</p>
                                <p class="mb-0"><i class="fas fa-phone me-2" style="color: #0000;"></i>+228 91178479</p>
                            </div>
                        </div>

                        <!-- Acceptation -->
                        <div class="border-top pt-4">
                            <div class="alert alert-light border rounded-3 mb-0">
                                <p class="mb-0 text-center">
                                    <i class="fas fa-check-circle me-2" style="color: #0000;"></i>
                                    {{ __('messages.cgu.acceptance_text') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-dark">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <a href="{{ route('home') }}" class="footer-brand">
                        <i class="fas fa-shield-alt me-2" style="color: #1abc9c;"></i> BeBePe
                    </a>
                    <p class="mb-4">
                        {{ __('messages.footer_description') }}
                    </p>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-bold mb-3">{{ __('messages.navigation') }}</h6>
                    <a href="{{ route('home') }}" class="footer-link">{{ __('messages.home') }}</a>
                    @auth
                        <a href="{{ route('report') }}" class="footer-link">{{ __('messages.report') }}</a>
                    @else
                        <a href="{{ route('login') }}" class="footer-link">{{ __('messages.report') }}</a>
                    @endauth
                    <a href="{{ route('resources.index') }}" class="footer-link">{{ __('messages.resources') }}</a>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-bold mb-3">{{ __('messages.legal') }}</h6>
                    <a href="{{ route('privacy') }}" class="footer-link">{{ __('messages.privacy.title') }}</a>
                    <a href="{{ route('cgu') }}" class="footer-link">{{ __('messages.cgu.title') }}</a>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">{{ __('messages.contact_us_label') }}</h6>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2" style="color: #1abc9c;"></i> Lomé, Togo</p>
                    <p class="mb-2"><i class="fas fa-envelope me-2" style="color: #1abc9c;"></i> contact@bebepe08.tg</p>
                    <p class="mb-0"><i class="fas fa-phone me-2" style="color: #1abc9c;"></i> +228 00 00 00 00</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                © 2025 BeBePe. {{ __('messages.all_rights_reserved') }}
            </div>
        </div>
    </footer>
@endsection
