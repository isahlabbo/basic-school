
<div class="row">
    @foreach($sections as $section)
        
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-header">{{$section->name}} Section</div>
                    <table class="table">
                        <tr>
                            <td>Classes</td>
                            <td>{{count($section->sectionClasses)}}</td>
                        </tr>
                        
                    </table>
                    <div class=""><a href="{{route('dashboard.section.index',[$section->id])}}"><button class="btn btn-primary">View</button></a></div>
                </div>
            </div>
        </div>
        
    @endforeach
</div>