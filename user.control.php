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
	 * SQL Query Insert User data
	 */
	$sql_insert = "INSERT INTO user (first_name,middle_name,last_name,username,password,rights)
					VALUES ('$firstname','$middlename','$lastname','$email','$hashedpw','$user_role')";

	/*
	 * Save User Record
	 */
	
	if (isset( $_POST['save'])) 
	{
		//Check if e-mail is already registered
		$q = "SELECT * FROM user WHERE username = '$email'";
		$result =  @mysqli_query($dbc, $q);

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
	}		