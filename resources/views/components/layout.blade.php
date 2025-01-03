<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $titulo ?? 'Sin título' }}</title>
  <link rel="shortcut icon" type="image/png" href="/material/images/logos/dapriskalogo (2).png" />
  <link rel="stylesheet" href="/material/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ url('/') }}" class="text-nowrap logo-img">
            <img src="/material/images/logos/dapriskalogo (2).png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('cita.index') }}" aria-expanded="false">Citas</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('servicio.index') }}" aria-expanded="false">Servicios</a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">ACCIONES</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('cita.create') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar-plus"></i>
                </span>
                <span class="hide-menu">Agendar Cita</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('servicio.create') }}"  aria-expanded="false">
                <span>
                  <i class="ti ti-file-scissors"></i>
                </span>
                <span class="hide-menu">Crear servicio</span>
              </a>
            </li>
            @guest
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Autenticación</span>
            </li>
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Inicio de sesión</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('register') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Registrarse</span>
              </a>
            </li>
            @endguest
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="/material/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                  
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-primary mx-3 mt-2 d-block">Salir</a>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                      @csrf
                    </form>
              
                  </div>
                </div>
              </li>
              @endauth
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
      {{ $slot }}              
  <script src="/material/libs/jquery/dist/jquery.min.js"></script>
  <script src="/material/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/material/js/sidebarmenu.js"></script>
  <script src="/material/js/app.min.js"></script>
  <script src="/material/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/material/libs/simplebar/dist/simplebar.js"></script>
  <script src="/material/js/dashboard.js"></script>
</body>
</html>