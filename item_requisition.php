<?php
	require_once('header.php');
	require_once('global_function.php');
	require_once( 'mysqli_connect.php' );

	$query = "SELECT * FROM item_request";
	$result = @mysqli_query( $dbc, $query );

	$q_pending="SELECT * FROM item_request WHERE status = '10'";
	if ($result_p=@mysqli_query($dbc,$q_pending)){
		// Return the number of rows in result set
		$count_p=mysqli_num_rows($result_p);
		mysqli_free_result($result_p);
	}

	$q_granted="SELECT * FROM item_request WHERE status = '50'";
	if ($result_a=@mysqli_query($dbc,$q_granted)){
		// Return the number of rows in result set
		$count_a=mysqli_num_rows($result_a);
		mysqli_free_result($result_a);
	}

	$q_denied="SELECT * FROM item_request WHERE status = '40'";
	if ($result_r=@mysqli_query($dbc,$q_denied)){
		// Return the number of rows in result set
		$count_r=mysqli_num_rows($result_r);
		mysqli_free_result($result_r);
	}

?>
<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">New Item Requisition</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading clearfix">
						<div class="btn-group pull-right" role="group" aria-label="...">
						  <button type="button" class="btn btn-warning btn-md">( <?php echo $count_p; ?> ) Pending</button>
						  <button type="button" class="btn btn-success btn-md">( <?php echo $count_a; ?> ) Granted</button>
						  <button type="button" class="btn btn-danger btn-md">( <?php echo $count_r; ?> ) Denied</button>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-striped table-bordered table-hover" id="dataTables-requisitions">
									<thead>
										<th>Name</th>
										<th>Description</th>
										<th>Quantity</th>
										<th>Requested By</th>
										<th>Date Requested</th>
										<th>Status</th>
										<th>Action</th>
									</thead>
									<tbody>
										<?php while ( $row = $result->fetch_assoc() ) { ?>
										<tr>
											<td><?php echo $row['item_name']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td><?php echo $row['quantity']; ?></td>
											<td><?php 	
												$user_id = $row['rq_by'];
												$q_user = "SELECT * FROM user WHERE user_id = '$user_id'";
											    $result_q_user =  @mysqli_query($dbc, $q_user);
											    while ( $r = $result_q_user->fetch_assoc()) 
											    { 
													$fullname = $r['first_name'] . ' ' . $r['last_name'];
												}  ?>

												<?php echo $fullname; ?></td>
											<td><?php echo $row['rq_date']; ?></td>
											<td id="<?php echo $row['status']; ?>"><?php echo request_status($row['status']); ?></td>
											<td>
									           <?php include('item_requisition_grant_modal.php'); ?>
									           <?php include('item_requisition_reject_modal.php'); ?>
									        </td>
										</tr>
										<?php } mysqli_close( $dbc );?>
									</tbody>
								</table>
							</div>
						</div>
					</div><!-- /.panel-body-->
				</div><!-- /.panel panel-default-->
			</div><!-- /.col-lg-6 -->
	</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<?php require_once('footer.php'); ?>
<script type="text/javascript" src="js/item.js"></script>
