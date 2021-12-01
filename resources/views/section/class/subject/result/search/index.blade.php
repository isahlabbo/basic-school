<x-app-layout>
    @section('title')
        {{config('app.name')}} checking Result Center
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.result')}}
    @endsection
    @section('content')
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="card shadow">
        <div class="card-body">
        <div class="card-header text text-bold"><b>Check All {{config('app.name')}} Result Here</b></div><br>
        <form action="{{route('dashboard.section.class.subject.result.check')}}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2"><label for="">Section</label></div>
                    <div class="col-md-8">
                        <select name="section" id="" class="form-control">
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2"><label for="">Class</label></div>
                    <div class="col-md-8">
                        <select name="class" id="" class="form-control">
                            <option value="">Select Class</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2"><label for="">Subject</label></div>
                    <div class="col-md-8">
                        <select name="subject" id="" class="form-control">
                            <option value="">Select Subject</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2"><label for="">Admission No</label></div>
                    <div class="col-md-8">
                        <input type="text" placeholder="Enter Admission No" class="form-control" name="admission_no">
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-3"></div>
                        
                        <div class="col-md-8">
                            <button class="btn btn-secondary">Check Result</button>
                        </div>
                    </div>    
                </div>    
            </form>
        </div>
    </div>
    </div>
    </div>   
        
    @endsection
    
</x-app-layout>
