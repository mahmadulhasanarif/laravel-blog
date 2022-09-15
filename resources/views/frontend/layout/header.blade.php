<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ route('home') }}"><span>Com</span>pany</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('home') }}">Home</a></li>

          <li class="drop-down"><a href="{{ route('about') }}">About</a>
            <ul>
              <li><a href="{{ route('about') }}">About Us</a></li>
              <li><a href="{{ route('team') }}">Team</a></li>
              <li><a href="{{ route('testimonial') }}">Testimonials</a></li>
            </ul>
          </li>

          <li><a href="{{ route('service') }}">Services</a></li>
          <li><a href="{{ route('protfolio') }}">Portfolio</a></li>
          <li><a href="{{ route('pricing') }}">Pricing</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>

    </div>
  </header>