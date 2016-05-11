<a id="<?php echo $row['transaction_id']; ?>" class="btn btn-xs btn-success" data-toggle="modal" data-target="#denyRequestModal-<?php echo $row['transaction_id']; ?>" data-whatever="@getbootstrap" <?php echo $disabled = $row['status'] != 'Pending' ? 'disabled':''; ?>>
    <span class="fa fa-thumbs-up"></span> Grant
</a>
<div class="modal fade" id="denyRequestModal-<?php echo $row['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Grant Stock Requisition </h4>
        </div>
        <div class="modal-body">
          <h3>Are you sure you want to grant this requisition?</h3>
          Item Number: <?php echo $row['item_number']?><br>
          Item Name: <?php echo $row['name']?><br>
          Quantity: <?php echo $row['quantity']?><br>
          Requested By: <?php echo $row['first_name'].' '. $row['last_name']; ?><br>
          Date Requested: <?php echo $row['date_requested']; ?><br>
        </div>
        <div class="modal-footer">
          <input name="transaction_id" value="<?php echo $row['transaction_id']; ?>" type="hidden">
          <input type="submit" name="s_grant" class="btn btn-danger" value="Grant Request">
        </div>
      </div>
    </div>
  </div>