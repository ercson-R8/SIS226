<?php 
	require_once('header.php');

?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Request for an Item</h1>
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
						Item Request Form
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="user-add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
									<div class="form-group">
										<?php require_once('item_select_request.php'); ?>
									</div>
									<div class="form-group">
										<label>
											Quantity
											<span class="asteriskField text-danger">*</span>
										</label>
										<input type="number" name="rq_quantity" class="form-control" min="1" placeholder="Ex: 10" required>
									</div>
									<div class="form-group">
										<label>
											Requested By
										</label>
										<input type="text" name="rq_name_by" class="form-control" value="<?php echo $fullname; ?>" readonly>
									</div>
									<div class="form-group">
										<label>
											Date/Time Requested
										</label>
										<input type="text" name="rq_date" class="form-control" value="<?php echo date('d/m/Y  h:i:sa'); ?>" readonly>
										<p class="help-block"> Date Format: Day/Month/Year</p>
									</div>
									
									<div class="row">
										<div class="col-lg-4 col-lg-offset-8">
											<button type="submit" name="submit_request" class="btn btn-primary btn-block">Send Request</button>
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
						Item List
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