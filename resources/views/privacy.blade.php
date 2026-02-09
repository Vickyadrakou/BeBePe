@extends('layouts.app')

@section('title', __('messages.privacy.title') . ' - BeBePe')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section" style="min-height: 40vh;">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-shield-alt fa-lg text-primary me-2" style="color: #0000 !important;"></i>
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
                {{ __('messages.privacy.title') }}
            </h1>
            <p class="hero-subtitle">
                {{ __('messages.privacy.subtitle') }}
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                        
                        <p class="text-muted mb-4"><strong>{{ __('messages.privacy.last_update') }}</strong> 18 janvier 2026</p>

                        <!-- Introduction -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                            
                            </h2>
                            <p>
                                {{ __('messages.privacy.intro_1') }}
                            </p>
                            <p>
                                {{ __('messages.privacy.intro_2') }}
                            </p>
                        </div>

                        <!-- Données collectées -->
                        <!-- Données collectées -->
                        <div class="mb-3">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class=></i>{{ __('messages.privacy.collected_title') }}
                            </h2>
                            
                            <h5 class="fw-bold mt-4">{{ __('messages.privacy.registration_title') }}</h5>
                            <ul class="list-unstyled">
                                @foreach(__('messages.privacy.registration_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>

                            <h5 class="fw-bold mt-4">{{ __('messages.privacy.report_title') }}</h5>
                            <ul class="list-unstyled">
                                @foreach(__('messages.privacy.report_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>

                            <h5 class="fw-bold mt-4">{{ __('messages.privacy.contact_data_title') }}</h5>
                            <ul class="list-unstyled">
                                @foreach(__('messages.privacy.contact_data_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Utilisation des données -->
                        <div class="mb-3">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas me-2"></i>{{ __('messages.privacy.usage_title') }}
                            </h2>
                            <p>{{ __('messages.privacy.usage_intro') }}</p>
                            <ul>
                                @foreach(__('messages.privacy.usage_list') as $item)
                                    <li class="mb-2">{{ $item }}</li>
                                @endforeach
                            </ul>
                            <div class="alert alert-warning border-0 rounded-3 mt-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>{{ __('messages.privacy.usage_important') }}</strong>
                            </div>
                        </div>

                        <!-- Protection des données -->
                        <div class="mb-3">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas me-2"></i>{{ __('messages.privacy.protection_title') }}
                            </h2>
                            <p>{{ __('messages.privacy.protection_intro') }}</p>
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas text-primary me-2"></i>
                                        <strong>{{ __('messages.privacy.protection_items.ssl_title') }}</strong>
                                        <p class="small text-muted mb-0 mt-1">{{ __('messages.privacy.protection_items.ssl_text') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas text-primary me-2"></i>
                                        <strong>{{ __('messages.privacy.protection_items.password_title') }}</strong>
                                        <p class="small text-muted mb-0 mt-1">{{ __('messages.privacy.protection_items.password_text') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas text-primary me-2"></i>
                                        <strong>{{ __('messages.privacy.protection_items.access_title') }}</strong>
                                        <p class="small text-muted mb-0 mt-1">{{ __('messages.privacy.protection_items.access_text') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas text-primary me-2"></i>
                                        <strong>{{ __('messages.privacy.protection_items.server_title') }}</strong>
                                        <p class="small text-muted mb-0 mt-1">{{ __('messages.privacy.protection_items.server_text') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conservation des données -->
                        <div class="mb-3">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas text-primary me-2"></i>{{ __('messages.privacy.retention_title') }}
                            </h2>
                            <p>{{ __('messages.privacy.retention_intro') }}</p>
                            <ul>
                                <li class="mb-2">{{ __('messages.privacy.retention_items.account') }}</li>
                                <li class="mb-2">{{ __('messages.privacy.retention_items.reports') }}</li>
                                <li class="mb-2">{{ __('messages.privacy.retention_items.contact') }}</li>
                            </ul>
                        </div>
 
                        <!-- Vos droits -->
                        <div class="mb-3">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas me-2"></i>{{ __('messages.privacy.rights_title') }}
                            </h2>
                            <p>{{ __('messages.privacy.rights_intro') }}</p>
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>{{ __('messages.privacy.rights_items.access_title') }}</strong>
                                            <p class="small text-muted mb-0">{{ __('messages.privacy.rights_items.access_text') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>{{ __('messages.privacy.rights_items.rectification_title') }}</strong>
                                            <p class="small text-muted mb-0">{{ __('messages.privacy.rights_items.rectification_text') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>{{ __('messages.privacy.rights_items.erasure_title') }}</strong>
                                            <p class="small text-muted mb-0">{{ __('messages.privacy.rights_items.erasure_text') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>{{ __('messages.privacy.rights_items.opposition_title') }}</strong>
                                            <p class="small text-muted mb-0">{{ __('messages.privacy.rights_items.opposition_text') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4">
                                {{ __('messages.privacy.rights_contact') }} 
                                <a href="mailto:v.adrakou@gmail.com" class="text-primary">v.adrakou@gmail.com</a>
                            </p>
                        </div>

                        <!-- Anonymat -->
                        <div class="mb-3">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas me-2"></i>{{ __('messages.privacy.anonymity_title') }}
                            </h2>
                            <div class="alert alert-success border-0 rounded-3">
                                <p class="mb-0">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ __('messages.privacy.anonymity_text') }}
                                </p>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="mb-4">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas fa-envelope-dark text-primary me-2"></i>{{ __('messages.privacy.contact_section_title') }}
                            </h2>
                            <p>{{ __('messages.privacy.contact_section_intro') }}</p>
                            <div class="bg-light p-4 rounded-3">
                                <p class="mb-2"><i class="fas fa-building-primary-dark text-primary me-2"></i><strong>BeBePe - {{ __('messages.platform_description') }}</strong></p>
                                <p class="mb-2"><i class="fas text-primary me-2"></i>Lomé, Togo</p>
                                <p class="mb-2"><i class="fas text-primary me-2"></i>v.adrakou@gmail.com</p>
                                <p class="mb-0"><i class="fas text-primary me-2"></i>+228 91178479</p>
                            </div>
                        </div>

                        <!-- Modifications -->
                        <div class="border-top pt-4">
                            <p class="text-muted small mb-0">
                                <i class="fas fa-sync-alt me-2"></i>
                                {{ __('messages.privacy.modifications_text') }}
                            </p>
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
                        <i class="fas me-2 text-primary"></i> BeBePe
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
                    <p class="mb-2"><i class="fas me-2 text-primary"></i> Lomé, Togo</p>
                    <p class="mb-2"><i class="fas me-2 text-primary"></i> v.adrakou@gmail.com</p>
                    <p class="mb-0"><i class="fas me-2 text-primary"></i> +228 91178479</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                © 2025 BeBePe. {{ __('messages.all_rights_reserved') }}
            </div>
        </div>
    </footer>
@endsection
