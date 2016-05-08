<a id="<?php echo $row['user_id']; ?>"data-toggle="tooltip" data-placement="right" title="Remove this user!" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteUserModal-<?php echo $row['user_id']; ?>" data-whatever="@getbootstrap">
    <span class="fa fa-times-circle-o"></span>
</a>
<div class="modal fade" id="deleteUserModal-<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Delete User Record</h4>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this record?<br>
          Name: <?php echo $row['first_name'] .' '. $row['last_name']; ?><br>
          Role: <?php echo get_role( $row['rights'] ); ?>
        </div>
        <div class="modal-footer">
          <input name="user_id" value="<?php echo $row['user_id']; ?>" type="hidden">
          <input type="submit" name="del_user_record" class="btn btn-danger" value="Delete">
        </div>
      </div>
    </div>
  </div>