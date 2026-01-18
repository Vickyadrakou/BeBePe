@extends('layouts.app')

@section('title', 'Conditions Générales d\'Utilisation - BeBePe')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section" style="min-height: 40vh;">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-shield-alt fa-lg me-2" style="color: #4db6ac !important;"></i>
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
                Conditions Générales <em>d'Utilisation</em>
            </h1>
            <p class="hero-subtitle">
                Les règles d'utilisation de notre plateforme
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

                        <!-- Préambule -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Préambule
                            </h2>
                            <p>
                                Les présentes Conditions Générales d'Utilisation (ci-après "CGU") régissent l'accès et l'utilisation 
                                de la plateforme BeBePe, accessible à l'adresse v.adrakou@gmail.com. 
                            </p>
                            <p>
                                BeBePe est une plateforme dédiée à la lutte contre le harcèlement au Togo, permettant aux victimes 
                                et témoins de signaler des cas de harcèlement de manière sécurisée et confidentielle. Elle se veut être une place d'écoute et d'accompagnement.
                            </p>
                            <div class="alert alert-info border-0 rounded-3">
                                <i class="fas fa-info-circle me-2"></i>
                                En accédant à la Plateforme ou en utilisant nos services, vous acceptez d'être lié par les présentes CGU. 
                                Conditions nécessaires pour le bon fonctionnement de la Plateforme.
                            </div>
                        </div>

                        <!-- Article 1 : Définitions -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 1 : Définitions
                            </h2>
                            <ul>
                                <li class="mb-2"><strong>"Plateforme"</strong> : désigne le site web BeBePe et l'ensemble de ses services.</li>
                                <li class="mb-2"><strong>"Utilisateur"</strong> : désigne toute personne accédant à la Plateforme, qu'elle soit inscrite ou non.</li>
                                <li class="mb-2"><strong>"Membre"</strong> : désigne un Utilisateur ayant créé un compte sur la Plateforme.</li>
                                <li class="mb-2"><strong>"Signalement"</strong> : désigne le rapport déposé par un Utilisateur concernant un cas de harcèlement.</li>
                                <li class="mb-2"><strong>"Services"</strong> : désigne l'ensemble des fonctionnalités offertes par la Plateforme.</li>
                                <li class="mb-2"><strong>"Administrateur"</strong> : désigne les personnes habilitées à gérer et modérer la Plateforme.</li>
                            </ul>
                        </div>

                        <!-- Article 2 : Objet -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 2 : Objet de la Plateforme
                            </h2>
                            <p>La Plateforme BeBePe a pour objectifs :</p>
                            <ul>
                                <li class="mb-2">Permettre le signalement sécurisé de cas de harcèlement (scolaire, professionnel, en ligne, etc.)</li>
                                <li class="mb-2">Accompagner les victimes et les orienter vers des ressources appropriées</li>
                                <li class="mb-2">Sensibiliser le public sur les différentes formes de harcèlement</li>
                                <li class="mb-2">Mettre à disposition des ressources éducatives et préventives</li>
                                <li class="mb-2">Faciliter la communication entre les victimes et les professionnels compétents</li>
                            </ul>
                        </div>

                        <!-- Article 3 : Accès et inscription -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 3 : Accès et Inscription
                            </h2>
                            
                            <h5 class="fw-bold mt-4">3.1 Conditions d'accès</h5>
                            <p>
                                L'accès à la Plateforme est gratuit. Certaines fonctionnalités, notamment le dépôt de signalements, 
                                nécessitent la création d'un compte utilisateur.
                            </p>

                            <h5 class="fw-bold mt-4">3.2 Création de compte</h5>
                            <p>Pour créer un compte, l'Utilisateur s'engage à :</p>
                            <ul>
                                <li class="mb-2">Fournir des informations exactes et complètes</li>
                                <li class="mb-2">Être âgé d'au moins 13 ans (les mineurs doivent avoir l'autorisation de leurs parents, tuteurs légaux ou un adulte habileté)</li>
                                <li class="mb-2">Choisir un mot de passe sécurisé et le garder confidentiel</li>
                                <li class="mb-2">Accepter les présentes CGU et la Politique de Confidentialité</li>
                            </ul>

                            <h5 class="fw-bold mt-4">3.3 Responsabilité du compte</h5>
                            <p>
                                L'Utilisateur est seul responsable de la sécurité de son compte et de toutes les activités effectuées 
                                sous celui-ci. En cas d'utilisation non autorisée, l'Utilisateur doit nous en informer immédiatement pour des mesures à prendre.
                            </p>
                        </div>

                        <!-- Article 4 : Utilisation des services -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 4 : Utilisation des Services
                            </h2>
                            
                            <h5 class="fw-bold mt-4">4.1 Signalements</h5>
                            <p>L'Utilisateur s'engage à :</p>
                            <ul>
                                <li class="mb-2">Fournir des informations exactes et véridiques dans ses signalements</li>
                                <li class="mb-2">Ne pas effectuer de faux signalements ou de signalements malveillants</li>
                                <li class="mb-2">Respecter la dignité des personnes mentionnées dans les signalements</li>
                            </ul>

                            <div class="alert alert-warning border-0 rounded-3 mt-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Attention :</strong> Les faux signalements constituent un délit passible de poursuites 
                                judiciaires conformément à la législation togolaise en vigueur.
                            </div>

                            <h5 class="fw-bold mt-4">4.2 Ressources éducatives</h5>
                            <p>
                                Les ressources mises à disposition sur la Plateforme sont fournies à titre informatif. 
                                Elles ne se substituent pas aux conseils de professionnels qualifiés (psychologues, avocats, etc.).
                            </p>
                        </div>

                        <!-- Article 5 : Comportements interdits -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 5 : Comportements Interdits
                            </h2>
                            <p>Il est strictement interdit de :</p>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <i class="fas fa-times-circle text-danger me-2"></i>
                                        Publier des contenus diffamatoires, injurieux ou discriminatoires
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <i class="fas fa-times-circle text-danger me-2"></i>
                                        Usurper l'identité d'une autre personne
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <i class="fas fa-times-circle text-danger me-2"></i>
                                        Tenter de pirater ou perturber le fonctionnement de la Plateforme
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <i class="fas fa-times-circle text-danger me-2"></i>
                                        Collecter des informations sur les autres utilisateurs sans autorisation
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <i class="fas fa-times-circle text-danger me-2"></i>
                                        Utiliser la Plateforme à des fins commerciales non autorisées
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <i class="fas fa-times-circle text-danger me-2"></i>
                                        Effectuer des signalements abusifs ou répétitifs
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Article 6 : Propriété intellectuelle -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 6 : Propriété Intellectuelle
                            </h2>
                            <p>
                                L'ensemble des éléments de la Plateforme (textes, graphismes, logos, icônes, images, logiciels, base de données) 
                                sont la propriété exclusive de BeBePe ou de ses partenaires et sont protégés par les lois relatives à la 
                                propriété intellectuelle.
                            </p>
                            <p>
                                Toute reproduction, représentation, modification ou exploitation non autorisée de tout ou partie de ces 
                                éléments est strictement interdite.
                            </p>
                        </div>

                        <!-- Article 7 : Responsabilités -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 7 : Limitation de Responsabilité
                            </h2>
                            
                            <h5 class="fw-bold mt-4">7.1 Disponibilité du service</h5>
                            <p>
                                BeBePe s'efforce d'assurer la disponibilité de la Plateforme 24h/24 et 7j/7. Toutefois, nous ne pouvons 
                                garantir une disponibilité permanente en raison de maintenances, mises à jour ou problèmes techniques.
                            </p>

                            <h5 class="fw-bold mt-4">7.2 Contenu des signalements</h5>
                            <p>
                                BeBePe ne peut être tenue responsable du contenu des signalements déposés par les utilisateurs. 
                                Chaque utilisateur est seul responsable de l'exactitude des informations qu'il fournit.
                            </p>

                            <h5 class="fw-bold mt-4">7.3 Limites d'intervention</h5>
                            <p>
                                BeBePe n'est pas un service d'urgence. En cas de danger immédiat, contactez les autorités compétentes 
                                (Police : 117, Gendarmerie, ou les services d'urgence).
                            </p>
                        </div>

                        <!-- Article 8 : Modération -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 8 : Modération et Sanctions
                            </h2>
                            <p>
                                L'équipe BeBePe se réserve le droit de :
                            </p>
                            <ul>
                                <li class="mb-2">Supprimer tout contenu contraire aux présentes CGU</li>
                                <li class="mb-2">Suspendre ou supprimer tout compte en cas de violation des règles</li>
                                <li class="mb-2">Signaler aux autorités compétentes tout comportement illégal</li>
                                <li class="mb-2">Bloquer l'accès à la Plateforme à tout utilisateur malveillant</li>
                            </ul>
                        </div>

                        <!-- Article 9 : Protection des mineurs -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 9 : Protection des Mineurs
                            </h2>
                            <div class="alert alert-success border-0 rounded-3">
                                <i class="fas fa-child me-2"></i>
                                <strong>La protection des mineurs est une priorité absolue.</strong>
                            </div>
                            <p>
                                Les signalements impliquant des mineurs font l'objet d'un traitement prioritaire et peuvent être 
                                transmis aux autorités compétentes (services de protection de l'enfance, justice) conformément 
                                à la législation en vigueur.
                            </p>
                            <p>
                                Les mineurs utilisant la Plateforme doivent avoir obtenu l'accord préalable de leurs parents, 
                                représentants légaux ou un adulte habileté.
                            </p>
                        </div>

                        <!-- Article 10 : Données personnelles -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 10 : Données Personnelles
                            </h2>
                            <p>
                                Le traitement des données personnelles est régi par notre 
                                <a href="{{ route('privacy') }}" class="fw-bold" style="color: #1abc9c;">Politique de Confidentialité</a>, 
                                qui fait partie intégrante des présentes CGU.
                            </p>
                            <p>
                                En utilisant la Plateforme, vous consentez à la collecte et au traitement de vos données 
                                conformément à cette politique.
                            </p>
                        </div>

                        <!-- Article 11 : Modifications -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 11 : Modification des CGU
                            </h2>
                            <p>
                                BeBePe se réserve le droit de modifier les présentes CGU à tout moment. Les utilisateurs seront 
                                informés des modifications importantes par e-mail ou notification sur la Plateforme.
                            </p>
                            <p>
                                La continuation de l'utilisation de la Plateforme après modification des CGU vaut acceptation 
                                des nouvelles conditions.
                            </p>
                        </div>

                        <!-- Article 12 : Droit applicable -->
                        <div class="mb-5">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 12 : Droit Applicable et Juridiction
                            </h2>
                            <p>
                                Les présentes CGU sont régies par le droit togolais. En cas de litige, et après tentative de 
                                résolution amiable, les tribunaux compétents de Lomé seront seuls habilités à connaître du différend.
                            </p>
                        </div>

                        <!-- Contact -->
                        <div class="mb-4">
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Article 13 : Contact
                            </h2>
                            <p>Pour toute question concernant les présentes CGU :</p>
                            <div class="bg-light p-4 rounded-3">
                                <p class="mb-2"><i class="fas fa-building me-2" style="color: #1abc9c;"></i><strong>BeBePe - Plateforme de lutte contre le harcèlement</strong></p>
                                <p class="mb-2"><i class="fas fa-map-marker-alt me-2" style="color: #1abc9c;"></i>Lomé, Togo</p>
                                <p class="mb-2"><i class="fas fa-envelope me-2" style="color: #1abc9c;"></i>v.adrakou@gmail.com</p>
                                <p class="mb-0"><i class="fas fa-phone me-2" style="color: #1abc9c;"></i>+228 91178479</p>
                            </div>
                        </div>

                        <!-- Acceptation -->
                        <div class="border-top pt-4">
                            <div class="alert alert-light border rounded-3 mb-0">
                                <p class="mb-0 text-center">
                                    <i class="fas fa-check-circle me-2" style="color: #1abc9c;"></i>
                                    En utilisant BeBePe, vous reconnaissez avoir lu, compris et accepté les présentes 
                                    Conditions Générales d'Utilisation.
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
                    <a href="{{ route('cgu') }}" class="footer-link">CGU</a>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">Contactez-nous</h6>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2" style="color: #1abc9c;"></i> Lomé, Togo</p>
                    <p class="mb-2"><i class="fas fa-envelope me-2" style="color: #1abc9c;"></i> contact@bebepe08.tg</p>
                    <p class="mb-0"><i class="fas fa-phone me-2" style="color: #1abc9c;"></i> +228 00 00 00 00</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-5 pt-4 text-center text-muted small">
                © 2025 BeBePe. Tous droits réservés.
            </div>
        </div>
    </footer>
@endsection
