@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">{{ $course->title }}</h2>
                        <div class="enroll-status">
                            @if(in_array($course->id, auth()->user()->enrolled_courses ?? []))
                                <span class="badge bg-primary fs-5 px-3 py-2">
                                    <i class="bi bi-check-circle me-2"></i>Sedang Diikuti
                                </span>
                            @else
                                <form action="{{ route('courses.enroll', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg px-4">
                                        <i class="bi bi-plus-circle me-2"></i>Ikuti Kursus
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body p-5">
                    <p class="lead text-muted mb-4">{{ $course->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    
        </div>
    </div>
</div>
@endsection


