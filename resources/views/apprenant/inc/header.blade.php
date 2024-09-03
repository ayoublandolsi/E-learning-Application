<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>3ada elassad la7assad</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Cn8YGwJFZzVHhcTYKjWl/kXtvvWh5y2Y5hKc5g0f6KjnwmbNGQIbGdE6ilwoVXUcO6E+V7L0z6q3KjwFpTEN1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="{{asset ('home/css')}}/tailwind.output.css" />
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
  ></script>
  <script src="{{asset ('home/js')}}/init-alpine.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
  />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset ('home/css')}}/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset ('home/img')}}/favicon.ico" rel="icon">

    <!-- Template Stylesheet -->
    <link href="{{asset ('home/css')}}/style.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="#" class="navbar-brand d-flex align-items-center px-3 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
        </a>

        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('admin.apprenant.index')}}" class="nav-item nav-link">Students</a>
                <a href="courses.html" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Option</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Admin Management</a>
                        <a href="{{route('admin.catego.index')}}" class="dropdown-item">Module Management</a>
                        <a href="{{route('admin.course.index')}}" class="dropdown-item ">Course Management</a>
                        <a href="{{route('admin.group.index')}}" class="dropdown-item ">Group Management</a>
                        <a href="404.html" class="dropdown-item ">Certificate Management</a>
                        <a href="404.html" class="dropdown-item ">Apprenant Management</a>
                        <a href="404.html" class="dropdown-item ">list of traines</a>



                    </div>
                </div>



      @guest

      <a href="{{ route('login') }}" class="nav-item nav-link">{{ __('login') }}</a>
        @if (Route::has('register'))
        </div>
            <a href="{{ route('register') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">{{ __('Join Now') }}<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
        @endif
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Se déconnecter') }}
            </a>
            </div>
    </nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </div>
</nav>


@if(session('success'))
    <div id="success-message" class="alert alert-success" style="text-align: center;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="error-message" class="alert alert-danger" style="text-align: center;">
        {{ session('error') }}
    </div>
@endif

<script>
    // Masquer le message de succès après 10 secondes
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 10000);

    // Masquer le message d'erreur après 10 secondes
    setTimeout(function() {
        document.getElementById('error-message').style.display = 'none';
    }, 10000);
</script>




        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
