<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="#" class="brand-link text-center">
      <img src="{{asset('assets/dist/img/edge_pic_2.png')}}" alt="Logo" height="65"
           style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/edge_pic_1.jpg')}}" class="img-circle elevation-4" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Training Edge Consulting</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{$route == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('domains.index')}}" class="nav-link {{$route == 'domains' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Domains
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('profs.index')}}" class="nav-link {{$route == 'profs' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Profs
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('courses.index')}}" class="nav-link {{$route == 'courses' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Courses
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
     
    </div>
  
  </aside>