@extends('layouts.app')

@section('title', 'Edit Materi - EduTech')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Edit Materi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('materials.update', $material) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilih Kursus</label>
                        <select class="form-select @error('course_id') is-invalid @enderror" 
                                id="course_id" name="course_id" required>
                            <option value="">-- Pilih Kursus --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ $material->course_id == $course->id ? 'selected' : '' }}>
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
                               id="title" name="title" value="{{ old('title', $material->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" name="content" rows="5" required>{{ old('content', $material->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order_number" class="form-label">Urutan</label>
                        <input type="number" class="form-control @error('order_number') is-invalid @enderror" 
                               id="order_number" name="order_number" value="{{ old('order_number', $material->order_number) }}" required>
                        @error('order_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Materi</button>
                    <a href="{{ route('materials.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
