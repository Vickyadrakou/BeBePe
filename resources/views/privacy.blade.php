@extends('layouts.app')

@section('title', 'Politique de Confidentialité - BeBePe')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section" style="min-height: 40vh;">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-shield-alt fa-lg text-primary me-2" style="color: #0000 !important;"></i>
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
                    </ul>
                </div>
            </div>
        </nav>

        <div class="hero-content container text-center py-5">
            <h1 class="hero-title" style="font-size: 2.5rem;">
                Politique de <em>Confidentialité</em>
            </h1>
            <p class="hero-subtitle">
                Votre vie privée est notre priorité absolue
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                        
                        <p class="text-muted mb-4"><strong>Dernière mise à jour :</strong> 18 janvier 2026</p>

                        <!-- Introduction -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class=></i>Introduction
                            </h2>
                            <p>
                                BeBePe (ci-après "la Plateforme") est une initiative dédiée à la lutte contre le harcèlement au Togo. 
                                Nous nous engageons à protéger la confidentialité et la sécurité des données personnelles de tous 
                                nos utilisateurs, en particulier celles des victimes qui nous font confiance pour signaler des cas de harcèlement.
                            </p>
                            <p>
                                Cette politique de confidentialité explique comment nous collectons, utilisons, stockons et protégeons 
                                vos informations personnelles conformément aux lois togolaises en vigueur sur la protection des données.
                            </p>
                        </div>

                        <!-- Données collectées -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class=></i>Données que nous collectons
                            </h2>
                            
                            <h5> Lors de l'inscription</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class=></i>Nom et prénom</li>
                                <li class="mb-2"><i class=></i>Adresse e-mail</li>
                                <li class="mb-2"><i class=></i>Mot de passe (chiffré)</li>
                            </ul>

                            <h5 class="fw-bold mt-4">2. Lors d'un signalement</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Type de harcèlement signalé</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Description de l'incident</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Date et lieu de l'incident</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Informations sur le harceleur (si fournies)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Preuves éventuelles (documents, captures d'écran)</li>
                            </ul>

                            <h5 class="fw-bold mt-4">3. Lors d'un contact</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Nom complet</li>
                                <li class="mb-2"><i class="fas fa-rounded-3 text-success me-2"></i>Adresse e-mail</li>
                                <li class="mb-2">Objet et contenu du message</li>
                            </ul>
                        </div>

                        <!-- Utilisation des données -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas fa-cogs text-primary me-2"></i>Comment nous utilisons vos données
                            </h2>
                            <p>Vos données personnelles sont utilisées exclusivement pour :</p>
                            <ul>
                                <li class="mb-2">Traiter et suivre les signalements de harcèlement</li>
                                <li class="mb-2">Vous accompagner et vous orienter vers les ressources appropriées</li>
                                <li class="mb-2">Communiquer avec vous concernant votre dossier</li>
                                <li class="mb-2">Améliorer nos services et notre plateforme</li>
                                <li class="mb-2">Établir des statistiques anonymisées sur le harcèlement au Togo</li>
                                <li class="mb-2">Répondre à vos demandes de contact</li>
                            </ul>
                            <div class="alert alert-warning border-0 rounded-3 mt-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Important :</strong> Nous ne vendons, ne louons et ne partageons jamais vos données personnelles 
                                avec des tiers à des fins commerciales.
                            </div>
                        </div>

                        <!-- Protection des données -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas fa-shield-alt text-primary me-2"></i>Protection de vos données
                            </h2>
                            <p>Nous mettons en œuvre des mesures de sécurité rigoureuses pour protéger vos informations :</p>
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas fa-lock text-primary me-2"></i>
                                        <strong>Chiffrement SSL/TLS</strong>
                                        <p class="small text-muted mb-0 mt-1">Toutes les communications sont sécurisées</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas fa-key text-primary me-2"></i>
                                        <strong>Mots de passe hachés</strong>
                                        <p class="small text-muted mb-0 mt-1">Stockage sécurisé avec algorithme bcrypt</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas fa-user-shield text-primary me-2"></i>
                                        <strong>Accès restreint</strong>
                                        <p class="small text-muted mb-0 mt-1">Seuls les administrateurs autorisés accèdent aux données</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3">
                                        <i class="fas fa-server text-primary me-2"></i>
                                        <strong>Serveurs sécurisés</strong>
                                        <p class="small text-muted mb-0 mt-1">Hébergement conforme aux normes de sécurité</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conservation des données -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas fa-clock text-primary me-2"></i>Conservation des données
                            </h2>
                            <p>Nous conservons vos données personnelles selon les durées suivantes :</p>
                            <ul>
                                <li class="mb-2"><strong>Données de compte :</strong> Jusqu'à la suppression de votre compte ou 3 ans après votre dernière activité</li>
                                <li class="mb-2"><strong>Signalements :</strong> Pendant la durée nécessaire au traitement et au suivi, puis archivage sécurisé pendant 5 ans à des fins légales</li>
                                <li class="mb-2"><strong>Messages de contact :</strong> 2 ans après la dernière communication</li>
                            </ul>
                        </div>

                        <!-- Vos droits -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas fa-user-check text-primary me-2"></i>Vos droits
                            </h2>
                            <p>Conformément à la législation en vigueur, vous disposez des droits suivants :</p>
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-eye text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>Droit d'accès</strong>
                                            <p class="small text-muted mb-0">Obtenir une copie de vos données personnelles</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-edit text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>Droit de rectification</strong>
                                            <p class="small text-muted mb-0">Corriger vos données inexactes ou incomplètes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-trash-alt text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>Droit à l'effacement</strong>
                                            <p class="small text-muted mb-0">Demander la suppression de vos données</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-ban text-primary me-3 mt-1"></i>
                                        <div>
                                            <strong>Droit d'opposition</strong>
                                            <p class="small text-muted mb-0">Vous opposer au traitement de vos données</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4">
                                Pour exercer ces droits, contactez-nous à : 
                                <a href="mailto:contact@bebepe08.tg" class="text-primary fw-bold">contact@bebepe08.tg</a>
                            </p>
                        </div>

                        <!-- Anonymat -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas fa-mask text-primary me-2"></i>Anonymat et confidentialité des signalements
                            </h2>
                            <div class="alert alert-success border-0 rounded-3">
                                <p class="mb-0">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Nous garantissons la confidentialité totale de vos signalements.</strong> 
                                    Les informations que vous partagez ne seront jamais divulguées à des tiers sans votre 
                                    consentement explicite, sauf obligation légale. L'identité des victimes est protégée 
                                    à chaque étape du processus.
                                </p>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="mb-4">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                <i class="fas fa-envelope text-primary me-2"></i>Nous contacter
                            </h2>
                            <p>Pour toute question concernant cette politique de confidentialité ou vos données personnelles :</p>
                            <div class="bg-light p-4 rounded-3">
                                <p class="mb-2"><i class="fas fa-building text-primary me-2"></i><strong>BeBePe - Plateforme de lutte contre le harcèlement</strong></p>
                                <p class="mb-2"><i class="fas fa text-primary me-2"></i>Lomé, Togo</p>
                                <p class="mb-2"><i class="fas fa-envelope text-primary me-2"></i>contact@bebepe08.tg</p>
                                <p class="mb-0"><i class="fas fa-phone text-primary me-2"></i>+228 00 00 00 00</p>
                            </div>
                        </div>

                        <!-- Modifications -->
                        <div class="border-top pt-4">
                            <p class="text-muted small mb-0">
                                <i class="fas fa-sync-alt me-2"></i>
                                Cette politique de confidentialité peut être mise à jour. Nous vous informerons de tout 
                                changement significatif par e-mail ou via une notification sur la plateforme.
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
                        <i class="fas fa-shield-alt me-2 text-primary"></i> BeBePe
                    </a>
                    <p class="mb-4">
                        La première plateforme digitale dédiée à la lutte contre le harcèlement au Togo. Brisons le silence ensemble.
                    </p>
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
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-bold mb-3">Légal</h6>
                    <a href="{{ route('privacy') }}" class="footer-link">Confidentialité</a>
                    <a href="{{ route('home') }}" class="footer-link">CGU</a>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">Contactez-nous</h6>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Lomé, Togo</p>
                    <p class="mb-2"><i class="fas fa-envelope me-2 text-primary"></i> contact@bebepe08.tg</p>
                    <p class="mb-0"><i class="fas fa-phone me-2 text-primary"></i> +228 00 00 00 00</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                © 2025 BeBePe. Tous droits réservés.
            </div>
        </div>
    </footer>
@endsection
