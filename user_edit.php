<?php 
	include('header.php');
	require_once('mysqli_connect.php');
    require_once( 'user.control.php' );
?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit User</h1>
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
						Edit User Information
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form action="user_edit.php?action=edit&amp;id=<?php echo $id; ?>" method="post" role="form">
								<?php while ( $row = $result->fetch_assoc()) { ?>
									<div class="form-group">
										<label>
											First Name
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>" >
									</div>
									<div class="form-group">
										<label>Middle Name</label>
										<input type="text" name="middle_name" class="form-control" value="<?php echo $row['middle_name']; ?>">
									</div>
									<div class="form-group">
										<label>
											Last Name
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" >
									</div>
									<div class="form-group">
										<label>
											E-mail Address
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" readonly>
										<p class="help-block">E-mail address will be used as your username.</p>
									</div>
									<div class="form-group">
										<label>
											Password
											<span class="asteriskField">*</span>
										</label>
										<input type="password" name="username" class="form-control" value="<?php echo $row['password']; ?>" readonly>
									</div>
									<div class="form-group">
										<label>Role</label>
										<select name="user_role" class="form-control">
											<?php
												$roles = array('1', '2', '3', '4');
												foreach ($roles as $role) {
											      	$selected = ( $row['rights'] === $role ) ? ' selected="selected"' : '';
												?>
												    <option value="<?php echo $role; ?>" <?php echo $selected; ?>> <?php echo get_role( $role ); ?></option>
											<?php } ?>

										</select>
									</div>
									<div class="row">
										<div class="col-lg-4 col-lg-offset-4">
											<button type="submit" name="user_update" class="btn btn-primary btn-block">Update</button>
										</div>
										<div class="col-lg-4">
											<button type="submit" name="user_save" class="btn btn-danger btn-block">Delete</button>
										</div>
									</div>
									<?php } mysqli_close($dbc);?>
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