<?php
	require_once('global_function.php');
	require_once('mysqli_connect.php');

	$firstname = isset($_POST['first_name']) ? $_POST['first_name'] : '';
	$middlename = isset($_POST['middle_name']) ? $_POST['middle_name'] : '';
	$lastname = isset($_POST['last_name']) ? $_POST['last_name'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$user_role = isset($_POST['user_role']) ? $_POST['user_role'] : '';

	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$hashedPassword = hashPassword( $password );

	$firstname =  validate_input( $firstname );
	$middlename = validate_input( $middlename );
	$lastname = validate_input( $lastname );
	$email =  validate_input( $email );

	/*
	 * Save User Record
	 */
	if (isset( $_POST['save'])) 
	{	
		if ( !empty( $firstname ) and !empty(  $lastname ) and !empty( $email ) ) 
		{
			//Check if e-mail is already registered
			$query = "SELECT * FROM user WHERE username = '$email'";
			$result =  @mysqli_query($dbc, $query);

			//SQL insert
			$q_insert = "INSERT INTO user (first_name,middle_name,last_name,username,password,rights)
						VALUES ('$firstname','$middlename','$lastname','$email','$hashedPassword','$user_role')";
			$result_q = mysqli_query($dbc, $q_insert);

			if ( $result->num_rows > 0) {
				$msg =  '<div class="alert alert-danger" role="alert">E-mail entered already registered.</div>';
			}else{
				if ( $result_q ) {
		    		$msg =  '<div class="alert alert-success" role="alert">New user has been added.</div>';
				} else {
					$msg =  '<div class="alert alert-danger" role="alert">Error: ' . $q_insert . "<br>" . mysqli_error($dbc) . '</div>';
				}
			}
		}else{
				$msg =  '<div class="alert alert-danger" role="alert">First Name, Last Name and E-mail address are required fields.</div>';
		}

		mysqli_close($dbc);
	}//save

	/*
	 * Update User Profile
	 */
	if ( isset( $_GET['action'] ) && $_GET['action'] == "edit" ) 
	{
		$id = $_GET['id'];
		$query = "SELECT * FROM user WHERE user_id = '$id'";
    	$result =  @mysqli_query($dbc, $query);
		
		if ( !empty( $firstname ) and !empty(  $lastname ) ) 
		{
			if ( isset( $_POST['user_update'] ) ) 
			{
				$q_update = "UPDATE user SET first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', rights = '$user_role' WHERE user_id = '$id' ";
				$result_q = mysqli_query($dbc, $q_update);

				if ( $result_q ) 
				{
		    		$msg = '<div class="alert alert-success" role="alert">Profile has been updated successfully.</div>';
		    	    $result =  @mysqli_query($dbc, $query);

				} else {
					$msg = '<div class="alert alert-danger" role="alert">Error updating record: ' . mysqli_error($dbc) . '</div>';
				}

				mysqli_close($dbc);
		    }
		} else{
			$msg =  '<div class="alert alert-danger" role="alert">First Name and Last Name are required fields.</div>';
		}
	}
    /*
     * Reset Password
     */
    
    if ( isset( $_GET['action'] ) && $_GET['action'] == "reset" ) 
    {
		$id = $_GET['id'];
		$query = "SELECT * FROM user WHERE user_id = '$id'";
    	$result =  @mysqli_query($dbc, $query);

	    if ( isset($_POST['reset_password']) ) 
	    {
	    	$old_pw = $_POST['old_password'];
	    	$new_pw = $_POST['new_password'];
	    	$confirm_new_pw = $_POST['confirm_new_password'];

	    	$hashedPassword = hashPassword( $new_pw );
			$row = mysqli_fetch_array( $result , MYSQLI_ASSOC );

			if ( $result->num_rows == 1 ) 
			{
				if ( password_verify( $old_pw, $row['password'] ) ) 
				{
					if ( $new_pw == $confirm_new_pw ) 
					{
						$q_update = "UPDATE user SET password = '$hashedPassword' WHERE user_id= '$id' ";
						$result_q = mysqli_query($dbc, $q_update);

						if ( $result_q ) 
						{
				    		$msg = '<div class="alert alert-success" role="alert">Your password has been reset successfully.</div>';
						} else {
							$msg = '<div class="alert alert-danger" role="alert">Error updating record: ' . mysqli_error($dbc) . '</div>';
						}
					}else{
						$msg = '<div class="alert alert-danger" role="alert">New Password and Confirm New Password did not match.</div>';
					}
				}else{
						$msg = '<div class="alert alert-danger" role="alert">Incorrect Old Password.</div>';
				}
			}

		    $result =  @mysqli_query($dbc, $query);

			mysqli_close($dbc);
	    }	
	}
