<x-app-layout>
    @section('title')
        {{config('app.name')}} payment
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
    <div class="row">
    <div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
        <div class="card-header text text-bold text-center shadow"><b>SEARCH ALL {{$sectionClass->name}} PAYMENT FOR {{$sectionClass->currentSession()->name}}</b></div><br>
        <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>STUDENT NAME</th>
                    <th>GUARDIAN NAME</th>
                    <th>GUARDIAN PHONE</th>
                    <th>GUARDIAN ADDRESS</th>
                    <th>PAID AMOUNT</th>
                    <th>PENDING PAYMENT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach($sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClassStudent->student->name}}</td>
                    <td>{{$sectionClassStudent->student->guardian->name}}</td>
                    <td>{{$sectionClassStudent->student->guardian->phone}}</td>
                    <td>{{$sectionClassStudent->student->guardian->address}}</td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-secondary">Add Payment</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>   
        
    @endsection
    
</x-app-layout>
