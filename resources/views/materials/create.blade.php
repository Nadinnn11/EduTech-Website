@extends('layouts.app')

@section('title', 'Tambah Materi - EduTech')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Tambah Materi Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('materials.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilih Kursus</label>
                        <select class="form-select @error('course_id') is-invalid @enderror" 
                                id="course_id" name="course_id" required>
                            <option value="">-- Pilih Kursus --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Materi</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Buat Materi</button>
                    <a href="{{ route('materials.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
