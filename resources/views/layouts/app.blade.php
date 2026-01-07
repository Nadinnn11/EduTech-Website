<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'EduTech')</title>

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</head>


<body class="index-page">

  <header id="header" class="header fixed-top">

   

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="navbar-brand" class="logo d-flex align-items-center">
      
          <h1 class="sitename">EduTech</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          @auth
            @if(auth()->user()->isStudent())
                <ul>
                    <li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                    @csrf
                    </form>
                    @auth
                    <li>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="">
                            @csrf
                        </form>
                        <a href="#" onclick="
                            event.preventDefault();
                            document.getElementById('logoutForm').submit();
                        " class="nav-link">
                            Logout 
                        </a>
                    </li>
                    @endauth

                    
                </ul>
            @elseif(auth()->user()->isAdmin())
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('courses.index') }}">Courses</a></li>
                    <li><a href="{{ route('materials.index') }}">Materials</a></li>
                    <li><form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a> </li>
            
        </ul>
            @endif
            
        @endauth



  </header>

<main class="container"style="padding-top: 70px;">
    @yield('content')

     
<center><p>© <span class="sitename">EduTech</span>. All rights reserved.</p>
</center>
      
    
</main>
</body>
</html>
