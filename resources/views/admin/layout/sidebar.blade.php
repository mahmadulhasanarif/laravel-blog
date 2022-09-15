  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">@if (Auth::user())
              {{ Auth::user()->name }}
          @else
              Admin
          @endif</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('service.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('service.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Category 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('trash.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Trash</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('feature.index') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Feature Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('feature.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feature Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('feature.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feature Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Contact Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contact.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('message.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Massage</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Slider Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('slider.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('slider.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider Form</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Blog Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Team Member
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('team.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('team.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team Form</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                About Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('about.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('brand.index') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Brand Page
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('multipleImage.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Protfolio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Image
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  