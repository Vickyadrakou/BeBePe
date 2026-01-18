@extends('layouts.app')

@section('title', 'Faire un signalement - BeBePe')

@section('content')
    <!-- Navbar (Simplified for User Space) -->
    <nav class="navbar navbar-expand-lg navbar-custom bg-white shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-shield-alt fa-lg text-primary me-2" style="color: #4db6ac !important;"></i>
                BeBePe
            </a>
            <div class="d-flex align-items-center">
                <span class="me-3 text-muted d-none d-md-block">Bienvenue, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-custom btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container pb-5" style="padding-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="report-card">
                    <h2 class="stats-title text-center mb-4">Formulaire de Signalement</h2>
                    <p class="text-center text-muted mb-5">
                        Remplissez ce formulaire pour nous informer de la situation. Vos informations sont traitées en toute confidentialité.
                    </p>

                    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Type Selection -->
                        <div class="mb-4">
                            <label class="form-label-custom">Type de harcèlement *</label>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="custom-radio-option">
                                        <input type="radio" name="type" value="Harcèlement scolaire" class="form-check-input me-2 custom-radio-input" required> 
                                        <span><i class="fas fa-school me-2 text-muted"></i> Harcèlement scolaire</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-radio-option">
                                        <input type="radio" name="type" value="Harcèlement professionnel" class="form-check-input me-2 custom-radio-input"> 
                                        <span><i class="fas fa-briefcase me-2 text-muted"></i> Harcèlement professionnel</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-radio-option">
                                        <input type="radio" name="type" value="Cyberharcèlement" class="form-check-input me-2 custom-radio-input"> 
                                        <span><i class="fas fa-laptop me-2 text-muted"></i> Cyberharcèlement</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="custom-radio-option">
                                        <input type="radio" name="type" value="Autre" class="form-check-input me-2 custom-radio-input"> 
                                        <span><i class="fas fa-exclamation-circle me-2 text-muted"></i> Autre</span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Other Type Details Input -->
                            <div id="other-type-container" class="mt-3 d-none">
                                <label class="form-label-custom small">Veuillez préciser le type de harcèlement :</label>
                                <input type="text" name="other_type" id="other-type-input" class="form-control form-control-custom" placeholder="Précisez ici...">
                            </div>

                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="form-label-custom">Description des faits *</label>
                            <textarea name="description" class="form-control form-control-custom" rows="6" placeholder="Décrivez la situation en détail : que s'est-il passé ? Quand ? Qui est impliqué ?" required></textarea>
                            <div class="text-muted small mt-1">Soyez le plus précis possible.</div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label-custom">Fréquence *</label>
                                <select name="frequency" class="form-select form-select-custom" required>
                                    <option value="" selected disabled>Choisir une fréquence</option>
                                    <option value="Une seule fois">Une seule fois</option>
                                    <option value="Plusieurs fois">Plusieurs fois</option>
                                    <option value="Quotidien">Quotidien</option>
                                    <option value="Hebdomadaire">Hebdomadaire</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">Localisation (optionnelle)</label>
                                <input type="text" name="location" class="form-control form-control-custom" placeholder="Ville, établissement, lieu...">
                            </div>
                        </div>

                        <!-- Preuves (Files) -->
                        <div class="mb-4">
                            <label class="form-label-custom mb-3"><i class="fas fa-paperclip me-2"></i> Ajouter des preuves (Optionnel)</label>
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="p-3 border rounded text-center bg-light">
                                        <i class="fas fa-image fa-2x mb-2 text-primary opacity-50"></i>
                                        <label class="form-label small d-block my-2 fw-bold">Image (JPG, PNG)</label>
                                        <input type="file" name="image_file" class="form-control form-control-sm" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded text-center bg-light">
                                        <i class="fas fa-video fa-2x mb-2 text-danger opacity-50"></i>
                                        <label class="form-label small d-block my-2 fw-bold">Vidéo (MP4, MOV)</label>
                                        <input type="file" name="video_file" class="form-control form-control-sm" accept="video/*">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded text-center bg-light">
                                        <i class="fas fa-file-alt fa-2x mb-2 text-warning opacity-50"></i>
                                        <label class="form-label small d-block my-2 fw-bold">Document (PDF)</label>
                                        <input type="file" name="document_file" class="form-control form-control-sm" accept=".pdf,.doc,.docx,.txt">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-check mb-5 p-3 rounded" style="background-color: #e0f2f1;">
                            <input class="form-check-input ms-1" type="checkbox" name="is_anonymous" id="anonCheck">
                            <label class="form-check-label fw-bold ms-2 text-teal" for="anonCheck" style="color: var(--primary-green);">
                                Je souhaite rester anonyme pour nous.
                            </label>
                            <div class="small text-muted ms-4 mt-1">Même si nous connaissons votre identité (compte), nous ne la divulguerons jamais sans votre accord explicite.</div>
                        </div>

                        <button type="submit" class="btn btn-cyan-block py-3" style="font-size: 1.1rem;">
                            <i class="fas fa-paper-plane me-2"></i> Envoyer le signalement
                        </button>
                    </form>
                </div>

                <div class="text-center mt-5">
                    <p class="text-muted small">
                        Besoin d'aide immédiate ? Appelez le <strong>117</strong> (Numéro vert gratuit).
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input[name="type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const otherContainer = document.getElementById('other-type-container');
                const otherInput = document.getElementById('other-type-input');
                
                // Remove 'selected' class from all options
                document.querySelectorAll('.custom-radio-option').forEach(opt => opt.classList.remove('selected'));
                // Add 'selected' class to current parent label
                this.closest('.custom-radio-option').classList.add('selected');

                // Toggle "Other" input
                if (this.value === 'Autre') {
                    otherContainer.classList.remove('d-none');
                    otherInput.required = true;
                } else {
                    otherContainer.classList.add('d-none');
                    otherInput.required = false;
                    otherInput.value = ''; 
                }
            });
        });
    });
</script>
@endsection
