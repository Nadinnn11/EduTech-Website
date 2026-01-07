@extends('layouts.app')
@section('title', 'Home - EduTech')

@section('content')
<section id="hero" class="hero section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center">

      <div class="col-lg-6">
        <div class="hero-content">
          <div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
            <div class="badge-item">
              <i class="bi bi-shield-check"></i>
              <span>Verified UPI</span>
            </div>
            <div class="badge-item">
              <i class="bi bi-clock"></i>
              <span>{{ count(App\Models\Course::all()) }} Course</span>
            </div>
            <div class="badge-item">
              <i class="bi bi-star-fill"></i>
              <span>{{ count(App\Models\Material::all()) }} materials</span>
            </div>
          </div>

          @auth
            <h1 data-aos="fade-right" data-aos-delay="300">
              Selamat Datang, <br>
              <span class="highlight">{{ auth()->user()->name }}</span>
            </h1>
            <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
              Platform pembelajaran Pendidikan & Sistem Informasi dari UPI Purwakarta.
            </p>

            @if(auth()->user()->isAdmin())
              <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
                <a href="{{ route('materials.index') }}" class="btn btn-primary">
                  Kelola Materi
                </a>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-primary ms-2">
                  Kelola Kursus
                </a>
              </div>
            @endif

          @else
            <h1 data-aos="fade-right" data-aos-delay="300">Selamat Datang di EduTech</h1>
            <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
              Platform pembelajaran Pendidikan & Sistem Informasi dari UPI Purwakarta.
            </p>
            <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
              <a href="{{ route('register') }}" class="btn btn-outline-primary ms-2">Register</a>
            </div>
          @endauth

        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
          <div class="main-image">
            <img src="{{ asset('assets/img/iconedu.png') }}" alt="EduTech Visual" class="img-fluid">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
