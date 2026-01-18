@extends('layouts.app')

@section('title', 'Ressources Éducatives - BeBePe')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-custom" style="background-color: #2d5a52;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-shield-alt fa-lg text-primary me-2" style="color: #4db6ac !important;"></i>
                    <div>
                        BeBePe
                        <span>Plateforme de signalement et de lutte contre le harcèlement</span>
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#services">À propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="d-none d-lg-block">
                    <a href="{{ route('register') }}" class="btn btn-outline-custom">
                        <i class="fas fa-check-shield me-2"></i> Signaler un cas
                    </a>
                </div>
            </div>
        </nav>
<div class="py-5 bg-light">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-5" style="margin-top: 100px;">
            <span class="badge-custom badge-purple mb-2">Centre de Ressources</span>
            <h1 class="display-5 fw-bold text-dark mb-3">Informez-vous et protégez-vous</h1>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                Accédez à notre bibliothèque complète de guides, articles et vidéos pour comprendre et lutter contre le harcèlement sous toutes ses formes.
            </p>
        </div>

        <!-- Resources Grid -->
        <div class="row g-4">
            @forelse($resources as $resource)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="position-relative">
                        <!-- Image -->
                        <div style="height: 200px; background: url('{{ $resource->image_path ? asset('storage/' . $resource->image_path) : 'https://placehold.co/600x400/1abc9c/white?text=Ressource' }}') no-repeat center center; background-size: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;"></div>
                        <!-- Badge -->
                        <div class="position-absolute top-0 start-0 m-3">
                            @php
                                $badgeClass = 'badge-green';
                                if($resource->category == 'Éducation' || $resource->category == 'Harcèlement Scolaire') $badgeClass = 'badge-yellow';
                                elseif($resource->category == 'Guide Juridique') $badgeClass = 'badge-orange';
                                elseif($resource->category == 'Cyberharcèlement') $badgeClass = 'badge-purple';
                            @endphp
                            <span class="badge-custom {{ $badgeClass }}">{{ $resource->category }}</span>
                        </div>
                    </div>
                    
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="card-title fw-bold mb-3">{{ $resource->title }}</h5>
                        <p class="card-text text-muted small mb-4 flex-grow-1">
                            {{ Str::limit($resource->summary, 120) }}
                        </p>
                        
                        <div class="mt-auto d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="text-muted small">
                                <i class="far fa-calendar-alt me-1"></i> {{ $resource->created_at->format('d M Y') }}
                            </span>
                            
                            @if($resource->document_path)
                                <a href="{{ asset('storage/' . $resource->document_path) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill">
                                    <i class="fas fa-eye me-1"></i> Voir la ressource
                                </a>
                            @elseif($resource->video_path)
                                <a href="{{ asset('storage/' . $resource->video_path) }}" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fas fa-play me-1"></i> Voir la vidéo
                                </a>
                            @else
                                <button class="btn btn-sm btn-light rounded-pill text-muted" disabled>Lecture seule</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-white p-5 rounded-3 shadow-sm d-inline-block">
                    <i class="fas fa-search fa-3x text-muted mb-3 opacity-25"></i>
                    <h5 class="text-muted mb-0">Aucune ressource disponible pour le moment.</h5>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $resources->links() }}
        </div>
    </div>
</div>
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
                    <a href="#" class="footer-link">Confidentialité</a>
                    <a href="#" class="footer-link">CGU</a>
                </div>
                <!-- Removed Admin Column as per request (redundant/secure) or kept minimal -->
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">Contactez-nous</h6>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Lomé, Togo</p>
                    <p class="mb-2"><i class="fas fa-envelope me-2 text-primary"></i> contact@bebepe08.tg</p>
                    <p class="mb-0"><i class="fas fa-phone me-2 text-primary"></i> +228 00 00 00 00</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                © 2025 BeBePe Togo. Tous droits réservés.
            </div>
        </div>
    </footer>
@endsection
