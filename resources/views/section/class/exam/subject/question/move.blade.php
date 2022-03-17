
<div class="modal fade" id="move_{{$sectionClassSubject->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NOTE THIS OPERATION WILL MOVE ALL QUESTION TO SELECTED SUBJECT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('dashboard.section.class.exam.subject.question.move',['1','2'])}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">SUBJECT</label></div>
                        <div class="col-md-9">
                        <input type="hidden" name="exam_id" value="{{$sectionClassSubject->currentExam()->id}}">
                        <input type="hidden" name="from_subject_id" value="{{$sectionClassSubject->id}}">
                            <select name="to_subject_id" id="" class="form-control">
                                <option value="">Select Subject</option>
                                @foreach($sectionClassSubject->sectionClass->sectionclassSubjects as $subject)
                                    @if($sectionClassSubject->id != $subject->id)
                                    <option value="{{$subject->id}}">{{$subject->subject->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-secondary">MOVE ALL QUESTION</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>