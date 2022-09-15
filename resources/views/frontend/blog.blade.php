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
                    @foreach ($blogs as $blog)
                        
                  <article class="entry" data-aos="fade-up">
      
                    <div class="entry-img">
                      <img src="{{ $blog->image }}" alt="" class="img-fluid">
                    </div>
      
                    <h2 class="entry-title">
                      <a href="{{ url('blog/details/'.$blog->id) }}">{{ $blog->title }}</a>
                    </h2>
      
                    <div class="entry-meta">
                      <ul>
                        <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="{{ url('blog/details/'.$blog->id) }}"> {{ $blog->user->name }}</a></li>
                        <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="{{ url('blog/details/'.$blog->id) }}"><time datetime="{{ $blog->created_at }}">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</time></a></li>
                        <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="{{ url('blog/details/'.$blog->id) }}">Comments</a></li>
                      </ul>
                    </div>
      
                    <div class="entry-content">
                      <p>
                        {{ $blog->sort_desc }}
                      </p>
                      <div class="read-more">
                        <a href="{{ url('blog/details/'.$blog->id) }}">Read More</a>
                      </div>
                    </div>
      
                  </article><!-- End blog entry -->
      
                  @endforeach
                  {{ $blogs->links() }}
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
                        @foreach ($blogs as $blog)
                            
                      <div class="post-item clearfix">
                        <img src="{{ asset($blog->image) }}" alt="">
                        <h4><a href="{{ url('blog/details/'.$blog->id) }}">{{ $blog->title }}</a></h4>
                        <time datetime="{{ $blog->created_at }}">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</time>
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