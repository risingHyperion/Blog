<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />

  <title>TECH Blog</title>

  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

  <!-- Modificat-->
  <!-- Font Awesome -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Secular+One&family=Teko:wght@700&display=swap" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

  <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

<body>
  <!-- Navbar -->
  <div class="top-part">
    <a class="titlu-site" href="#"><strong>TECH Blog</strong></a>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-link"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Acasa</a></li>
      </ul>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Modificat de aici -->
      @if (Auth::guest())
          <li>
            <a class="nav-link" href="{{ url('/auth/login') }}">Login</a>
          </li>
          <li>
            <a class="nav-link" href="{{ url('/auth/register') }}">Register</a>
          </li>
          @else
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="user-name badge badge-info"><strong>{{ Auth::user()->name }}</strong></span></a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" role="menu">
              @if (Auth::user()->can_post())
              <li>
                <a class="dropdown-item" href="{{ url('/new-post') }}">Adauga postare noua</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('/user/'.Auth::id().'/posts') }}">Postarile mele</a>
              </li>
              @endif
              <li>
                <a class="dropdown-item" href="{{ url('/user/'.Auth::id()) }}">Profilul meu</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('/user/'.Auth::id()).'/avatar' }}">Avatarul meu</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('/logout') }}">Delogare</a>
              </li>
            </ul>
          </li>
          @endif
            <!-- Modificat pana aici-->
        <!-- Navbar dropdown -->
        
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->


  <div class="container">
    @if (Session::has('message'))
    <div class="flash alert-info">
      <p class="panel-body">
        {{ Session::get('message') }}
      </p>
    </div>
    @endif
    @if ($errors->any())
    <div class='flash alert-danger'>
      <ul class="panel-body">
        @foreach ( $errors->all() as $error )
        <li>
          {{ $error }}
        </li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2>@yield('title')</h2>
            @yield('title-meta')
          </div>
          <div class="panel-body">
            @yield('content')
          </div>
        </div>
      </div>
    </div>



  <!-- Scripts -->
  
  

  
  <!-- Modificat-->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>



</body>



</html>