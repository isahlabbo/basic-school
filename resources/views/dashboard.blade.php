<x-app-layout>
    @section('title')
        Dashboard
    @endsection

    @section('menu')
        @if(Auth::user()->role == 'Admin')
            @include('menu.admin')
        @elseif(Auth::user()->role == 'Teacher')
            @include('menu.teacher')
        @else
        <!-- other user here -->
        @endif
    @endsection
    
    @section('content')
        @if(Auth::user()->role == 'Admin')
            @include('dashboard.admin')
        @elseif(Auth::user()->role == 'Teacher')
            @include('dashboard.teacher')
        @else
        <!-- other user here -->
        @endif
    @endsection
    
</x-app-layout>
