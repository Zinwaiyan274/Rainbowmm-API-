<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets/album/onlyLogo.svg') }}">
  <title>
    Rainbow MM Family
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href=".{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />

  {{-- <link rel="stylesheet" href="{{ 'assets/css/style.css' }}"> --}}
  <style>
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.imageThumb_append {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.pip_append {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
  </style>
</head>

<body class="g-sidenav-show" style="background: #103F74;">
  {{-- <div class="min-height-300 position-absolute w-100"></div> --}}
  <div class="container">
    <div class="row">
            <div class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-5" id="sidenav-main">
                <div class="sidenav-header m-auto mb-3 mt-3">
                    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                    <a class="navbar-brand m-0 d-flex justify-content-center" href="{{ route('articlesPage') }}">
                        <img src="{{ asset('assets/album/onlyLogo.svg') }}" class="navbar-brand-img" style="width: 60px" alt="main_logo">
                        <p class="mt-2 inter">Rainbow MM Family</p>
                    </a>
                </div>
                <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('articlesPage') }}">
                                <button class="btn w-100">
                                    <div class="fs-5 me-2 d-flex align-items-center">
                                        <i class="fa-solid fa-clipboard-list"></i>
                                        <span class="nav-link-text ms-3 inter fs-5">Articles</span>
                                    </div>
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('userList') }}">
                                <button class="btn w-100">
                                    <div class="fs-5 me-2 d-flex align-items-center">
                                        <i class="fa-solid fa-user"></i>
                                        <span class="nav-link-text ms-3 inter fs-5">Users</span>
                                    </div>
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('certificateList') }}">
                                <button class="btn w-100">
                                    <div class="fs-5 me-2 d-flex align-items-center">
                                        <i class="fa-solid fa-clipboard-list"></i>
                                        <span class="nav-link-text ms-3 inter fs-5">Certificates</span>
                                    </div>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <hr class="">
                <div class="sidenav-footer mx-3">
                    <form action="{{ route('logoutProcess') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger mb-0 mt-3 w-100 text-white" type="submit">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            @yield('content')
        </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  {{-- jquery --}}
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  @yield('js')
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/argon-dashboard.min.js') }}"></script>
</body>

</html>
