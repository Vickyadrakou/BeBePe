@extends('layouts.app')

@section('title', "BeBePe - Plateforme de signalement, d'accompagnement et de lutte contre l'harcèlement au TOGO")

@section('content')
    <!-- Hero Section Wrapper -->
    <div class="hero-section">
        
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-shield-alt fa-lg text-primary me-2" style="color: #4db6ac !important;"></i>
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
                        <li class="nav-item"><a class="nav-link" href="#services">{{ __('messages.about') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacts">{{ __('messages.contact') }}</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-globe me-1"></i> {{ strtoupper(app()->getLocale()) }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('lang.swap', 'fr') }}">Français</a></li>
                                <li><a class="dropdown-item" href="{{ route('lang.swap', 'en') }}">English</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @auth
                    <a href="{{ route('report') }}" class="btn btn-outline-custom">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ __('messages.signal_case') }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-custom">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ __('messages.signal_case') }}
                    </a>
                @endauth
            </div>
        </nav>

        <!-- Main Content -->
        <div class="hero-content container">
            <div>
                <h1 class="hero-title">
                    {{ __('messages.hero_title') }}
                    <em>{{ __('messages.hero_title_emphasis') }}</em>
                </h1>
                <p class="hero-subtitle">
                    {{ __('messages.hero_subtitle') }}
                </p>
                
                <div class="d-flex justify-content-center gap-3 mt-5">
                    <!-- Blank white pill button as in mockup -->
                    @auth
                        <a href="{{ route('report') }}" class="btn btn-white-pill" style="min-width: 180px; color: black; text-decoration: none;">{{ __('messages.signal_case') }}</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-white-pill" style="min-width: 180px; color: black; text-decoration: none;">{{ __('messages.signal_case') }}</a>
                    @endauth
                    
                    <a href="#" class="btn btn-outline-pill">
                        <i class="fas fa-info-circle me-2"></i> {{ __('messages.learn_more') }}
                    </a>
                </div>

                <div class="mt-5 text-center">
                    <div class="mb-2"><i class="fas fa-shield-alt me-2"></i> {{ __('messages.confidential_anonymous') }}</div>
                </div>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="hero-footer text-center">
            <div class="container">
                <span class="hero-footer-item"><i class="fas fa-lock"></i> {{ __('messages.data_protected') }}</span>
                <span class="hero-footer-item"><i class="fas fa-headset"></i> {{ __('messages.support_24_7') }}</span>
                <span class="hero-footer-item"><i class="fas fa-user-friends"></i> {{ __('messages.expert_support') }}</span>
                <span class="hero-footer-item"><a href="{{ route('privacy') }}" class="text-white text-decoration-none"><i class="fas fa-shield-alt"></i> {{ __('messages.privacy_policy') }}</a></span>
            </div>
        </div>

    </div>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <h2 class="stats-title">{{ __('messages.impact_title') }}</h2>
            <p class="stats-subtitle">
                {{ __('messages.impact_subtitle') }}
            </p>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="stat-card-custom">
                        <div class="stat-number-custom">1,250+</div>
                        <div class="stat-label-custom">{{ __('messages.victims_accompanied') }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card-custom">
                        <div class="stat-number-custom">96%</div>
                        <div class="stat-label-custom">{{ __('messages.resolution_rate') }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card-custom">
                        <div class="stat-number-custom">24/7</div>
                        <div class="stat-label-custom">{{ __('messages.support_available') }}</div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Status Pill -->
            <div class="status-pill">
                <div class="d-flex align-items-center">
                    <span class="status-dot"></span>
                    <strong>{{ __('messages.system_operational') }}</strong>
                </div>
                <div class="status-divider"></div>
                <div>
                    {{ __('messages.last_update') }} : <strong>{{ __('messages.today') }}, 09:30</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">{{ __('messages.our_services') }}</span>
                <h2 class="stats-title mt-3">{{ __('messages.complete_support') }}</h2>
                <p class="stats-subtitle">{{ __('messages.services_subtitle') }}</p>
            </div>

            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-pink">
                        <div class="service-icon-wrapper icon-pink">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h4 class="service-title">{{ __('messages.secure_reporting') }}</h4>
                        <p class="service-text">{{ __('messages.secure_reporting_text') }}</p>
                        <a href="#" class="service-link">{{ __('messages.start') }} <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-green">
                        <div class="service-icon-wrapper icon-green">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h4 class="service-title">{{ __('messages.psychological_support') }}</h4>
                        <p class="service-text">{{ __('messages.psychological_support_text') }}</p>
                        <a href="#" class="service-link">{{ __('messages.find_help') }} <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-blue">
                        <div class="service-icon-wrapper icon-blue">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <h4 class="service-title">{{ __('messages.legal_aid') }}</h4>
                        <p class="service-text">{{ __('messages.legal_aid_text') }}</p>
                        <a href="#" class="service-link">{{ __('messages.consult_expert') }} <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-yellow">
                        <div class="service-icon-wrapper icon-yellow">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h4 class="service-title">{{ __('messages.educational_resources') }}</h4>
                        <p class="service-text">{{ __('messages.educational_resources_text') }}</p>
                        <a href="#" class="service-link">{{ __('messages.explore') }} <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Help Banner -->
    <section class="container">
        <div class="help-banner">
            <h2 class="help-title">{{ __('messages.immediate_help_title') }}</h2>
            <p class="help-text">{{ __('messages.immediate_help_text') }}</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="#" class="btn btn-light rounded-pill px-4 py-3 fw-bold text-teal"><i class="fas fa-phone-alt me-2"></i> {{ __('messages.call') }} 117</a>
                <a href="#" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold"><i class="fas fa-phone-alt me-2"></i> {{ __('messages.call') }} 118</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label" style="background-color: #e3f2fd; color: #0984e3;">{{ __('messages.testimonials_label') }}</span>
                <h2 class="stats-title mt-3">{{ __('messages.testimonials_title') }}</h2>
                <p class="stats-subtitle">{{ __('messages.testimonials_subtitle') }}</p>
            </div>

            <div class="row g-4 mb-5">
                <!-- Testimonial 1 -->
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Grâce à cette plateforme, j'ai enfin pu parler de ce que je vivais au travail sans peur de représailles. L'accompagnement a été incroyable."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar avatar-teal">A</div>
                            <div class="author-info">
                                <h5>Anonymat</h5>
                                <span>Utilisatrice aidée</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Le soutien psychologique que j'ai reçu m'a aidé à surmonter une période très difficile. Je me sens enfin écouté et compris."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar avatar-green">M</div>
                            <div class="author-info">
                                <h5>Anonymat</h5>
                                <span>Étudiant accompagné</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"Une ressource indispensable pour notre établissement scolaire. Les outils de prévention sont très bien faits et faciles à utiliser."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar avatar-cyan">P</div>
                            <div class="author-info">
                                <h5>Anonymat</h5>
                                <span>Directeur d'école</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trust Badges -->
            <div class="text-center">
                <div class="trust-badges">
                    <div class="trust-item"><i class="fas fa-check-circle"></i> Partenaire Ministère</div>
                    <div class="trust-item"><i class="fas fa-check-circle"></i> ONG Certifiée</div>
                    <div class="trust-item"><i class="fas fa-check-circle"></i> Données Sécurisées SSL</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Resources Section -->
    <section class="resources-section">
        <div class="container">
            <div class="section-header-custom">
                <div>
                    <span class="section-label" style="background-color: #fff8e1; color: #f1c40f;">{{ __('messages.inform_prevent') }}</span>
                    <h2 class="stats-title mt-3 mb-0">{{ __('messages.essential_resources') }}</h2>
                </div>
                <a href="{{ route('resources.index') }}" class="btn btn-outline-custom" style="color: var(--primary-dark); border-color: #ddd;">
                    {{ __('messages.see_all_resources') }} <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="row g-4">
                <!-- Main Featured Resource -->
                <div class="col-lg-6">
                    @if($featuredResource)
                    <div class="resource-card-large" style="background: url('{{ $featuredResource->image_path ? asset('storage/' . $featuredResource->image_path) : 'https://placehold.co/600x400/1abc9c/white?text=A+la+Une' }}') no-repeat center center; background-size: cover;">
                        <div class="resource-bg-overlay"></div>
                        <div class="resource-content">
                            <span class="badge-custom badge-green">{{ $featuredResource->category }}</span>
                            <h3 class="resource-title-large">{{ Str::limit($featuredResource->title, 50) }}</h3>
                            <p class="mb-4 text-white-50">{{ Str::limit($featuredResource->summary, 100) }}</p>
                            @if($featuredResource->document_path)
                                <a href="{{ asset('storage/' . $featuredResource->document_path) }}" target="_blank" class="btn btn-teal align-self-start">{{ __('messages.read_guide') }}</a>
                            @elseif($featuredResource->video_path)
                                 <a href="{{ asset('storage/' . $featuredResource->video_path) }}" target="_blank" class="btn btn-teal align-self-start">{{ __('messages.watch_video') }}</a>
                            @else
                                <a href="#" class="btn btn-teal align-self-start">{{ __('messages.consult') }}</a>
                            @endif
                        </div>
                    </div>
                    @else
                        <div class="text-center py-5 bg-light rounded">
                            <i class="fas fa-book-reader fa-3x text-muted mb-3 opacity-25"></i>
                            <h5 class="text-muted">{{ __('messages.no_featured_resource') }}</h5>
                        </div>
                    @endif
                </div>

                <!-- Right Column Small Resources -->
                <div class="col-lg-6">
                    @forelse($otherResources as $resource)
                    <!-- Resource Small -->
                    <div class="resource-card-small">
                        <img src="{{ $resource->image_path ? asset('storage/' . $resource->image_path) : 'https://placehold.co/100x100/e67e22/white?text=Info' }}" alt="Resource" class="resource-img-small">
                        <div class="resource-small-content">
                            @php
                                $badgeClass = 'badge-orange';
                                if($resource->category == 'Éducation' || $resource->category == 'Harcèlement Scolaire') $badgeClass = 'badge-yellow';
                                elseif($resource->category == 'Guide Juridique') $badgeClass = 'badge-orange';
                                else $badgeClass = 'badge-green';
                            @endphp
                            <span class="badge-custom {{ $badgeClass }} mb-2">{{ $resource->category }}</span>
                            <h5>{{ Str::limit($resource->title, 40) }}</h5>
                            <p class="text-muted small mb-0">{{ Str::limit($resource->summary, 60) }}</p>
                            <span class="resource-meta">
                                @if($resource->document_path)
                                    <i class="fas fa-file-pdf me-1"></i> Document
                                @elseif($resource->video_path)
                                    <i class="fas fa-video me-1"></i> Vidéo
                                @else
                                    <i class="far fa-clock me-1"></i> Article
                                @endif
                            </span>
                        </div>
                    </div>
                    @empty
                        <div class="text-center py-4 bg-light rounded mt-3">
                            <p class="text-muted mb-0">{{ __('messages.more_resources_soon') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Community Section ("Un Engagement fort" - previously "Votre Espace") -->
    <section class="community-section">
        <div class="container">
            <div class="community-banner">
                <h2 class="community-title">
                    {{ __('messages.collective_commitment') }} <em>{{ __('messages.collective_commitment_emphasis') }}</em>
                </h2>
                <p class="community-text">
                    {{ __('messages.community_text') }}
                </p>
                
                <div class="community-features">
                    <div class="community-feature-item"><i class="fas fa-check text-accent"></i> {{ __('messages.mutual_respect') }}</div>
                    <div class="community-feature-item"><i class="fas fa-check text-accent"></i> {{ __('messages.solidarity') }}</div>
                    <div class="community-feature-item"><i class="fas fa-check text-accent"></i> {{ __('messages.concrete_action') }}</div>
                </div>
            </div>

            <!-- Overlapping Cards -->
            <div class="community-cards-wrapper">
                <div class="container px-5">
                    <div class="row g-4 justify-content-center">
                        <!-- Card 1: Suivi Expert (Previously Espace Personnel) -->
                        <div class="col-md-6 col-lg-5">
                            <div class="community-card card-purple">
                                <div class="cc-icon-wrapper text-primary">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <h3 class="cc-title">{{ __('messages.expert_followup') }}</h3>
                                <p class="cc-text">
                                    {{ __('messages.expert_followup_text') }}
                    
                                </p>
                            </div>
                        </div>

                        <!-- Card 2: Anonymat Garanti -->
                        <div class="col-md-6 col-lg-5">
                            <div class="community-card card-green">
                                <div class="cc-icon-wrapper text-success">
                                    <i class="fas fa-mask"></i>
                                </div>
                                <h3 class="cc-title">{{ __('messages.total_anonymity') }}</h3>
                                <p class="cc-text">
                                    {{ __('messages.total_anonymity_text') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contacts" class="contacts-section py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <span class="section-label" style="background-color: #fff8e1; color: #f1c40f;">{{ __('messages.contact_us_label') }}</span>
                    <h2 class="stats-title mt-3">{{ __('messages.need_to_talk') }}</h2>
                    <p class="stats-subtitle text-start ms-0 mb-4">
                        {{ __('messages.contact_subtitle') }}
                    </p>
                    
                    <div class="contact-info-list mt-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">{{ __('messages.our_headquarters') }}</h6>
                                <p class="text-muted mb-0">Lomé, Togo</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">{{ __('messages.email') }}</h6>
                                <p class="text-muted mb-0">v.adrakou@gmail.com</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="contact-info-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">{{ __('messages.phone') }}</h6>
                                <p class="text-muted mb-0">+228 91178479</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7">
                    <div class="contact-card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                        @if(session('success_contact'))
                            <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 mb-4" role="alert" style="background-color: #d1e7dd; color: #0f5132;">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success_contact') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-muted">{{ __('messages.full_name') }}</label>
                                    <input type="text" name="name" class="form-control form-control-custom @error('name') is-invalid @enderror" placeholder="{{ __('messages.placeholder_name') }}" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-muted">{{ __('messages.address_email') }}</label>
                                    <input type="email" name="email" class="form-control form-control-custom @error('email') is-invalid @enderror" placeholder="email@exemple.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-muted">{{ __('messages.subject') }}</label>
                                    <input type="text" name="subject" class="form-control form-control-custom @error('subject') is-invalid @enderror" placeholder="{{ __('messages.placeholder_subject') }}" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-muted">{{ __('messages.message') }}</label>
                                    <textarea name="message" class="form-control form-control-custom @error('message') is-invalid @enderror" rows="5" placeholder="{{ __('messages.placeholder_message') }}" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <button type="submit" class="btn btn-teal rounded-pill px-5 py-3 fw-bold w-100">
                                        {{ __('messages.send_message') }} <i class="fas fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
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
                    <a href="#" class="footer-brand">
                        <i class="fas fa-shield-alt me-2 text-primary"></i> BeBePe
                    </a>
                    <p class="mb-4">
                        {{ __('messages.footer_description') }}
                    </p>
                    <div class="d-flex">
                        <a href="#" class="footer-social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-telegram"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
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
                    <a href="{{ route('login') }}" class="footer-link">{{ __('messages.administration') }}</a>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-bold mb-3">{{ __('messages.legal') }}</h6>
                    <a href="#" class="footer-link">{{ __('messages.legal_mentions') }}</a>
                    <a href="{{ route('privacy') }}" class="footer-link">{{ __('messages.privacy_policy') }}</a>
                    <a href="{{ route('cgu') }}" class="footer-link">{{ __('messages.cgu.title') }}</a>
                </div>
                <!-- Removed Admin Column as per request (redundant/secure) or kept minimal -->
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">{{ __('messages.contact_us_label') }}</h6>
                    <p class="mb-2"><i class="fas me-2 text-primary"></i> Lomé, Togo</p>
                    <p class="mb-2"><i class="fas me-2 text-primary"></i> v.adrakou@gmail.com</p>
                    <p class="mb-0"><i class="fas me-2 text-primary"></i> (+228) 91178479</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                © 2025 BeBePe. {{ __('messages.all_rights_reserved') }}
            </div>
        </div>
    </footer>

@endsection
