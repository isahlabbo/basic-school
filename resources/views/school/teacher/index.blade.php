<x-app-layout>
    @section('title')
        {{config('app.name')}} Teachers
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.teacher')}}
    @endsection
    @section('content')
        <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th></th>
                <th><a href="{{route('dashboard.teacher.create')}}">
                <button class="btn btn-primary">New Teacher</button></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$teacher->user->name}}</td>
                    <td>{{$teacher->user->email}}</td>
                    <td>{{$teacher->phone}}</td>
                    <td>
                        {{$teacher->address}}
                    </td>
                    <td>
                        
                    </td>
                    <td><button class="btn btn-secondary">Edit</button><button class="btn btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endsection
    
</x-app-layout>
