@extends('layouts.app')
@section('title', 'Login - EduTech')

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('assets/img/iconedu.png') }}"
                     class="img-fluid" alt="EduTech Logo">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div class="card-body p-5">
                    <h5 class="text-center mb-4" style="color: #333; font-weight: 600; font-size: 20px;">
                        Masuk ke Akun Anda
                    </h5>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Login Gagal!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="Masukkan email" required />
                            <label class="form-label" for="form3Example3">Email</label>
                            @error('email')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="form3Example4" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   placeholder="Masukkan password" required />
                            <label class="form-label" for="form3Example4">Password</label>
                            @error('password')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" name="remember" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Ingat saya
                                </label>
                            </div>
                            <a href="{{ route('register') }}" class="text-body">Lupa password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                Login
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="link-danger">Daftar</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
