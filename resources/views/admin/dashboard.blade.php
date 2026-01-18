@extends('layouts.admin')

@section('title', 'Tableau de bord - Admin')
@section('page-title', 'Vue d\'ensemble')

@section('content')
    <div class="row g-4">
        <!-- Stats Card 1 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-primary p-4 text-white" style="background-color: #1abc9c !important;">
                        <i class="fas fa-file-alt fa-2x"></i>
                    </div>
                    <div class="p-3">
                        <h6 class="text-muted mb-1">Total Signalements</h6>
                        <h3 class="fw-bold mb-0">{{ $totalReports }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Card 2 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-warning p-4 text-white">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <div class="p-3">
                        <h6 class="text-muted mb-1">En attente</h6>
                        <h3 class="fw-bold mb-0">{{ $pendingReports }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Card 3 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-success p-4 text-white">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                    <div class="p-3">
                        <h6 class="text-muted mb-1">Traités</h6>
                        <h3 class="fw-bold mb-0">{{ $processedReports }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold">Derniers Signalements</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0 rounded-start">Type</th>
                                    <th class="border-0">Date</th>
                                    <th class="border-0">Statut</th>
                                    <th class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestReports as $report)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light p-2 me-2 text-primary">
                                                @if($report->type == 'Cyberharcèlement')
                                                    <i class="fas fa-laptop"></i>
                                                @elseif($report->type == 'Harcèlement scolaire')
                                                    <i class="fas fa-school"></i>
                                                @else
                                                    <i class="fas fa-exclamation-circle"></i>
                                                @endif
                                            </div>
                                            {{ Str::limit($report->type, 20) }}
                                        </div>
                                    </td>
                                    <td>{{ $report->created_at->format('d M Y') }}</td>
                                    <td>
                                        @if($report->status == 'pending')
                                            <span class="badge bg-warning text-dark">En attente</span>
                                        @elseif($report->status == 'processing')
                                            <span class="badge bg-info text-dark">En cours</span>
                                        @else
                                            <span class="badge bg-success">Résolu</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.reports.show', $report->id) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Aucun signalement pour le moment.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                 <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold">Utilisateurs Récents</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($latestUsers as $user)
                        <li class="list-group-item d-flex align-items-center px-0 border-0 mb-2">
                             <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $user->name }}</h6>
                                <small class="text-muted">Inscrit le {{ $user->created_at->format('d/m/Y') }}</small>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item border-0 text-center text-muted">Aucun utilisateur récent.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
