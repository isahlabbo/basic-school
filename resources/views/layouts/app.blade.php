<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{config('app.name')}} | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/appStyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <style>
        div.nav ul li.dropdown{
            position: relative;
            display: inline-block;
        }

        div.nav ul li.dropdown ul{
            display: none;
            position: absolute;
            list-style-type: none;
            box-shadow: 10px 6px 0px 0px rgba(0,0,0,0.2);
            background-color: #f9f9f9;
            min-width: 290px;
            padding: 5px;
            z-index: 1;
        }

        div.nav ul li.dropdown:hover div.nav ul li.dropdown ul{
            display: block;
        }
    </style>
    <!-- jquery -->
    <script src="{{asset('js/jquery-1.8.2.min.js')}}"></script>
   
    <script>
        function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
    </script>

    
    @livewireStyles
    
</head>
<body >
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div id="header">
        <div class="nav"> 
        <a href="{{url('/dashboard')}}"><img src="{{asset(config('app.logo'))}}" alt=""></a>
            <ul>
                <li class="current"><a href="{{ url('/dashboard') }}"><i class="fa fa-users"></i> Dashboard</a></li>
                
                    @if(Auth::user()->role == 'Admin')
                        @include('menu.admin')
                    @elseif(Auth::user()->role == 'Teacher')
                        @include('menu.teacher')
                    @else
                    <!-- other user here -->
                    @endif
                
                    <li>
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
    <div style="margin-left: 30px; margin-right: 30px;"> 
        @include('sweetalert::alert') 
        @yield('content')
    </div>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/Ajax/sectionClasses.js')}}"></script>
    <script src="{{asset('js/Ajax/classSubjects.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
    @livewireScripts
</body>
</html>
