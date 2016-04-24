<?php 
	include('header.php');
	require_once('mysqli_connect.php');
    require_once( 'user.control.php' );
?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Manage Profile</h1>
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
						Edit Information
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<?php while ( $row = $result->fetch_assoc()) { ?>
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=edit&amp;id=<?php echo $row['user_id']; ?>" method="post" role="form">
									<div class="form-group">
										<label>
											E-mail Address
											<span class="asteriskField">*</span>
										</label>
										<input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" readonly>
									</div>
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
									<!-- TODO: only show if user role is master administrator -->
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
									<div class="row ">
										<div class="col-lg-12 text-right">
											<button id="user_update" type="submit" name="user_update" class="btn btn-primary ">Update Info</button>
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