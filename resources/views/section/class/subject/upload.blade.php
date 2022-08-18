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
                </tr>
            </thead>
            <tbody>
                @foreach($sectionClassSubject->termlyUpload($termId) as $upload)
                    <tr>
                    <td>{{count($sectionClassSubject->sectionClass->sectionClassStudents->where('status','Active'))}}</td>
                    <td>{{count($upload->studentResults)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
    
</x-app-layout>
