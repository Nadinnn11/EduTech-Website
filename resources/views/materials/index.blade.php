@extends('layouts.app')

@section('content')
<div class="container mt-5">
  
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Daftar Materi</h1>
            <small class="text-muted">Kelola materi untuk semua kursus</small>
        </div>
        @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('admin.materials.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-2"></i>Tambah Materi Baru
        </a>
        @endif
    </div>

   
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

   
    @foreach($materials as $courseTitle => $courseMaterials)
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-book-half"></i> {{ $courseTitle }}
                <span class="badge bg-light text-dark ms-2">{{ $courseMaterials->count() }} materi</span>
            </h5>
        </div>
        <div class="card-body">
            @if($courseMaterials->count() > 0)
            <div class="row g-3">
                @foreach($courseMaterials as $material)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="card-title fw-bold mb-0">{{ $material->title }}</h6>
                                <span class="badge bg-secondary fs-6">#{{ $material->order_number ?? $loop->iteration }}</span>
                            </div>
                            <p class="card-text text-muted small mb-3" style="height: 40px; overflow: hidden;">
                                {{ Str::limit($material->content ?? $material->description ?? '', 80) }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 p-3 pt-0">
                            <div class="btn-group w-100" role="group">
                                {{-- View --}}
                                <a href="{{ route('materials.show', $material->id) }}" 
                                   class="btn btn-outline-primary btn-sm flex-fill" 
                                   title="Lihat Materi">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                                
                                {{-- Admin Edit --}}
                                @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.materials.edit', $material->id) }}" 
                                   class="btn btn-outline-warning btn-sm flex-fill" 
                                   title="Edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                {{-- Delete --}}
                                <form action="{{ route('admin.materials.destroy', $material->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm flex-fill" 
                                            onclick="return confirm('Yakin hapus?')" title="Hapus">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-4 bg-light rounded">
                <i class="bi bi-book fa-2x text-muted mb-2"></i>
                <p class="text-muted mb-0">Belum ada materi untuk {{ $courseTitle }}</p>
            </div>
            @endif
        </div>
    </div>
    @endforeach

    
    @if($materials->flatten()->isEmpty())
    <div class="text-center py-5 bg-light rounded-3 border">
        <i class="bi bi-journals fa-3x text-muted mb-4"></i>
        <h3 class="fw-bold text-muted mb-3">Belum ada materi</h3>
        <p class="lead text-muted mb-4">Mulai tambahkan materi untuk kursus Anda</p>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.materials.create') }}" class="btn btn-primary btn-lg px-5">
            <i class="bi bi-plus-circle-fill me-2"></i>Buat Materi Pertama
        </a>
        @endif
    </div>
    @endif
</div>

<style>
.hover-shadow:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.15) !important; }
.text-truncate { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
</style>
@endsection
