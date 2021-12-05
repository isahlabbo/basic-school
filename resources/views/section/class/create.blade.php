<div class="modal fade" id="addClass" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTER NEW {{$section->name}} CLASS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('dashboard.section.class.register',[$section->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row from-group">
                <div class="col-md-4"><label for="">Class Name</label></div>
                <div class="col-md-8"><input type="text" name="class" placeholder="{{$section->name}} CLASS NAME" value="{{old('class')}}" class="form-control"></div>
            </div>
            <div class="row from-group">
                <div class="col-md-4"><label for="">Class Code</label></div>
                <div class="col-md-8"><input type="text" name="code" placeholder="{{substr($section->name,0,1)}}A for primary A Class" value="{{old('code')}}" class="form-control"></div>
            </div>
            <button class="btn btn-primary">Register</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>