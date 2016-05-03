<?php 
	require_once('header.php');
	require_once('item_request_control.php');

?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Request for New Item</h1>
				<p class="help-block">Request for Item not yet listed in stock.</p>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<?php echo $msg; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5">
				<div class="panel panel-info">
					<div class="panel-heading">
						New Item Request Form
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="user-add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
									<div class="form-group">
										<label>
											Item Name
											<span class="asteriskField text-danger">*</span>
										</label>
										<input type="text" name="rq_item_name" class="form-control" placeholder="Item Name" required>
									</div>
									<div class="form-group">
										<label>
											Item Description
											<span class="asteriskField text-danger">*</span>
										</label>
										<textarea name="rq_description" class="form-control" placeholder="Item Description" row="5"></textarea> 
									</div>
									<div class="form-group">
										<label>
											Quantity
											<span class="asteriskField text-danger">*</span>
										</label>
										<input type="number" name="rq_quantity" class="form-control" min="1" placeholder="Ex: 10" required>
									</div>
									<div class="form-group">
										
										<input type="hidden" name="rq_by" class="form-control" value="<?php echo $_SESSION['user_id']; ?>" readonly>
									</div>
									<div class="row">
										<div class="col-lg-4 col-lg-offset-8">
											<button type="submit" name="send_request" class="btn btn-primary btn-block">Send Request</button>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div><!-- /.panel-body-->
				</div><!-- /.panel panel-default-->
			</div><!-- /.col-lg-6 -->

			<div class="col-lg-7">
				<div class="panel panel-info">
					<div class="panel-heading">
						Stock List
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<?php require_once('item_list_request.php'); ?>
							</div>
						</div>
					</div><!-- /.panel-body-->
				</div><!-- /.panel panel-default-->
			</div><!-- /.col-lg-6 -->

			
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include('footer.php'); ?>
<script type="text/javascript" src="js/item.js"></script>