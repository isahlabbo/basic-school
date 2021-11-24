<x-app-layout>
    @section('title')
        Dashboard
    @endsection

    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
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
