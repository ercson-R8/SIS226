<?php 

	include('header.php');
	require_once('mysqli_connect.php');

?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Users</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<?php require_once('user.control.php'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						User Information
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="user-add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
									<div class="form-group">
										<label>
											First Name
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="first_name" class="form-control" >
									</div>
									<div class="form-group">
										<label>Middle Name</label>
										<input type="text" name="middle_name" class="form-control" >
									</div>
									<div class="form-group">
										<label>
											Last Name
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="last_name" class="form-control" >
									</div>
									<div class="form-group">
										<label>
											E-mail Address
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="email" class="form-control" >
										<p class="help-block">E-mail address will be used as your username.</p>
									</div>
									<div class="form-group">
										<label>
											Password
											<span class="asteriskField">*</span>
										</label>
										<input type="password" name="password" class="form-control" >
									</div>
									<div class="form-group">
										<label>Role</label>
										<select name="user_role" class="form-control">
											<option value="1" selected >Staff</option>
											<option value="2">Department Head</option>
											<option value="3">Administrator</option>
											<option value="4">Master Administrator</option>
										</select>
									</div>
									<div class="row">
										<div class="col-lg-4 col-lg-offset-8">
											<button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
										</div>
									</div>

								</form>
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