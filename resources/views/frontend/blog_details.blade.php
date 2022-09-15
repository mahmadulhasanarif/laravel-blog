@extends('frontend.master')
@section('main')
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
      
              <div class="d-flex justify-content-between align-items-center">
                <h2>Blog</h2>
                <ol>
                  <li><a href="{{ route('home') }}">Home</a></li>
                  <li>Blog</li>
                </ol>
              </div>
      
            </div>
          </section><!-- End Breadcrumbs -->
      
          <!-- ======= Blog Section ======= -->
          <section id="blog" class="blog">
            <div class="container">
      
              <div class="row">
      
                <div class="col-lg-8 entries">
      
                  <article class="entry entry-single" data-aos="fade-up">
      
                    <div class="entry-img">
                      <img src="{{ asset($blog->image) }}" alt="" class="img-fluid">
                    </div>
      
                    <h2 class="entry-title">
                      <a>{{ $blog->title }}</a>
                    </h2>
      
                    <div class="entry-meta">
                      <ul>
                        <li class="d-flex align-items-center"><i class="icofont-user"></i> <a>{{ $blog->user->name }}</a></li>
                        <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a ><time datetime="{{ $blog->created_at }}">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</time></a></li>
                        <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a> Comments</a></li>
                      </ul>
                    </div>
      
                    <div class="entry-content">
                       <p>
                            {{ $blog->sort_desc }}
                      </p>
      
                      <blockquote>
                        <i class="icofont-quote-left quote-left"></i>
                        <p>{{$blog->sort_desc}}</p>
                        <i class="las la-quote-right quote-right"></i>
                        <i class="icofont-quote-right quote-right"></i>
                      </blockquote>
      
                      <p>{{$blog->long_desc}}</p>
      
                      <h3>{{ $blog->title }}</h3>
      
                    <div class="entry-footer clearfix">
                      <div class="float-left">
                        <i class="icofont-folder"></i>
                        <ul class="cats">
                          <li><a href="#">Business</a></li>
                        </ul>
      
                        <i class="icofont-tags"></i>
                        <ul class="tags">
                          <li><a href="#">Creative</a></li>
                          <li><a href="#">Tips</a></li>
                          <li><a href="#">Marketing</a></li>
                        </ul>
                      </div>
      
                      <div class="float-right share">
                        <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                        <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                        <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                      </div>
      
                    </div>
      
                  </article><!-- End blog entry -->
      
                  <div class="blog-author clearfix" data-aos="fade-up">
                    <img src="assets/img/blog-author.jpg" class="rounded-circle float-left" alt="">
                    <h4>{{$blog->user->name }}</h4>
                    <div class="social-links">
                      <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
                      <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
                      <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
                    </div>
                    <p>{{$blog->sort_desc}}</p>
                  </div><!-- End blog author bio -->
      
                  <div class="blog-comments" data-aos="fade-up">
      
                    <h4 class="comments-count">Comments</h4>
      
                    <div id="comment-1" class="comment clearfix">
                      <img src="assets/img/comments-1.jpg" class="comment-img  float-left" alt="">
                      <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                      <time datetime="2020-01-01">01 Jan, 2020</time>
                      <p>
                        Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                        Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                      </p>
      
                    </div><!-- End comment #1 -->

      
      
               
      
                    <div class="reply-form">
                      <h4>Leave a Reply</h4>
                      <p>Your email address will not be published. Required fields are marked * </p>
                      <form action="">
                        <div class="row">
                          <div class="col-md-6 form-group">
                            <input name="name" type="text" class="form-control" placeholder="Your Name*">
                          </div>
                          <div class="col-md-6 form-group">
                            <input name="email" type="text" class="form-control" placeholder="Your Email*">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <input name="website" type="text" class="form-control" placeholder="Your Website">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
      
                      </form>
      
                    </div>
      
                  </div><!-- End blog comments -->
      
                </div><!-- End blog entries list -->
      
                <div class="col-lg-4">
      
                  <div class="sidebar" data-aos="fade-left">
      
                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                      <form action="">
                        <input type="text">
                        <button type="submit"><i class="icofont-search"></i></button>
                      </form>
      
                    </div><!-- End sidebar search formn-->
      
                    <h3 class="sidebar-title">Categories</h3>
                    <div class="sidebar-item categories">
                        <ul>
                        @foreach ($category as $cat)
                            <li><a href="#">{{ $cat->name }}</a></li>
                        @endforeach
                        </ul>
      
                    </div><!-- End sidebar categories-->
      
                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">

                        @foreach ($blogs as $blos)

                      <div class="post-item clearfix">
                        <img src="{{ asset($blos->image) }}" alt="">
                        <h4><a>{{ $blos->title }}</a></h4>
                        <time datetime="{{ $blos->created_at }}">{{ Carbon\Carbon::parse($blos->created_at)->diffForHumans() }}</time>
                      </div>

                      @endforeach
      
                    </div><!-- End sidebar recent posts-->
      
                    <h3 class="sidebar-title">Services</h3>
                    <div class="sidebar-item tags">
                      <ul>
                        @foreach ($services as $service)
                        <li><a>{{ $service->title }}</a></li>
                        @endforeach
                      </ul>
      
                    </div><!-- End sidebar tags-->
      
                  </div><!-- End sidebar -->
      
                </div><!-- End blog sidebar -->
      
              </div>
      
            </div>
          </section><!-- End Blog Section -->
@endsection