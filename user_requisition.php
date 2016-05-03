<?php
	require_once('header.php');
	require_once('global_function.php');
	require_once( 'mysqli_connect.php' );

    $query ="SELECT t.*, i.* , u.user_id, u.last_name,u.first_name FROM transaction t, item i, user u  WHERE t.item_number = i.item_number AND t.requester = u.user_id AND t.requester = '$user_id'";
	$result = @mysqli_query( $dbc, $query );

?>
<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">My Requisition</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">&nbsp;
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-striped table-bordered table-hover" id="dataTables-requisitions-user">
									<thead>
										<th>Item Number</th>
										<th>Item Name</th>
										<th>Quantity</th>
										<th>Requested By</th>
										<th>Date Requested</th>
										<th>Status</th>
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
