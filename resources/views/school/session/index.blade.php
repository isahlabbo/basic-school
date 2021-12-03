<x-app-layout>
    @section('title')
        {{config('app.name')}} academic session
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.session')}}
    @endsection
    @section('content')
        <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>ACADEMIC SESSION</th>
                <th>START AT</th>
                <th>END AT</th>
                
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($academicSessions as $academicSession)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$academicSession->name}}</td>
                    <td>{{$academicSession->start_at}}</td>
                    <td>{{$academicSession->end_at}}</td>
                    
                    <td>
                        @if($academicSession->status =='Not Active')
                            <a href="{{route('dashboard.session.activate',[$academicSession->id])}}"><button class="btn btn-success">Save as Current Session</button></a>
                        @else
                        <a href="{{route('dashboard.session.configure',[$academicSession->id])}}"><button class="btn btn-warning">Configure Academic Session</button></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{$academicSessions->links()}}
    @endsection
    
</x-app-layout>
