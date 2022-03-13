
<div class="modal fade" id="subject_{{$sectionClassSubject->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD {{$sectionClassSubject->subject->name}} QUESTION FOR {{$sectionClassSubject->sectionClass->name}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('dashboard.section.class.exam.question.add',[$sectionClassSubject->sectionclass->id])}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$exam->id}}" name="section_class_termly_exam_id">
                    <input type="hidden" value="{{$sectionClassSubject->id}}" name="section_class_subject_id">
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">Question</label></div>
                        <div class="col-md-9">
                            <textarea name="question" id="" cols="40" rows="4" placeholder="Please write your question statement here"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">Question Type</label></div>
                        <div class="col-md-9">
                            <select name="question_type_id" id="" class="form-control">
                                <option value="">Question Type</option>
                                @foreach(App\Models\QuestionType::all() as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">Diagram</label></div>
                        <div class="col-md-9">
                            <input type="file" name="diagram" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">Option A</label></div>
                        <div class="col-md-9">
                            <input type="text" name="A" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">Option B</label></div>
                        <div class="col-md-9">
                            <input type="text" name="B" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">Option C</label></div>
                        <div class="col-md-9">
                            <input type="text" name="C" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"><label for="">Option D</label></div>
                        <div class="col-md-9">
                            <input type="text" name="D" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-secondary">ADD QUESTION</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>