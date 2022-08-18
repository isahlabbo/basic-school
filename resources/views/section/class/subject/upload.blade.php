<x-app-layout>
    @section('title')
        subjects upload
    @endsection
    @section('breadcrumb')
       
    @endsection
    @section('content')
        <table class="table">
            <thead>
                <tr>
                <th>Students</th>
                <th>Result</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($sectionClassSubject->termlyUpload($termId) as $upload)
                    <tr>
                    <td>{{count($sectionClassSubject->sectionClass->sectionClassStudents->where('status','Active'))}}</td>
                    <td>{{count($upload->studentResults)}}</td>
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$upload->id}}">Edit Upload</button></td>
                    </tr>
                    @include('section.class.subject.editUpload')
                @endforeach
            </tbody>
        </table>
    @endsection
    
</x-app-layout>
