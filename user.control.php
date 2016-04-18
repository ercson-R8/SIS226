<?php

	$firstname = isset($_POST['first_name']) ? $_POST['first_name'] : '';
	$middlename = isset($_POST['middle_name']) ? $_POST['middle_name'] : '';
	$lastname = isset($_POST['last_name']) ? $_POST['last_name'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$user_role = isset($_POST['user_role']) ? $_POST['user_role'] : '';

	/*
	 * Enrypt password using salt and md5
	 */
	$salt = uniqid(mt_rand(), true);
	$password = isset($_POST['email']) ? $_POST['password'] : '';
	$hashedpw = md5( $salt.$password);

	/*
	 * Save User Record
	 */
	if (isset( $_POST['save'])) 
	{
		//Check if e-mail is already registered
		$q = "SELECT * FROM user WHERE username = '$email'";
		$result =  @mysqli_query($dbc, $q);

		//SQL insert
		$sql_insert = "INSERT INTO user (first_name,middle_name,last_name,username,password,rights)
					VALUES ('$firstname','$middlename','$lastname','$email','$hashedpw','$user_role')";

		if ( $result->num_rows > 0) {
			echo '<div class="alert alert-danger" role="alert">E-mail entered already registered.</div>';
		}else{
			if (mysqli_query($dbc, $sql_insert)) {
	    		echo '<div class="alert alert-success" role="alert">New user has been added.</div>';
			} else {
				echo "Error: " . $sql_insert . "<br>" . mysqli_error($dbc);
			}
		}
		mysqli_close($dbc);
	}//save

	/*
	 * Update User Record
	 */
	
	if ( isset( $_GET['action'] ) ) {

    	$id = $_GET['id'];
	    $sql_query = "SELECT * FROM user WHERE user_id = '$id'";
	    $result =  @mysqli_query($dbc, $sql_query); 

	    if ( isset($_POST['user_update']) ) {
			$sql_update = "UPDATE user SET first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', rights = '$user_role' WHERE user_id = '$id' ";
			if (mysqli_query($dbc, $sql_update)) {
				$result = @mysqli_query($dbc, $sql_query);
	    		$msg = '<div class="alert alert-success" role="alert">User information has been updated successfully.</div>';
			} else {
				$msg = '<div class="alert alert-danger" role="alert">Error updating record: ' . mysqli_error($dbc) . '</div>';
			}

			mysqli_close($dbc);
		}
    }

	


	/*
	 * Return role value
	 */
	function get_role( $role_id ){
		switch ( $role_id ) {
			case '4':
				return "Master Administrator";
				break;

			case '3':
				return "Administrator";
				break;

			case '2':
				return "Department Head";
				break;
			
			default:
				return "Staff";
				break;
		}

	}