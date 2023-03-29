<!DOCTYPE html>
<html  lang="ar" >

    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>@yield('title' , config('app.name'))</title>
            <link rel="shortcut icon" href="{{ asset('adminassets/images/icon.svg') }}" type="image/x-icon">
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="{{ asset('adminassets/css.css') }}">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="{{ asset('adminassets/css.css') }}">
            <link rel="stylesheet" href="{{ asset('adminassets/plugins/fontawesome-free/css/all.min.css') }}">
            <!-- Theme style -->
            <link rel="stylesheet" href="{{ asset('adminassets/dist/css/adminlte.min.css') }}">
            <link rel="stylesheet" href="{{ asset('adminassets/style.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

            @yield('styles')
            {{-- عندما تكون الصفحة عربي غير اتجاه من خلال diration :rtl --}}
            <style>

                .table{
                    width: 200%;
                }
                .table th,
                .table td {
                    vertical-align: middle
                }
                .h1{

                }
            </style>

            @if (app()->currentLocale() == 'ar')
                {{-- style admin lte arabic --}}
                <style>

                    .table
                        {
                            direction: rtl;

                        }

                    body

                        {
                            direction: rtl;
                            text-align: right
                        }
                        .show {

                            direction:ltr;
                    }

                    @media (min-width: 768px)
                        {
                            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
                            margin-right: 250px;
                            margin-left: 0;
                            direction: ltr;
                            }
                        }

                    ul
                        {
                            padding: 0
                        }

                    .nav-sidebar .nav-link>.right, .nav-sidebar .nav-link>p>.right
                        {
                            right: unset;
                            left: 1rem;
                        }

                    .brand-link .brand-image
                        {
                            float: right;
                            line-height: -4.2;
                            margin-left: 0.8rem;
                            margin-right: 0.5rem;
                            margin-top: -3px;
                            max-height: 33px;
                            width: auto;
                        }

                    .user-panel
                        {
                        position: relative;
                        margin: 9px;
                        }
                    .content-header h1
                            {
                                display: flex;
                                font-size: 1.8rem;
                                margin: 0;
                            }
                    .main-header {
                        direction: rtl !important;
                    }
                    .navbar-nav.ml-auto.nav-ar {
                        flex: auto !important;
                    }
                    .nav-ar {
                        flex-direction: row-reverse !important;
                        -ms-flex-direction: row-reverse !important;
                    }
                    .main-footer {
                        text-align: left;
                    }
                    /* body.sidebar-mini.sidebar-collapse .content-wrapper {
                        margin-right: 75px;
                        margin-left: 0 !important;
                    } */
                    .sidebar-mini.sidebar-collapse .content-wrapper {
                        margin-right: 75px !important;
                        margin-left: 0 !important;
                    }
                    @media (min-width: 992px) {
                        .sidebar-mini.sidebar-collapse .content-wrapper, .sidebar-mini.sidebar-collapse .main-footer, .sidebar-mini.sidebar-collapse .main-header {
                            margin-left: auto;
                        }
                    }
                    .sidebar-collapse .main-header {
                        margin-right: 75px !important;
                        margin-left: 0 !important;
                    }

                    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
                        margin-left: 0 !important;
                    }
                    body.sidebar-collapse .main-footer {
                        margin-right: 75px !important;
                    }
                    /* body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
                        margin-right: 75px;
                    } */
                </style>
            @endif
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap');

                * {
                    font-family: 'Cairo', sans-serif;
                }

                .main-sidebar {
                    background-image: linear-gradient(#92599E,#40BDEB) ;

                }
                .nav-sidebar>.nav-item{
                    color: rgb(218, 216, 216);
                }
                [class*=sidebar-dark-] .sidebar a {
                    color: var(--color-white) !important;
                }
                .tarmmez {
                    color: var(--secondary-color-4);
                    font-weight: 900 !important;
                    font-size: 24px !important;
                }
                .brand-link {
                    display: flex;
                    align-items: center;
                }
                .head{
                    background-image: linear-gradient(#92599E,#40BDEB)
                }
            </style>
    </head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light head">
         <ul class="navbar-nav">
            <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ __('site.Welcome') }},{{ Auth::user()->name }}</span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('site.index') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('site.Home') }}
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('site.Logout') }}

                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf

                    </form>
                </div>
            </li>
         </ul>

            {{-- Mcamera ترجمات --}}
            <ul class="navbar-nav ml-auto  nav-ar">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 ">{{ __('site.Languages') }} ({{ app()->currentLocale() }})
                    </a>
                    <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                            <img width="23" src="{{ asset('adminassets/images/'.$properties['flag']) }}" alt="" {{ $properties['native'] }}>
                                {{ $properties['native'] }}
                            </a>
                    @endforeach

                    </div>
                </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"></span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            </ul>
    </nav>
    <!-- /.navbar -->

  {{--  Main Sidebar Container --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo in Sidebar translate Brand logo -->
    <a href="#" class="brand-link">
        <img  src="{{ asset('adminassets/images/icon.svg') }}" class="rounded-circle" style="width:25px;"
        alt="Avatar" />      <span class="brand-text font-weight-light tarmmez">@if (app()->currentLocale() == 'ar')
        {{ env('APP_NAME_AR') }}
        @else
        {{ config('app.name') }}
      @endif</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) scuned brand logo -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      {{-- <!-- Sidebar Menu  --> --}}
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            {{-- Dashbord --}}
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    {{ __('site.Dashbord') }}
                    </p>
                </a>
            </li>

            {{-- Service --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users-cog"></i>
                    <p>
                        {{ __('site.Service') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.service.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Service') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.service.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Service') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.services.trash') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>

            {{--category --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-toolbox"></i>
                    <p>
                        {{ __('site.Category') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Category') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Category') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.trash') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>

            {{--products --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-toolbox"></i>
                    <p>
                        {{ __('site.Product') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Product') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.product.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Product') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.trash') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>

            {{--Branch --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-toolbox"></i>
                    <p>
                        {{ __('site.Branch') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.branch.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Branch') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.branch.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Branch') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.branches.trash') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>

            {{-- Post --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-usps"></i>
                    <p>
                        {{ __('site.Post') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.post.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Post') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.post.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Post') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.posts.trash') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>

            {{-- reservation --}}
            <li class="nav-item">
                <a href="{{ route('admin.reservation') }}" class="nav-link">
                    <i class="fas fa-envelope-open"></i>
                    <p>
                    {{ __('site.Reservation') }}
                    </p>
                </a>
            </li>

                {{-- Buying --}}
            <li class="nav-item">
                <a href="{{ route('admin.buying') }}" class="nav-link">
                    <i class="fas fa-cash-register"></i>
                    <p>
                    {{ __('site.Buying') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @yield('content')
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>{{ __('site.Version') }}</b> 1.0.1
    </div>
    <strong>Copyright &copy; 2019-2023 <a href="#">{{ __('site.Digital Event') }}</a>.</strong> All rights reserved.
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminassets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminassets/dist/js/demo.js') }}"></script>

@yield('scripts')
</body>
</html>
