  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Posts
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">{{App\Models\Post::count()}}</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          @can('post-list')
                              <li class="nav-item">
                                  <a href="{{ route('admin.posts.index') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Show Posts</p>
                                  </a>
                              </li>
                          @endcan
                          {{-- @can('post-create')
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>CreatePost</p>
                                  </a>
                              </li>
                          @endcan --}}

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Users
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">{{App\Models\User::count()}}</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          @can('users-list')
                              <li class="nav-item">
                                  <a href="{{ route('admin.users') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Show Users</p>
                                  </a>
                              </li>
                          @endcan
                          @can('post-create')
                              <li class="nav-item">
                                  <a href="{{ route('admin.users.create') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Create User</p>
                                  </a>
                              </li>
                          @endcan

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Roles
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">{{ Spatie\Permission\Models\Role::count()}}</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          @can('users-list')
                              <li class="nav-item">
                                  <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Show Roles</p>
                                  </a>
                              </li>
                          @endcan
                          @can('post-create')
                              <li class="nav-item">
                                  <a href="{{ route('admin.roles.create') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Create Role</p>
                                  </a>
                              </li>
                          @endcan

                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
