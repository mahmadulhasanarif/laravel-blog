@extends('frontend.master')
@section('main')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $about->title }}</h2>
            <h3>{{ $about->sort_desc }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>{{ $about->long_desc }}
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li> 
            </ul>
            
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. </p>
        </div>

        <div class="row">
            @foreach ($teams as $team)
                
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up">
                    <div class="member-img">
                        <img src="{{ asset($team->image) }}" class="img-fluid" alt="">
                        <div class="social">
                        <a href=""><i class="icofont-twitter"></i></a>
                        <a href=""><i class="icofont-facebook"></i></a>
                        <a href=""><i class="icofont-instagram"></i></a>
                        <a href=""><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>{{ $team->name }}</h4>
                        <span>{{ $team->title }}</span>
                    </div>
                    </div>
                </div>

          @endforeach
        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Our Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Skills</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">

            <div class="progress">
              <span class="skill">HTML <i class="val">100%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">CSS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">JavaScript <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <div class="progress">
              <span class="skill">PHP <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">WordPress/CMS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Photoshop <i class="val">55%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Our Skills Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Brands</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
            @foreach ($brands as $brand)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="client-logo">
                    <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Our Clients Section -->
@endsection