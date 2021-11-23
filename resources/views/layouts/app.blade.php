<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{config('app.name')}} | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tailwind.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/appStyle.css')}}">
    
    @livewireStyles
</head>
<body class="bg-white">
    <div id="header">
        <div> <a href="{{url('/dashboard')}}"><img src="assets/images/logo.gif" alt=""></a>
            <ul>
                <li class="current"><a href="{{ url('/dashboard') }}">Dasborad</a></li>
                @yield('menu')
                <li class="">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <hr class="separator">
    </div>
    <div class="content">  
        @yield('content')
         
    </div>
    @stack('modals')
    @livewireScripts
</body>
</html>
