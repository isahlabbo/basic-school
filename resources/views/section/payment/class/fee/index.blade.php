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
        <div class="card-header text text-bold text-center shadow"><b>{{$sectionClass->name}} PAYMENT CONFIGURATION</b></div><br>
        <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>FEE NAME</th>
                    <th>FEE AMOUNT</th>
                    <th>GENDER</th>
                    <th><button data-toggle="modal" data-target="#addFee" class="btn btn-secondary">ADD FEE</button></th>
                    @include('section.payment.class.fee.add')
                </tr>
            </thead>
            <tbody>
               @foreach($sectionClass->sectionClassPayments as $sectionClassPayment)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClassPayment->name}}</td>
                    <td>{{$sectionClassPayment->amount}}</td>
                    <td>
                        @if($sectionClassPayment->gender ==1)
                            Male
                        @elseif($sectionClassPayment->gender == 2)
                            Female
                        @else
                            Both
                        @endif
                    </td>

                    <td>
                        <button data-toggle="modal" data-target="#fee_{{$sectionClassPayment->id}}" class="btn btn-secondary">Edit</button>
                         @include('section.payment.class.fee.edit')
                        <a href="{{route('dashboard.payment.class.fee.delete',[$sectionClass->id, $sectionClassPayment->id])}}">
                        <button class="btn btn-warning" onclick="return confirm('Are you sure, you want to delete this fee form the class')">Delete</button>
                        </a>
                    </td>

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
