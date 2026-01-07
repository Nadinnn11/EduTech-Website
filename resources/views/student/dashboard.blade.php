@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home-about" class="home-about section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-heading display-5 fw-bold mb-3">EduTech Learning Platform</h2>
                <p class="lead-text fs-4 text-muted mb-0">Platform pembelajaran untuk pengembangan kompetensi TI & Pendidikan</p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('assets/img/iconedu.png') }}" alt="EduTech" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>


<div class="container mt-5 mb-5">
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="GET" action="{{ route('student.dashboard') }}" class="search-form">
                <div class="input-group input-group-lg rounded-pill shadow-sm">
                    <span class="input-group-text bg-white border-0 rounded-start-pill">
                        <i class="bi bi-search text-primary"></i>
                    </span>
                    <input type="text" name="search" class="form-control border-0 px-4" 
                           placeholder="Cari kursus, deskripsi, materi..." value="{{ $search ?? '' }}">
                    <button type="submit" class="btn btn-primary px-4 rounded-end-pill">
                        Cari
                    </button>
                    @if($search)
                    <a href="{{ route('student.dashboard') }}" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-x-lg"></i>
                    </a>
                    @endif
                </div>
            </form>
            @if($search)
            <div class="text-center mt-2">
                <small class="text-muted">Ditemukan {{ $courses->count() }} kursus</small>
            </div>
            @endif
        </div>
    </div>
</div>



@if(isset($enrolledCourses) && $enrolledCourses->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Kursus Saya <span class="badge bg-primary fs-6">{{ $enrolledCourses->count() }}</span></h4>
        </div>
        
        @foreach($enrolledCourses as $course)
        <div class="card mb-4 shadow-sm border-0 hover-lift">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-2">
                            <a href="{{ route('courses.show', $course->id) }}" class="text-decoration-none text-dark fw-bold">
                                {{ $course->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted mb-2">{{ Str::limit($course->brand_description, 100) }}</p>
                        <div class="d-flex align-items-center gap-3 text-small">
                            <span class="badge bg-primary">
                                <i class="bi bi-book me-1"></i>{{ $course->materials_count }} materi
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary w-90 w-md-auto">
                            Detail Kursus
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif


<section class="py-5">
    <div class="container">
    

        @forelse($courses as $course)
        <div class="card mb-4 shadow-sm border-0 hover-lift">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-2">
                            <a href="{{ route('courses.show', $course->id) }}" class="text-decoration-none text-dark fw-bold">
                                {{ $course->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted mb-3">{{ Str::limit($course->brand_description, 120) }}</p>
                        
                        <div class="row g-2 mb-4">
                            <div class="col-auto">
                                <span class="badge bg-primary fs-6">
                                    <i class="bi bi-book me-1"></i>{{ $course->materials_count }} materi
                                </span>
                            </div>
                        </div>

                        <form action="{{ route('courses.enroll', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-plus-circle me-2"></i>Ikuti Kursus
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="display-6 text-primary mb-2">{{ $course->materials_count ?? 0 }}</div>
                        <div class="h6 text-muted mb-0">materi</div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="bi bi-book display-1 text-muted mb-4"></i>
            <h4 class="text-muted mb-3">Belum ada kursus tersedia</h4>
            <p class="text-muted">Segera hadir kursus-kursus menarik untuk pengembangan karir Anda!</p>
        </div>
        @endforelse
    </div>
</section>


@endsection

<style>
.hover-lift {
    transition: all 0.3s ease;
}
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}
.border-start {
    border-left: 5px solid #28a745 !important;
}
@media (max-width: 768px) {
    .display-6 { font-size: 1.75rem !important; }
}
</style>
