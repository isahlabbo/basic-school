<div class="modal fade" id="addSection" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTER NEW SECTION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('dashboard.section.register')}}" method="post">
            @csrf
            <div class="row from-group">
                <div class="col-md-4"><label for="">Section Name</label></div>
                <div class="col-md-8"><input type="text" name="name" placeholder="PRIMARY" value="{{old('class')}}" class="form-control"></div>
            </div><br>
            <div class="row from-group">
                <div class="col-md-4"><label for="">Duration In Years</label></div>
                <div class="col-md-8"><input type="number" name="duration" placeholder="6 Years" value="{{old('class')}}" class="form-control"></div>
            </div><br>
            <div class="row from-group">
                <div class="col-md-4"><label for="">Section Level</label></div>
                <div class="col-md-8">
                  <select name="level" class="form-control" id="">
                  <option value="">Section Level</option>
                  @for($level = 1; $level <= count(App\Models\Section::all())+1;$level++)
                    <option value="{{$level}}">Level {{$level}}</option>
                  @endfor
                  </select>
                </div>
            </div><br>
            <br>
            <button class="btn btn-primary">Register</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>