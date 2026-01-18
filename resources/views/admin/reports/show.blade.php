@extends('layouts.admin')

@section('title', 'Détails du Signalement - Admin')
@section('page-title', 'Détails du Signalement')

@section('content')
<div class="container-fluid">
    <div class="row g-4">
        <!-- Main Stats & Info -->
        <div class="col-lg-8">
            <!-- Header Card -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="mb-2">
                                @if($report->status == 'pending')
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">En attente</span>
                                @elseif($report->status == 'processing')
                                    <span class="badge bg-info text-dark px-3 py-2 rounded-pill">En cours de traitement</span>
                                @else
                                    <span class="badge bg-success px-3 py-2 rounded-pill">Résolu</span>
                                @endif
                                <span class="text-muted ms-2 small"><i class="far fa-clock me-1"></i> Soumis le {{ $report->created_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            <h3 class="fw-bold text-dark mb-1">{{ $report->type }}</h3>
                            <p class="text-muted mb-0">Signalé par: <strong>{{ $report->user ? $report->user->name : 'Utilisateur supprimé' }}</strong></p>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="dropdown">
                            <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-cog me-2"></i> Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><h6 class="dropdown-header">Changer le statut</h6></li>
                                <li>
                                    <form action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="processing">
                                        <button class="dropdown-item" type="submit"><i class="fas fa-spinner me-2 text-info"></i> Marquer en cours</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="resolved">
                                        <button class="dropdown-item" type="submit"><i class="fas fa-check me-2 text-success"></i> Marquer résolu</button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i> Supprimer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="fw-bold mb-0"><i class="fas fa-align-left me-2 text-primary"></i> Description des faits</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="p-4 bg-light rounded-3 text-secondary" style="font-size: 1.05rem; line-height: 1.7;">
                        {{ $report->description }}
                    </div>
                </div>
            </div>

            <!-- Evidence / Files Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="fw-bold mb-0"><i class="fas fa-paperclip me-2 text-primary"></i> Preuves jointes</h5>
                </div>
                <div class="card-body pt-0">
                    @if(!$report->image_path && !$report->video_path && !$report->document_path)
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3 opacity-25"></i>
                            <p>Aucune preuve jointe à ce signalement.</p>
                        </div>
                    @else
                        <div class="row g-3">
                            @if($report->image_path)
                            <div class="col-md-4">
                                <div class="border rounded p-3 text-center h-100">
                                    <i class="fas fa-image fa-3x text-primary mb-3 opacity-50"></i>
                                    <h6 class="fw-bold mb-3">Image</h6>
                                    <a href="{{ asset('storage/' . $report->image_path) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100">
                                        <i class="fas fa-eye me-1"></i> Voir
                                    </a>
                                </div>
                            </div>
                            @endif

                            @if($report->video_path)
                            <div class="col-md-4">
                                <div class="border rounded p-3 text-center h-100">
                                    <i class="fas fa-video fa-3x text-danger mb-3 opacity-50"></i>
                                    <h6 class="fw-bold mb-3">Vidéo</h6>
                                    <a href="{{ asset('storage/' . $report->video_path) }}" target="_blank" class="btn btn-sm btn-outline-danger w-100">
                                        <i class="fas fa-play me-1"></i> Lire
                                    </a>
                                </div>
                            </div>
                            @endif

                            @if($report->document_path)
                            <div class="col-md-4">
                                <div class="border rounded p-3 text-center h-100">
                                    <i class="fas fa-file-alt fa-3x text-warning mb-3 opacity-50"></i>
                                    <h6 class="fw-bold mb-3">Document</h6>
                                    <a href="{{ asset('storage/' . $report->document_path) }}" target="_blank" class="btn btn-sm btn-outline-warning w-100 text-dark">
                                        <i class="fas fa-download me-1"></i> Télécharger
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="col-lg-4">
            <!-- User Info -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">Informations Rapporteur</h5>
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                            {{ $report->user ? substr($report->user->name, 0, 1) : '?' }}
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">{{ $report->user ? $report->user->name : 'Utilisateur Supprimé' }}</h6>
                            <small class="text-muted">{{ $report->user ? $report->user->email : '' }}</small>
                        </div>
                    </div>
                    
                    @if($report->is_anonymous)
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="fas fa-user-secret fa-lg me-3"></i>
                        <div>
                            <strong>Mode Anonyme</strong>
                            <div class="small">L'utilisateur a demandé à rester anonyme.</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Details Attributes -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">Détails contextuels</h5>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 border-0 d-flex justify-content-between mb-2">
                            <span class="text-muted"><i class="fas fa-history complex-icon me-2"></i> Fréquence</span>
                            <span class="fw-medium">{{ $report->frequency ?? 'Non spécifié' }}</span>
                        </li>
                        <li class="list-group-item px-0 border-0 d-flex justify-content-between mb-2">
                            <span class="text-muted"><i class="fas fa-map-marker-alt complex-icon me-2"></i> Localisation</span>
                            <span class="fw-medium text-end" style="max-width: 60%;">{{ $report->location ?? 'Non spécifié' }}</span>
                        </li>
                         <li class="list-group-item px-0 border-0 d-flex justify-content-between">
                            <span class="text-muted"><i class="fas fa-fingerprint complex-icon me-2"></i> ID Signalement</span>
                            <span class="fw-medium text-secondary">#{{ str_pad($report->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-muted small">
                    <i class="fas fa-arrow-left me-1"></i> Retour au tableau de bord
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
