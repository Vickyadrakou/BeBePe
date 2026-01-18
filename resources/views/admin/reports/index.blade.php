@extends('layouts.admin')

@section('title', 'Gestion des Signalements - Admin')
@section('page-title', 'Tous les Signalements')

@section('content')
<div class="card border-0 shadow-sm">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-secondary">Liste des signalements</h6>
        <form action="{{ route('admin.reports.index') }}" method="GET" class="d-flex align-items-center">
            <select name="status" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                <option value="">Tous les statuts</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>En cours</option>
                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Résolu</option>
            </select>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 border-0 rounded-start">ID</th>
                        <th class="border-0">Type</th>
                        <th class="border-0">Rapporteur</th>
                        <th class="border-0">Date</th>
                        <th class="border-0">Statut</th>
                        <th class="border-0 text-end pe-4 rounded-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                    <tr>
                        <td class="ps-4 fw-medium text-muted">#{{ str_pad($report->id, 5, '0', STR_PAD_LEFT) }}</td>
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
                                <span class="fw-medium">{{ Str::limit($report->type, 30) }}</span>
                            </div>
                        </td>
                        <td>
                            @if($report->user)
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                                        {{ substr($report->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="small fw-bold">{{ $report->user->name }}</div>
                                        <div class="small text-muted" style="font-size: 0.75rem;">{{ $report->user->email }}</div>
                                    </div>
                                </div>
                            @else
                                <span class="text-muted fst-italic">Utilisateur supprimé</span>
                            @endif
                        </td>
                        <td class="text-muted small">{{ $report->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($report->status == 'pending')
                                <span class="badge bg-warning text-dark rounded-pill px-3">En attente</span>
                            @elseif($report->status == 'processing')
                                <span class="badge bg-info text-dark rounded-pill px-3">En cours</span>
                            @else
                                <span class="badge bg-success rounded-pill px-3">Résolu</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                    <li><a class="dropdown-item" href="{{ route('admin.reports.show', $report->id) }}"><i class="fas fa-eye me-2 text-primary"></i> Voir détails</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><h6 class="dropdown-header">Changer statut</h6></li>
                                    <li>
                                        <form action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="processing">
                                            <button class="dropdown-item" type="submit"><i class="fas fa-spinner me-2 text-info"></i> En cours</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="resolved">
                                            <button class="dropdown-item" type="submit"><i class="fas fa-check me-2 text-success"></i> Résolu</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-folder-open fa-2x mb-3 opacity-25"></i>
                                <p class="mb-0">Aucun signalement trouvé.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $reports->links() }}
    </div>
</div>
@endsection
