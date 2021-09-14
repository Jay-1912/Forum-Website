<?php
   use App\Models\setting;
   $settings = setting::first();
?>

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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @toastr_css


</head>
<body>
    <div class="container-fluid">
        <!-- First section -->
        <nav class="navbar navbar-dark bg-dark">
          <div class="container">
            <h1>
            @if($settings->forum_name)
                <a href="/" class="navbar-brand">{{$settings->forum_name}}</a>
            @else
                <a href="/" class="navbar-brand">Laravel Forum</a>
            @endif
            </h1>
            <form action="{{route('category.search')}}" method="POST" class="form-inline mr-3 mb-2 mb-sm-0">
                @csrf
                <input type="text" name="keyword" class="form-control" placeholder="search" />
              <button type="submit" class="btn btn-success">Search Forum</button>
            </form>
            @guest
                <a href="{{route('login')}}" class="nav-item nav-link text-white btn btn-dark">Login</a>
                <a href="{{route('register')}}" class="nav-item nav-link text-white btn btn-dark">Register</a>
            @endguest

            @auth
                <form id="logout-form" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @endauth

          </div>
        </nav>

        <!-- first section end -->
      </div>
      <div class="container">
        <nav class="breadcrumb">
          <a href="#" class="breadcrumb-item active"> Dashboard</a>
        </nav>

        @yield('content')
                        <!-- Authentication Links -->
                        {{-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
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
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>

    <div class="container-fluid">
        <footer class="small bg-dark text-white">
          <div class="container py-4">
            <ul class="list-inline mb-0 text-center">
              <li class="list-inline-item">
                &copy; 2021 Simon's tech school forum
              </li>
              <li class="list-inline-item">All rights reserved</li>
              <li class="list-inline-item">Terms and privacy policy</li>
            </ul>
          </div>
        </footer>
    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @jquery
    @toastr_js
    @toastr_render
</body>
</html>
