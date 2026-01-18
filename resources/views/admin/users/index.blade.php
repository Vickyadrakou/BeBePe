@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs - Admin')
@section('page-title', 'Tous les Utilisateurs')

@section('content')
<div class="card border-0 shadow-sm">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-secondary">Liste des utilisateurs</h6>
        <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex align-items-center gap-2">
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-light border-end-0"><i class="fas fa-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="ID, Nom ou Email" value="{{ request('search') }}">
            </div>
            <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}" title="Filtrer par date d'inscription">
            <button type="submit" class="btn btn-sm btn-primary">Filtrer</button>
            @if(request('search') || request('date'))
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light border" title="Réinitialiser"><i class="fas fa-times"></i></a>
            @endif
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 border-0 rounded-start">ID</th>
                        <th class="border-0">Utilisateur</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Rôle</th>
                        <th class="border-0">Date d'inscription</th>
                        <th class="border-0 text-end pe-4 rounded-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td class="ps-4 fw-medium text-muted">#{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="fw-bold text-dark">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge bg-primary rounded-pill px-3">Administrateur</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-3">Utilisateur</span>
                            @endif
                        </td>
                        <td class="text-muted small">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-end pe-4">
                            <!-- Actions -->
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary" title="Modifier"><i class="fas fa-edit"></i></a>
                            
                            @if($user->id !== Auth::id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled title="Vous ne pouvez pas vous supprimer"><i class="fas fa-ban"></i></button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-users-slash fa-2x mb-3 opacity-25"></i>
                                <p class="mb-0">Aucun utilisateur trouvé.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $users->links() }}
    </div>
</div>
@endsection
