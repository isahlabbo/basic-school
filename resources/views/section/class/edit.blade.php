<div class="modal fade" id="class_{{$sectionClass->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$sectionClass->name}} Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('dashboard.section.class.update',[$sectionClass->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row from-group">
                <div class="col-md-4"><label for="">Class Name</label></div>
                <div class="col-md-8"><input type="text" name="class" value="{{$sectionClass->name}}" class="form-control"></div>
            </div><br>
            <div class="row from-group">
                <div class="col-md-4"><label for="">Class Code</label></div>
                <div class="col-md-8"><input type="text" name="code"  value="{{$sectionClass->code}}" class="form-control"></div>
            </div><br>
            <div class="row from-group">
                <div class="col-md-4"><label for="">Class Group</label></div>
                <div class="col-md-8">
                  <select name="group" id="" class="form-control">
                    <option value="{{$sectionClassGroup->id ?? ''}}">{{$sectionClassGroup->name ?? ''}}</option>
                    @foreach(App\Models\SectionClassGroup::all() as $sectionClassGroup)
                      <option value="{{$sectionClassGroup->id}}">{{$sectionClassGroup->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div><br>
            <div class="row from-group">
                <div class="col-md-4"><label for="">Year Sequence</label></div>
                <div class="col-md-8"><input type="text" name="year_sequence"  value="{{$sectionClass->year_sequence}}" class="form-control"></div>
            </div><br>
            <div class="row from-group">
                <div class="col-md-4"><label for="">Class Pass Mark</label></div>
                <div class="col-md-8">
                <select name="pass_mark" class="form-control">
                  <option value="{{$sectionClass->pass_mark}}}">{{$sectionClass->pass_mark}}</option>
                  @for($i=1; $i<=100; $i++)
                    @if($i != $sectionClass->pass_mark)
                      <option value="{{$i}}">{{$i}} %</option>
                    @endif
                  @endfor
                </select>  
            </div>
            <button class="btn btn-primary">update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>