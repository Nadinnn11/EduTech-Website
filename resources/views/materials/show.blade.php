@extends('layouts.app')

@section('content')
<div class="container mt-5">

    
    <div class="mb-4">
        <div class="mb-2 text-muted">
            <small><i class="fas fa-book"></i> Kursus: 
                <a href="{{ route('courses.show', $material->course) }}" class="text-decoration-none text-muted">
                    {{ $material->course->title }}
                </a>
            </small>
            <br>
            <small><i class="fas fa-calendar"></i> Dibuat: {{ $material->created_at->format('d M Y') }}</small>
        </div>

        <h1 class="fw-bold">{{ $material->title }}</h1>

        @if($material->description)
            <p class="text-muted">{{ $material->description }}</p>
        @endif

       
    </div>

   
    <div class="card p-4 mb-4 shadow-sm border-primary">
        <h5 class="mb-3 text-primary"></h5>Isi Materi</h5>
         {{$material->content }}
        <div class="text-primary" style="white-space: pre-line;">
           
        </div>
    </div>
 <a href="{{ route('materials.index', $material->course) }}" class="btn btn-secondary mb-3">
     <i class="fas fa-arrow-left"></i> Kembali ke Materi
</a>
</div>
@endsection
