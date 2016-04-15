<?php include('header.php'); ?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit User</h1>
			</div><!-- /.col-lg-12 -->

		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						Edit User Information
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form action="" method="post" role="form">
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
										<input type="text" name="username" class="form-control" >
										<p class="help-block">E-mail address will be used as your username.</p>
									</div>
									<div class="form-group">
										<label>
											Password
											<span class="asteriskField">*</span>
										</label>
										<input type="password" name="username" class="form-control" >
									</div>
									<div class="form-group">
										<label>Role</label>
										<select name="user_role" class="form-control">
											<option value="30">Staff</option>
											<option value="20">Department Head</option>
											<option value="10">Administrator</option>
											<option value="0">Master Admin</option>
										</select>
									</div>
									<div class="form-group">
										<label>Active</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="user_active">&nbsp;
										</label>
									</div>
									<div class="row">
										<div class="col-lg-4 col-lg-offset-4">
											<button type="submit" name="user_save" class="btn btn-primary btn-block">Save</button>
										</div>
										<div class="col-lg-4">
											<button type="submit" name="user_save" class="btn btn-danger btn-block">Delete</button>
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