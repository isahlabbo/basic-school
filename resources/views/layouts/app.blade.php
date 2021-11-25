<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{config('app.name')}} | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/appStyle.css')}}">
    <!-- jquery -->
    <script src="{{asset('js/jquery-1.8.2.min.js')}}"></script>
    @livewireStyles
</head>
<body >
    <div id="header">
        <div> <a href="{{url('/dashboard')}}"><img src="{{asset('assets/images/logo.gif')}}" alt=""></a>
            <ul>
                <li class="current"><a href="{{ url('/dashboard') }}">Dasborad</a></li>
                
                    @if(Auth::user()->role == 'Admin')
                        @include('menu.admin')
                    @elseif(Auth::user()->role == 'Teacher')
                        @include('menu.teacher')
                    @else
                    <!-- other user here -->
                    @endif
                <li class="">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Log out') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <hr class="separator">
    </div>
    <div >
        @yield('breadcrumb')
    </div>
    <div class="container"> 
        @include('sweetalert::alert') 
        @yield('content')
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/Ajax/sectionClasses.js')}}"></script>
    @livewireScripts
</body>
</html>
