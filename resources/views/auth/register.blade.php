@extends('layouts.app')
@section('title', 'Register - EduTech')

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-3">
                <img src="{{ asset('assets/img/iconedu.png') }}"
                     class="img-fluid" alt="EduTech Logo">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div class="card-body p-5">
                    <h5 class="text-center mb-4" style="color: #333; font-weight: 600; font-size: 20px;">
                        Buat Akun Anda
                    </h5>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Pendaftaran Gagal!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label" style="font-weight: 600; color: #333;">
                                Nama Lengkap
                            </label>
                            <input type="text" name="name"
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   id="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required />
                            @error('name')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="Masukkan email" required />
                            <label class="form-label" for="form3Example3">Email</label>
                            @error('email')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label" style="font-weight: 600; color: #333;">
                                Pilih Peran
                            </label>
                            <select name="role" class="form-select form-select-lg @error('role') is-invalid @enderror"
                                    id="role" style="border: 1px solid #ddd; border-radius: 8px;" required>
                                <option value="">-- Pilih Peran Anda --</option>
                                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>
                                    Student (Pelajar)
                                </option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                    Admin (Pengajar)
                                </option>
                            </select>
                            @error('role')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   placeholder="Minimal 8 karakter" required />
                            <label class="form-label" for="password">Password</label>
                            @error('password')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label" style="font-weight: 600; color: #333;">
                                Konfirmasi Password
                            </label>
                            <input type="password" name="password_confirmation"
                                   class="form-control form-control-lg" id="password_confirmation"
                                   placeholder="Ulangi password Anda" required />
                        </div>

                        <button type="submit" class="btn btn-lg w-100 text-white fw-bold"
                                style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                       border: none; border-radius: 8px; padding: 14px; font-size: 16px;">
                            Daftar Akun
                        </button>
                    </form>

                    <p class="text-center" style="color: #666; margin: 0;">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" style="color: #667eea; text-decoration: none; font-weight: 600;">
                            Login di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
