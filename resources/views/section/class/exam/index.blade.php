<x-app-layout>
    @section('title')
        {{config('app.name')}} {{$sectionClass->name}} exam setting
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
        
        heteyy
    @endsection    
</x-app-layout>
