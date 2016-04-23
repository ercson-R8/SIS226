<?php
	session_start();
    require_once( 'mysqli_connect.php' );
    require_once( 'global_function.php' );

    $errormsg = "";
    /*
     * Login
     */
    if (isset($_POST['login-submit'])) {
    	//Show an error if username and password are empty
    	if ( empty( $_POST['username']) || empty($_POST['password'])) {
			$errormsg = '<div class="alert alert-danger" role="alert">Username and Password are required.</div>';
    	}else{
    		 //Define username and password
			$username = $_POST['username'];
			$password = $_POST['password'];

			//Check if there is matching username and password in user table
			$q = "SELECT * FROM user WHERE username = '$username'";
			$result =  @mysqli_query($dbc, $q);
			$row = mysqli_fetch_array( $result , MYSQLI_ASSOC ); 

    		if ( $result->num_rows == 1) {
    			//Verify password at this point
    			if (password_verify($password, $row['password'])) {
				    $_SESSION['username'] = $username;
					$_SESSION['rights'] = $row['rights'];
					$_SESSION['user_id'] = $row['user_id'];
	    			header( "Location: user_edit.php" );
				}
				else {
					$errormsg = '<div class="alert alert-danger" role="alert">Please check if you enter the correct password.</div>';
				}
    		}else{
				$errormsg = '<div class="alert alert-danger" role="alert">Please check if you enter the correct username.</div>';
    		}
    	}
		mysqli_close($dbc);
     }

    /*
     * User Registration
     */
    
    if ( isset( $_POST['register-submit'] ) ) {
    	$username = isset($_POST['email']) ? $_POST['email'] : '';
    	$password = isset($_POST['password']) ? $_POST['password'] : '';
    	$confirm_password = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';
    	
    	$hashedPassword = hashPassword( $password );

    	//Check if e-mail is already registered
		$query = "SELECT * FROM user WHERE username = '$username'";
		$result =  @mysqli_query($dbc, $query);

		//SQL insert
		$sql_insert = "INSERT INTO user (first_name,middle_name,last_name,username,password,rights)
					VALUES ('','','','$username','$hashedPassword','1')";

		if ( $result->num_rows > 0) {
			$errormsg =  '<div class="alert alert-danger" role="alert">E-mail entered already registered.</div>';
		}else{
			if ( !empty( $username) && !empty( $password ) && !empty( $confirm_password ) ) {
				if ( $password == $confirm_password ) {
					if (mysqli_query($dbc, $sql_insert)) {
		    			$errormsg =  '<div class="alert alert-success" role="alert">Registration successful. You can now login</div>';
					} else {
						$errormsg =  "Error: " . $sql_insert . "<br>" . mysqli_error($dbc);
					}
				}else{
					$errormsg =  '<div class="alert alert-danger" role="alert">Password does not match.</div>';
				}
			}else{
				$errormsg =  '<div class="alert alert-danger" role="alert">E-mail, Password and Confirm Password are required.</div>';
			}
		}
		mysqli_close($dbc);
    }

    /*
     * Reset Pssword
     */
    if ( $_POST['reset-submit']) {
    	$username = isset($_POST['email']) ? $_POST['email'] : '';
		$password = generate_password(8);
    	$hashedPassword = hashPassword( $password );

		if ( empty( $username)) {
			$errormsg =  '<div class="alert alert-danger" role="alert">E-mail is required.</div>';
		}else{
			$sql_update = "UPDATE user SET password = '$hashedPassword' WHERE username = '$username' ";
			if (mysqli_query($dbc, $sql_update)) {
				$result = @mysqli_query($dbc, $sql_query);
	    		$errormsg = '<div class="alert alert-success" role="alert">New password has been sent to your email.</div>';
	    		
	    		//Send generated password to email
	    		$to = $username;
				$subject = "Do not reply: Password Reset";
				$msg = "Your new password is: ". $password;
				$headers = "From: sis226@gmailcom" . "\r\n";

				mail($to,$subject,$msg,$headers);

			} else {
				$errormsg = '<div class="alert alert-danger" role="alert">Error updating record: ' . mysqli_error($dbc) . '</div>';
			}
			mysqli_close($dbc);
		}
    }
    
    /*
     * Generate Password
     */
    function generate_password( $length = 8 ) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	    $password = substr( str_shuffle( $chars ), 0, $length );
	    return $password;
	}

?>