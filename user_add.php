<?php include('header.php'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Add Users</h1>
	    </div><!-- /.col-lg-12 -->

	</div><!-- /.row -->
	<div class="row">
	    <div class="col-lg-6">
	    	<div class="panel panel-info">
		    	<div class="panel-heading">
	                User Information
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
                                	<div class="col-lg-4 col-lg-offset-8">
                                		<button type="submit" name="user_save" class="btn btn-primary btn-block">Save</button>
                                	</div>
                                </div>

	            			</form>
	            		</div>
	            	</div>
	            </div><!-- /.panel-body-->
	    </div><!-- /.panel panel-default-->
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    	<a href="user_edit.php">
                                    		<span class="fa fa-edit"></span>
                                    	</a>
                                    </td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>



<?php include('footer.php'); ?>