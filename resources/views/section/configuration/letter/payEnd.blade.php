<div class="modal fade" id="payment_note_end" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Congratulatory Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('dashboard.section.configuration.reportcard.letter.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row from-group">
                <div class="col-md-2"></div>
                <div class="col-md-8"><textarea name="payment_note_end" class="form-control">{{$letter->payment_note_end}}</textarea></div>
            </div><br>
            <button class="btn btn-primary">Save</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>