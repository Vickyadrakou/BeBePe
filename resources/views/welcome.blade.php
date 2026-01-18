@extends('layouts.app')

@section('title', 'BeBePe - Plateforme de protection')

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
                        <span>Plateforme de signalement et de lutte contre le harcèlement au TOGO</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                        <li class="nav-item">
                            @auth
                                <a class="nav-link" href="{{ route('report') }}">Signalement</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Signalement</a>
                            @endauth
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('resources.index') }}">Ressources</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">À propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacts">Contact</a></li>
                    </ul>
                </div>
                @auth
                    <a href="{{ route('report') }}" class="btn btn-outline-custom">
                        <i class="fas fa-exclamation-triangle me-2"></i> Signaler un cas
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-custom">
                        <i class="fas fa-exclamation-triangle me-2"></i> Signaler un cas
                    </a>
                @endauth
            </div>
        </nav>

        <!-- Main Content -->
        <div class="hero-content container">
            <div>
                <h1 class="hero-title">
                    Ensemble contre
                    <em>le harcèlement</em>
                </h1>
                <p class="hero-subtitle">
                    Une plateforme sécurisée pour signaler, accompagner et prévenir toutes les formes de harcèlement au Togo. Votre sécurité, notre priorité.
                </p>
                
                <div class="d-flex justify-content-center gap-3 mt-5">
                    <!-- Blank white pill button as in mockup -->
                    @auth
                        <a href="{{ route('report') }}" class="btn btn-white-pill" style="min-width: 180px; color: black; text-decoration: none;">Signaler un cas</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-white-pill" style="min-width: 180px; color: black; text-decoration: none;">Signaler un cas</a>
                    @endauth
                    
                    <a href="#" class="btn btn-outline-pill">
                        <i class="fas fa-info-circle me-2"></i> En savoir plus
                    </a>
                </div>

                <div class="mt-5 text-center">
                    <div class="mb-2"><i class="fas fa-shield-alt me-2"></i> 100% confidentiel et anonyme</div>
                </div>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="hero-footer text-center">
            <div class="container">
                <span class="hero-footer-item"><i class="fas fa-lock"></i> Données protégées</span>
                <span class="hero-footer-item"><i class="fas fa-headset"></i> Support 24/7</span>
                <span class="hero-footer-item"><i class="fas fa-user-friends"></i> Accompagnement expert</span>
            </div>
        </div>

    </div>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <h2 class="stats-title">Notre impact en chiffres</h2>
            <p class="stats-subtitle">
                Depuis notre création, nous avons accompagné des centaines de victimes vers un avenir plus sûr et serein.
            </p>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="stat-card-custom">
                        <div class="stat-number-custom">1,250+</div>
                        <div class="stat-label-custom">Victimes accompagnées</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card-custom">
                        <div class="stat-number-custom">96%</div>
                        <div class="stat-label-custom">Taux de résolution</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card-custom">
                        <div class="stat-number-custom">24/7</div>
                        <div class="stat-label-custom">Support disponible</div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Status Pill -->
            <div class="status-pill">
                <div class="d-flex align-items-center">
                    <span class="status-dot"></span>
                    <strong>Système opérationnel</strong>
                </div>
                <div class="status-divider"></div>
                <div>
                    Dernière mise à jour : <strong>Aujourd'hui, 09:30</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">NOS SERVICES</span>
                <h2 class="stats-title mt-3">Un accompagnement complet</h2>
                <p class="stats-subtitle">Nous offrons une gamme de services pour soutenir les victimes et prévenir le harcèlement sous toutes ses formes.</p>
            </div>

            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-pink">
                        <div class="service-icon-wrapper icon-pink">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h4 class="service-title">Signalement Sécurisé</h4>
                        <p class="service-text">Signalez des incidents en toute sécurité et confidentialité via notre plateforme chiffrée.</p>
                        <a href="#" class="service-link">Commencer <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-green">
                        <div class="service-icon-wrapper icon-green">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h4 class="service-title">Soutien Psychologique</h4>
                        <p class="service-text">Accédez à un réseau de professionnels de santé mentale pour un accompagnement personnalisé.</p>
                        <a href="#" class="service-link">Trouver de l'aide <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-blue">
                        <div class="service-icon-wrapper icon-blue">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <h4 class="service-title">Aide Juridique</h4>
                        <p class="service-text">Recevez des conseils juridiques gratuits et une orientation vers les instances compétentes.</p>
                        <a href="#" class="service-link">Consulter un expert <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card service-card-yellow">
                        <div class="service-icon-wrapper icon-yellow">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h4 class="service-title">Ressources Éducatives</h4>
                        <p class="service-text">Accédez à notre bibliothèque de guides, articles et formations sur la prévention.</p>
                        <a href="#" class="service-link">Explorer <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Help Banner -->
    <section class="container">
        <div class="help-banner">
            <h2 class="help-title">Besoin d'une aide immédiate ?</h2>
            <p class="help-text">Si vous êtes en danger immédiat ou avez besoin d'une assistance urgente, n'hésitez pas à nous contacter. Nous sommes là pour vous.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="#" class="btn btn-light rounded-pill px-4 py-3 fw-bold text-teal"><i class="fas fa-phone-alt me-2"></i> Appeler le 117</a>
                <a href="#" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold"><i class="fas fa-phone-alt me-2"></i> Appeler le 118</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label" style="background-color: #e3f2fd; color: #0984e3;">TÉMOIGNAGES</span>
                <h2 class="stats-title mt-3">Ils nous font confiance</h2>
                <p class="stats-subtitle">Découvrez comment BeBePe a aidé des personnes à retrouver la paix et la sécurité.</p>
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
                    <span class="section-label" style="background-color: #fff8e1; color: #f1c40f;">INFORMER & PRÉVENIR</span>
                    <h2 class="stats-title mt-3 mb-0">Ressources Essentielles</h2>
                </div>
                <a href="{{ route('resources.index') }}" class="btn btn-outline-custom" style="color: var(--primary-dark); border-color: #ddd;">
                    Voir toutes les ressources <i class="fas fa-arrow-right ms-2"></i>
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
                                <a href="{{ asset('storage/' . $featuredResource->document_path) }}" target="_blank" class="btn btn-teal align-self-start">Lire le guide</a>
                            @elseif($featuredResource->video_path)
                                 <a href="{{ asset('storage/' . $featuredResource->video_path) }}" target="_blank" class="btn btn-teal align-self-start">Voir la vidéo</a>
                            @else
                                <a href="#" class="btn btn-teal align-self-start">Consulter</a>
                            @endif
                        </div>
                    </div>
                    @else
                        <div class="text-center py-5 bg-light rounded">
                            <i class="fas fa-book-reader fa-3x text-muted mb-3 opacity-25"></i>
                            <h5 class="text-muted">Aucune ressource à la une pour le moment.</h5>
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
                            <p class="text-muted mb-0">Plus de ressources bientôt disponibles.</p>
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
                    Un engagement <em>collectif</em>
                </h2>
                <p class="community-text">
                    Rejoignez une communauté bienveillante qui œuvre chaque jour pour un environnement sans violence. Ensemble, faisons la différence.
                </p>
                
                <div class="community-features">
                    <div class="community-feature-item"><i class="fas fa-check text-accent"></i> Respect mutuel</div>
                    <div class="community-feature-item"><i class="fas fa-check text-accent"></i> Solidarité</div>
                    <div class="community-feature-item"><i class="fas fa-check text-accent"></i> Action concrète</div>
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
                                <h3 class="cc-title">Suivi Expert</h3>
                                <p class="cc-text">
                                    Nos spécialistes analysent chaque signalement avec soin et vous apportent une réponse adaptée et personnalisée.
                    
                                </p>
                            </div>
                        </div>

                        <!-- Card 2: Anonymat Garanti -->
                        <div class="col-md-6 col-lg-5">
                            <div class="community-card card-green">
                                <div class="cc-icon-wrapper text-success">
                                    <i class="fas fa-mask"></i>
                                </div>
                                <h3 class="cc-title">Anonymat Total</h3>
                                <p class="cc-text">
                                    Votre identité est protégée. Vous pouvez signaler et échanger en toute sécurité sans craindre d'être exposé.
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
                    <span class="section-label" style="background-color: #fff8e1; color: #f1c40f;">CONTACTEZ-NOUS</span>
                    <h2 class="stats-title mt-3">Besoin d'échanger ?</h2>
                    <p class="stats-subtitle text-start ms-0 mb-4">
                        Notre équipe est à votre écoute pour toute question, suggestion ou besoin d'accompagnement spécifique.
                    </p>
                    
                    <div class="contact-info-list mt-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">Notre Siège</h6>
                                <p class="text-muted mb-0">Lomé, Togo</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">Email</h6>
                                <p class="text-muted mb-0">v.adrakou@gmail.com</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="contact-info-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">Téléphone</h6>
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
                                    <label class="form-label fw-bold small text-muted">NOM COMPLET</label>
                                    <input type="text" name="name" class="form-control form-control-custom @error('name') is-invalid @enderror" placeholder="Votre nom" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-muted">ADRESSE EMAIL</label>
                                    <input type="email" name="email" class="form-control form-control-custom @error('email') is-invalid @enderror" placeholder="email@exemple.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-muted">OBJET</label>
                                    <input type="text" name="subject" class="form-control form-control-custom @error('subject') is-invalid @enderror" placeholder="Sujet de votre message" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-muted">MESSAGE</label>
                                    <textarea name="message" class="form-control form-control-custom @error('message') is-invalid @enderror" rows="5" placeholder="Comment pouvons-nous vous aider ?" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <button type="submit" class="btn btn-teal rounded-pill px-5 py-3 fw-bold w-100">
                                        Envoyer le message <i class="fas fa-paper-plane ms-2"></i>
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
                        La première plateforme digitale dédiée à la lutte contre le harcèlement au Togo. Brisons le silence ensemble.
                    </p>
                    <div class="d-flex">
                        <a href="#" class="footer-social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-bold mb-3">Navigation</h6>
                    <a href="{{ route('home') }}" class="footer-link">Accueil</a>
                    @auth
                        <a href="{{ route('report') }}" class="footer-link">Signalement</a>
                    @else
                        <a href="{{ route('login') }}" class="footer-link">Signalement</a>
                    @endauth
                    <a href="{{ route('resources.index') }}" class="footer-link">Ressources</a>
                    <a href="{{ route('login') }}" class="footer-link">Administration</a>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-bold mb-3">Légal</h6>
                    <a href="#" class="footer-link">Mentions légales</a>
                    <a href="{{ route('privacy') }}" class="footer-link">Confidentialité</a>
                    <a href="{{ route('cgu') }}" class="footer-link">CGU</a>
                </div>
                <!-- Removed Admin Column as per request (redundant/secure) or kept minimal -->
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">Contactez-nous</h6>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Lomé, Togo</p>
                    <p class="mb-2"><i class="fas fa-envelope me-2 text-primary"></i> v.adrakou@gmail.com</p>
                    <p class="mb-0"><i class="fas fa-phone me-2 text-primary"></i> +228 91178479</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                © 2025 BeBePe. Tous droits réservés.
            </div>
        </div>
    </footer>

@endsection
