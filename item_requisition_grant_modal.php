<a id="<?php echo $row['rq_id']; ?>" class="btn btn-xs btn-success" data-toggle="modal" data-target="#grantRequestModal-<?php echo $row['rq_id']; ?>" data-whatever="@getbootstrap" <?php echo $disabled = $row['status'] != '10' ? 'disabled':''; ?>>
    <span class="fa fa-thumbs-down"></span> Grant
</a>
<div class="modal fade" id="grantRequestModal-<?php echo $row['rq_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Grant New Item Requisition</h4>
        </div>
        <div class="modal-body">
          <h3>Are you sure you want to grant this new item requisition?</h3>
          Item Name: <?php echo $row['item_name']?><br>
          Description: <?php echo $row['description']?><br>
          Quantity: <?php echo $row['quantity']?><br>
          Requested By: <?php echo $row['rq_by']?><br>
          Date Requested: <?php echo $row['rq_date']?><br>
        </div>
        <div class="modal-footer">
          <input name="rq_id" value="<?php echo $row['rq_id']; ?>" type="hidden">
          <input type="submit" name="rq_grant" class="btn btn-danger" value="Grant Request">
        </div>
      </div>
    </div>
  </div>