<?php 
	include('header.php');
	require_once('mysqli_connect.php');
    require_once( 'user.control.php' );
?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Manage Account Password</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<?php echo $msg; ?>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						Reset Password
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<?php while ( $row = $result->fetch_assoc()) { ?>
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=reset&amp;id=<?php echo $row['user_id']; ?>" method="post" role="form">
									<div class="form-group">
										<label>
											E-mail Address
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" readonly>
									</div>
									<div class="form-group">
										<label>
											Old Password
											<span class="asteriskField">*</span>
										</label>
										<input type="password" name="old_password" class="form-control" >
									</div>
									<div class="form-group">
										<label>
											New Password
											<span class="asteriskField">*</span>
										</label>
										<input type="password" name="new_password" class="form-control" >
									</div>
									<div class="form-group">
										<label>
											Confirm New Password
											<span class="asteriskField">*</span>
										</label>
										<input type="password" name="confirm_new_password" class="form-control" >
									</div>
									<div class="row ">
										<div class="col-lg-12 text-right">
											<button id="reset_password" type="submit" name="reset_password" class="btn btn-primary ">Reset Password</button>
										</div>
									</div>
								</form>
									<?php } mysqli_close($dbc);?>
							</div>
					</div>
					</div><!-- /.panel-body-->
				</div><!-- /.panel panel-default-->
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include('footer.php'); ?>