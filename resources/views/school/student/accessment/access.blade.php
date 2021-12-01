<div class="modal fade" id="student_{{$sectionClassStudent->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$sectionClassStudent->student->admission_no}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header text-center">EFFECTIVE TRAIT</div><br>
                            @include('school.student.accessment.forms.effectiveTrait')
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header text-center">PSYCHOMOTOR</div><br>
                            @include('school.student.accessment.forms.psychomotor')
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header text-center">ATTENDANCE</div><br>
                            @include('school.student.accessment.forms.attendance')
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header text-center">FORM TEACHER REMARK</div><br>
                            @include('school.student.accessment.forms.comment')
                        </div>
                    </div>
                </div>
            </div>   
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>