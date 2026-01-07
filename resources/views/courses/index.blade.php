@extends('layouts.app')



@section('content')

<div class="container mt-5 pt-5">
    <div class="row justify-content-between mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold"> Daftar Kursus</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-lg">+ Tambah Kursus</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse($courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $course->title }}</h5>
                        <p class="card-text">{!! Str::limit(($course->description), 100) !!}</p>
                        <p class="text-muted mb-2">
                            <i class="bi bi-book me-1"></i>
                            {{ $course->materials_count }} materi
                        </p>
                        <p class="text-muted mb-0">
                            <i class="bi bi-person me-1"></i>
                            Dibuat oleh: {{ $course->creator->name ?? 'Unknown' }}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <a href="{{ route('admin.materials.index') }}" class="btn btn-outline-primary btn-sm">Lihat Materi</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-book display-1 text-muted mb-4"></i>
                <h4 class="text-muted mb-4">Belum ada kursus</h4>
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-lg">Buat kursus pertama</a>
            </div>
        @endforelse
    </div>

    <div class="mt-5">
        {{ $courses->links() }}
    </div>
</div>
@endsection
