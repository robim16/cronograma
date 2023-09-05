<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminLte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <a href="{{ route('admin')}}" class="brand-link">
        <img src="{{ asset('logo-tic-png.png') }}" alt="Logo Tic"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Oficina Tic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminLte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}" title="salir"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-primary"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Actividades
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('actividades.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('cronograma.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cronograma</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>
                            Cronograma
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cronograma.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cronograma</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('subcategorias.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear</p>
                            </a> --}}
                        </li>
                    </ul>
                </li>

                @if (auth()->user()->role_id == 1)
               
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Colaboradores
                                <i class="fas fa-angle-left right"></i>
                                {{-- <span class="badge badge-info right">6</span> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('colaboradores.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- <a href="{{ route('subcategorias.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Crear</p>
                                </a> --}}
                            </li>
                        </ul>
                    </li>
               
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Roles
                                <i class="fas fa-angle-left right"></i>
                                {{-- <span class="badge badge-info right">6</span> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- <a href="{{ route('subcategorias.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Crear</p>
                                </a> --}}
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
