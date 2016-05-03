<?php
	require_once('header.php');
	require_once('global_function.php');
	require_once( 'mysqli_connect.php' );

	// $query = "SELECT i.name, s.* FROM item i, item_request s WHERE i.item_number = s.item_number";
	// $query = "SELECT * FROM item_request";
    $query ="SELECT t.*, i.* , u.user_id, u.last_name,u.first_name FROM transaction t, item i, user u  WHERE t.item_number = i.item_number AND t.requester = u.user_id";
	$result = @mysqli_query( $dbc, $query );

	$q_pending="SELECT * FROM transaction WHERE status = 'Pending'";
	if ($result_p=@mysqli_query($dbc,$q_pending)){
		// Return the number of rows in result set
		$count_p=mysqli_num_rows($result_p);
		mysqli_free_result($result_p);
	}

	$q_approved="SELECT * FROM transaction WHERE status = 'Granted'";
	if ($result_a=@mysqli_query($dbc,$q_approved)){
		// Return the number of rows in result set
		$count_a=mysqli_num_rows($result_a);
		mysqli_free_result($result_a);
	}

	$q_reject="SELECT * FROM transaction WHERE status = 'Denied'";
	if ($result_r=@mysqli_query($dbc,$q_reject)){
		// Return the number of rows in result set
		$count_r=mysqli_num_rows($result_r);
		mysqli_free_result($result_r);
	}

?>
<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Stock Requisition</h1>
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
								<table class="table table-striped table-bordered table-hover" id="dataTables-stock-requisitions">
									<thead>
										<th>Item Number</th>
										<th>Item Name</th>
										<th>Quantity</th>
										<th>Requested By</th>
										<th>Date Requested</th>
										<th>Status</th>
										<th>Action</th> 
									</thead>
									<tbody>
										<?php while ( $row = $result->fetch_assoc() ) { ?>
										<tr>
											<td><?php echo $row['item_number']; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['quantity']; ?></td>
											<td><?php echo $row['first_name'].' '. $row['last_name']; ?></td>
											<td><?php echo $row['date_requested']; ?></td>
											<td><?php echo $row['status']; ?></td>
											
											<td>
									           <?php include('stock_requisition_grant_modal.php'); ?>
									           <?php include('stock_requisition_deny_modal.php'); ?>
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
