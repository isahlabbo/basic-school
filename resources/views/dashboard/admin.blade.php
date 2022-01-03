
<div class="row">
        
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-header shadow">SCHOOL SECTIONS</div>
                    <table class="table">
                        <tr>
                            <td>SECTIONS</td>
                            <td>{{count($sections)}}</td>
                        </tr>
                        
                    </table>
                    <div class=""><a href="{{route('dashboard.section.index')}}"><button class="btn btn-secondary">VIEW SECTIONS</button></a></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-header shadow">TEACHERS</div>
                    <table class="table">
                        <tr>
                            <td>TEACHERS</td>
                            <td>{{count($teachers)}}</td>
                        </tr>
                        
                    </table>
                    <div class=""><a href="{{route('dashboard.teacher.index')}}"><button class="btn btn-secondary">VIEW TEACHERS</button></a></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-header shadow">ACADEMIC CALENDER</div>
                    <table class="table">
                        <tr>
                            <td>SESSION</td>
                            <td>{{$session->currentSession()->name}}</td>
                        </tr>
                        <tr>
                            <td>CURRENT TERM</td>
                            <td>{{$session->currentSessionTerm()->term->name}}</td>
                        </tr>
                        <tr>
                            <td>COUNT</td>
                            <td>{{$session->currentSessionTerm()->countDown()}} Remains</td>
                        </tr>
                    </table>
                    <div class=""><a href="{{route('dashboard.session.configure',[$session->currentSession()->id])}}"><button class="btn btn-secondary">VIEW CALENDAR</button></a></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-header shadow">RESULTS</div>
                    <table class="table">
                        <tr>
                            <td>RESULTS</td>
                            <td></td>
                        </tr>
                    </table>
                    <div class=""><a href="{{route('dashboard.section.class.subject.result.index')}}"><button class="btn btn-secondary">SEARCH RESULT</button></a></div>
                </div>
            </div>
        </div>
        
    
</div>