@extends('layouts.admin')

@section('title', 'Nouvelle Ressource - Admin')
@section('page-title', 'Ajouter une Ressource')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-secondary">Créer une nouvelle ressource</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.resources.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row g-4">
                        <!-- Main Info -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Titre de la ressource <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="Ex: Comment se protéger du cyberharcèlement">
                                @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold">Catégorie <span class="text-danger">*</span></label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="" selected disabled>Choisir une catégorie...</option>
                                    <option value="Cyberharcèlement">Cyberharcèlement</option>
                                    <option value="Harcèlement Scolaire">Harcèlement Scolaire</option>
                                    <option value="Harcèlement Sexuel">Harcèlement Sexuel</option>
                                    <option value="Guide Juridique">Guide Juridique</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                @error('category') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="summary" class="form-label fw-bold">Résumé court</label>
                                <textarea class="form-control" id="summary" name="summary" rows="2" placeholder="Un bref aperçu du contenu...">{{ old('summary') }}</textarea>
                                @error('summary') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label fw-bold">Contenu détaillé <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="content" name="content" rows="10" required placeholder="Le contenu principal de la ressource...">{{ old('content') }}</textarea>
                                @error('content') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Sidebar / Options -->
                        <div class="col-md-4">
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-3">Options de publication</h6>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">Mettre à la une</label>
                                    </div>
                                    <div class="form-text small mt-2">Les ressources à la une apparaissent en premier sur la page d'accueil.</div>
                                </div>
                            </div>

                            <div class="card bg-light border-0 mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-3">Fichiers joints</h6>
                                    
                                    <div class="mb-3">
                                        <label for="image_path" class="form-label small fw-bold">Image de couverture</label>
                                        <input type="file" class="form-control form-control-sm" id="image_path" name="image_path" accept="image/*">
                                        @error('image_path') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="document_path" class="form-label small fw-bold">Document (PDF/Doc)</label>
                                        <input type="file" class="form-control form-control-sm" id="document_path" name="document_path" accept=".pdf,.doc,.docx">
                                        @error('document_path') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="video_path" class="form-label small fw-bold">Vidéo (MP4)</label>
                                        <input type="file" class="form-control form-control-sm" id="video_path" name="video_path" accept="video/mp4,video/x-m4v,video/*">
                                        @error('video_path') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                        <a href="{{ route('admin.resources.index') }}" class="btn btn-light border me-2">Annuler</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
