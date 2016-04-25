<a id="<?php echo $row['rq_id']; ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#rejectRequestModal-<?php echo $row['rq_id']; ?>" data-whatever="@getbootstrap" <?php echo $disabled = $row['status'] == '20' ? 'disabled':''; ?>>
    <span class="fa fa-thumbs-down"></span> Reject
</a>
<div class="modal fade" id="rejectRequestModal-<?php echo $row['rq_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Reject Request</h4>
        </div>
        <div class="modal-body">
          Are you sure you want to reject this requisition?<br>
          Item Number: <?php echo $row['item_number']?><br>
          Item Name: <?php echo $row['name']?><br>
          Quantity: <?php echo $row['quantity']?><br>
          Requested By: <?php echo $row['rq_by']?><br>
          Date Requested: <?php echo $row['rq_date']?><br>
        </div>
        <div class="modal-footer">
          <input name="rq_id" value="<?php echo $row['rq_id']; ?>" type="hidden">
          <input type="submit" name="rq_reject" class="btn btn-danger" value="Reject Request">
        </div>
      </div>
    </div>
  </div>