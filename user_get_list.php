<?php
    require_once( 'mysqli_connect.php' ); 
    require_once( 'user.control.php' );

    if ( isset($_GET['q']) ) {
    	$q = $_GET['q'];
		$sql_query = "SELECT * FROM user WHERE last_name LIKE '%$q%'";
    }else{
    	$sql_query = "SELECT * FROM user";
    }
	
	$result =  @mysqli_query($dbc, $sql_query);
	
?>
<div class="row">
	<div class="centered-block">&nbsp;</div>
	<div class="col-lg-12">
		<?php if ( isset( $_GET['q'] ) ): ?>
			<p class="text-info">Total Registered Users: <?php echo $result->num_rows; ?></p>
		<?php endif ?>
	</div>
	<div class="col-lg-12">
		<table class="table table-striped table-bordered table-hover" id="userTable">
		    <thead>
		            <th></th>
		            <th>Last Name</th>
		            <th>First Name</th>
		            <th>Middle Name</th>
		            <th>E-mail Address / Username</th>
		            <th>Role</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php 
		     	while ( $row = $result->fetch_assoc()) {
				$params = '&amp;id=' . $row['user_id'];
			?>
	      	<tr class="odd gradeX">
		        <td>
		            <a href="user_edit.php?action=edit<?php echo $params; ?>" class="btn btn-xs btn-primary">
		                <span class="fa fa-edit"></span>
		            </a>
		            <a href="user_delete.php" id="<?php echo $row['user_id']; ?>" class="btn btn-xs btn-danger">
		                <span class="fa fa-times-circle-o"></span>
		            </a>
		        </td>
		       
		        <td><?php echo $row['last_name'] ?></td>
		        <td><?php echo $row['first_name']; ?></td>
		        <td><?php echo $row['middle_name']; ?></td>
		        <td><?php echo $row['username']; ?></td>
		        <td><?php echo get_role($row['rights']); ?></td>
		    </tr>
		    <?php }	?>
			</tbody>
		</table>	
	</div>
</div>
	 

	

