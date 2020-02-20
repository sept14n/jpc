<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

  @yield('css')
</head>

<body>
  <div id="app" class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="javascript:viod(0)">
      <i class="fas fa-bars fa-2x"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="javascript:viod(0)">projects management</a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-pic">
            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
          </div>
          <div class="user-info">
            <span class="user-name">{{ Auth::user()->name }}</span>
            <span class="user-role">Administrator</span>
          </div>
        </div>
        <!-- sidebar-header  -->
        <!-- <div class="sidebar-search">
          <div>
            <div class="input-group">
              <input type="text" class="form-control search-menu" placeholder="Search...">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
        </div> -->
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>General</span>
            </li>
            <li class="sidebar-dropdown">
              <a href="javascript:void(0)">
                <i class="fa fa-tachometer-alt"></i>
                <span>Projects</span>
                <!-- <span class="badge badge-pill badge-warning">New</span> -->
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="{{ route('projects.index') }}">All Projects</a>
                  </li>
                  <li>
                    <a href="{{ route('projects.index') }}">My Projects</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- <li class="sidebar-dropdown">
              <a href="javascript:void(0)">
                <i class="fa fa-shopping-cart"></i>
                <span>E-commerce</span>
                <span class="badge badge-pill badge-danger">3</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="javascript:void(0)">Products

                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Orders</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Credit cart</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="javascript:void(0)">
                <i class="far fa-gem"></i>
                <span>Components</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="javascript:void(0)">General</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Panels</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Tables</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Icons</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Forms</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="javascript:void(0)">
                <i class="fa fa-chart-line"></i>
                <span>Charts</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="javascript:void(0)">Pie chart</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Line chart</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Bar chart</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Histogram</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="javascript:void(0)">
                <i class="fa fa-globe"></i>
                <span>Maps</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="javascript:void(0)">Google maps</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Open street map</a>
                  </li>
                </ul>
              </div>
            </li> -->
            <li class="header-menu">
              <span>Extra</span>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="fa fa-book"></i>
                <span>Documentation</span>
                <span class="badge badge-pill badge-primary">Beta</span>
              </a>
            </li>
            <li>
              <a href="{{ route('register') }}">
                <i class="fa fa-cog"></i>
                <span>Settings</span>
              </a>
            </li>

            <li class="header-menu">
              <span>Master Data</span>
            </li>
            <li>
              <a href="{{ route('division.index') }}">
                <i class="fa fa-cog"></i>
                <span>Divisi</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
        <a href="javascript:void(0)">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="javascript:void(0)">
          <i class="fa fa-envelope"></i>
          <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="javascript:void(0)" onclick="showLogoutModal()">
          <i class="fa fa-power-off"></i>
        </a>

      </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
      <div class="container-fluid">
        @yield('content')
      </div>

    </main>
    <!-- page-content" -->

  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  @yield('js-src')

  <script>
    function showLogoutModal() {
      Swal.fire({
        title: "Logout",
        html: "<span>Apakah Anda yakin akan logout?<br>Pilih tombol 'Logout' di bawah ini jika Anda ingin mengakhiri sesi Anda saat ini.</span>",
        icon: "question",
        confirmButtonText: "Logout",
        confirmButtonColor: "#e3342f",
        showCancelButton: true,
        focusCancel: true,
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          $('#logout-form').submit();
        }
      });
    }

    function showDeleteModal() {
      Swal.fire({
        title: "Hapus Data",
        html: "<span>Apakah Anda yakin akan menghapus data?</span>",
        icon: "warning",
        confirmButtonText: "Delete",
        confirmButtonColor: "#e3342f",
        showCancelButton: true,
        focusCancel: true,
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          $('#delete-form').submit();
        }
      });
    }

    $(document).ready(function() {
      $(".alert button.close span").click(function(e) {
        $(".alert").fadeTo(200, 0).slideUp(200, function() {
          $(this).remove();
        });
      });
    });
  </script>

  @yield('js')
</body>

</html>