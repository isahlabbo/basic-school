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
        <h1>{{Auth::user()->role}} Dashboard</h1> 
    @endsection
    
</x-app-layout>
