<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title','Home')</title>
  <!-- Styles -->
  <link href="{{ asset('css/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
  <style>
  html, body {
    background-image: url('https://cutewallpaper.org/21/white-hd-wallpaper/White-Wallpapers-in-HD-Barbaras-HD-Wallpapers.jpg');
    background-size: cover;
  }
</style>
</head>
<body>
  <div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <!-- Future Left Side Links -->
            @guest
            @else
            @if (Auth::user()->getRole() == 1)
            <a class="navbar-brand" href="{{ route('home.user') }}">
              {{__('user.home')}}
            </a>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('training.list') }}">{{__('training.training')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('record.list') }}">{{__('record.record')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('appointment.listUser', Auth::user()->getId()) }}">{{__('appointment.appointment')}}</a>
            </li>
            @endif
            @if (Auth::user()->getRole() == 2)
            <a class="navbar-brand" href="{{ route('home.trainer') }}">
              {{__('user.home')}}
            </a>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.search') }}">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('appointment.listTrainer', Auth::user()->getId()) }}">{{__('appointment.appointment')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('exercise.list') }}">{{__('excercise.excercise')}}</a>
            </li>
            @endif
            @if (Auth::user()->getRole() == 3)
            <a class="navbar-brand" href="{{ route('home.admin') }}">
              {{__('user.home')}}
            </a>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.listUsersAdmin') }}">{{__('user.user')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.listTrainersAdmin') }}">{{__('user.trainer')}}</a>
            </li>
            @endif
            @endguest
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->

            @guest
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
          <li class="nav-item">
            <a class="nav-link" href="{{ url('locale/en') }}" > EN </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('locale/es') }}" > ES </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="py-4">
    @yield('content')
  </main>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@isset($chart)
{!! $chart->script() !!}
@endisset
</html>
