@extends('frontend.master')
@section('main')
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
      
              <div class="d-flex justify-content-between align-items-center">
                <h2>Testimonials</h2>
                <ol>
                  <li><a href="{{ route('home') }}">Home</a></li>
                  <li>Testimonials</li>
                </ol>
              </div>
      
            </div>
          </section><!-- End Breadcrumbs -->
      
          <!-- ======= Testimonials Section ======= -->
          <section id="testimonials" class="testimonials section-bg">
            <div class="container">
      
              <div class="row">
                @foreach ($teams as $team)
                    
                <div class="col-lg-6" data-aos="fade-up">
                  <div class="testimonial-item">
                    <img src="{{ asset($team->image) }}" class="testimonial-img" alt="">
                    <h3>{{ $team->name }}</h3>
                    <h4>{{ $team->title }}</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                     {{$team->description}}
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                </div>
      
                @endforeach
              </div>
      
            </div>
          </section><!-- End Testimonials Section -->
@endsection