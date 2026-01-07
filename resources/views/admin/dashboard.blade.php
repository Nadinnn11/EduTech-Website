@extends('layouts.app')

@section('content')
<!-- Home About Section -->
<section id="home-about" class="home-about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                <div class="about-content">
<h2 class="section-heading">Innovative Learning, Future-Ready Skills</h2><p class="lead-text">
  Platform pembelajaran yang dirancang untuk mendukung pengembangan kompetensi di bidang pendidikan dan teknologi informasi secara terstruktur dan berkelanjutan.
</p>

<p>
  Materi kursus membantu pengguna memahami dasar-dasar sistem informasi, pemanfaatan teknologi dalam proses belajar, serta keterampilan praktis yang relevan dengan kebutuhan dunia pendidikan dan industri masa kini.
</p>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                <div class="about-visual">
                    <div class="main-image">
                        <img src="{{ asset('assets/img/iconedu.png') }}" alt="edu" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

       @forelse ($courses as $course)
          <div class="row mb-4" data-aos="zoom-in" data-aos-delay="500">
              <div class="col-lg-12">
                  <div class="card shadow-sm border-0 p-3">
                      <div class="d-flex justify-content-between align-items-start">
                          <div>
                              <h5 class="card-title mb-1">
                                  <a href="{{ route('courses.index', $course) }}" class="text-decoration-none">
                                      {{ $course->title }}
                                  </a>
                              </h5>
                              <p class="text-muted mb-2">{{ $course->brand_description }}</p>

                              @if($course->materials->count())
                                  <small class="text-secondary">Materials:</small>
                                  <ul class="list-unstyled mb-0">
                                      @foreach ($course->materials as $material)
                                          <li>
                                              <i class="bi bi-book me-1"></i>
                                              <a href="{{ route('materials.index', $material) }}">
                                                  {{ $material->title }}
                                              </a>
                                          </li>
                                      @endforeach
                                  </ul>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      @empty
          <p class="text-center text-muted">Belum ada course tersedia.</p>
      @endforelse

    
      <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="700">
          <a href="{{ route('courses.index') }}" class="btn btn-primary btn-lg">
              View All Courses <i class="bi bi-arrow-right ms-2"></i>
          </a>
      </div>
      

@endsection
