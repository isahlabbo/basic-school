<div class="modal fade" id="psychomotor" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Psychomotor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('dashboard.section.configuration.reportcard.psychomotor.register')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row from-group">
                <div class="col-md-4"><label for="">Name</label></div>
                <div class="col-md-8"><input type="text" name="name" value="{{old('name')}}" class="form-control"></div>
            </div><br>
            <button class="btn btn-primary">Register</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>