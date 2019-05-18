<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        You are about to delete this company!
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="" method="post" id="confirmation_modal_form">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary">Okay</button>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
