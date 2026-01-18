@extends('layouts.admin')

@section('title', 'Gestion des Ressources - Admin')
@section('page-title', 'Ressources Educatives')

@section('content')
<div class="card border-0 shadow-sm">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-secondary">Liste des ressources</h6>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.resources.create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                <i class="fas fa-plus me-1"></i> Nouveau
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 border-0 rounded-start">Titre</th>
                        <th class="border-0">Catégorie</th>
                        <th class="border-0">Support</th>
                        <th class="border-0">A la une</th>
                        <th class="border-0">Date d'ajout</th>
                        <th class="border-0 text-end pe-4 rounded-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($resources as $resource)
                    <tr>
                        <td class="ps-4 fw-medium text-dark">{{ Str::limit($resource->title, 40) }}</td>
                        <td>
                            <span class="badge bg-light text-secondary border">{{ $resource->category ?? 'Général' }}</span>
                        </td>
                        <td>
                            @if($resource->video_path)
                                <i class="fas fa-video text-danger" title="Vidéo"></i>
                            @elseif($resource->image_path)
                                <i class="fas fa-image text-primary" title="Image"></i>
                            @elseif($resource->document_path)
                                <i class="fas fa-file-pdf text-warning" title="Document"></i>
                            @else
                                <i class="fas fa-align-left text-muted" title="Texte"></i>
                            @endif
                        </td>
                        <td>
                            @if($resource->is_featured)
                                <span class="badge bg-success small"><i class="fas fa-star"></i> Oui</span>
                            @else
                                <span class="text-muted small">Non</span>
                            @endif
                        </td>
                        <td class="text-muted small">{{ $resource->created_at->format('d/m/Y') }}</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.resources.edit', $resource->id) }}" class="btn btn-sm btn-outline-secondary" title="Modifier"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.resources.destroy', $resource->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ? Cette action est irréversible.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-book-open fa-2x mb-3 opacity-25"></i>
                                <p class="mb-0">Aucune ressource disponible.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $resources->links() }}
    </div>
</div>
@endsection
