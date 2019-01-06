<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/jquery.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <script src="{{ asset('public/js/toastr.min.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('public/css/toastr.min.css') }}">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                <!-- hàm Auth::check - kiểm tra đã đăng nhập hay chưa -->
                    @if(Auth::check())
                      <div class="col-lg-4">
                          <div class="list-group">
                              <a href="{{route('home')}}" class="list-group-item">Home</a>
                              <a href="{{route('post-create')}}" class="list-group-item">Create a new post</a>
                              <a href="{{route('post-index')}}" class="list-group-item">List post</a>
                              <a href="{{route('category-create')}}" class="list-group-item">Create a new category</a>
                              <a href="{{route('category-index')}}" class="list-group-item">List category</a>
                              <a href="{{route('tag-create')}}" class="list-group-item">Create a new tag </a>
                              <a href="{{route('tag-index')}}" class="list-group-item">List tag </a>
                              
                              <a href="{{route('profile-edit')}}" class="list-group-item">My profile </a>

                             @if(Auth::user()->admin == 1) 
                              <a href="{{route('user-index')}}" class="list-group-item">List user</a>
                              <a href="{{route('user-create')}}" class="list-group-item">Create a new user</a>
                             @endif 
                          </div>
                      </div>
                    @endif
                  
                  @if(Auth::check())
                      <div class="col-lg-8">
                        @yield('content');  
                       </div>
                  @else    
                       <div class="col-lg-12">
                           @yield('content');  
                        </div>
                  @endif
                  
                </div>
            </div>
        </main>
    </div>
   
    <script>
        @if(Session::has('success'))
           toastr.success('{{ Session::get("success") }}');
           <?php  session()->forget('success'); ?>
        @endif
        @if(Session::has('info'))
           toastr.info('{{ Session::get("info") }}');
           <?php  session()->forget('info'); ?>
        @endif
    </script>
 
</body>
</html>
