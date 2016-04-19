<?php
	session_start();
    require_once( 'mysqli_connect.php' );

    $errormsg = "";

    if (isset($_POST['login-submit'])) {
    	//Show an error if username and password are empty
    	if ( empty( $_POST['username']) || empty($_POST['password'])) {
			$errormsg = '<div class="alert alert-danger" role="alert">Username and Password are required.</div>';
    	}else{
    		//Define username and password
    		$username = $_POST['username'];
    		$password = $_POST['password'];

    		$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($dbc, $username);
			$password = mysqli_real_escape_string($dbc, $password);

			// $salt = uniqid(mt_rand(), true);
			$password = md5($password);

			//Check if there is matching username and password in user table
			$sql_query = "SELECT user_id FROM user WHERE username = '$username' and password = '$password'";
			$result =  @mysqli_query($dbc, $sql_query);

			$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 

			//Now create a session if username and password exists
			
    		if ( $result->num_rows == 1) {
    			$_SESSION['id'] = $username;
    			header( "Location: user_view.php" );
    			// echo $_SESSION['id'];
    		}else{
				$errormsg = '<div class="alert alert-danger" role="alert">Please check if you enter the correct username and password.</div>';
    		}
    	}
     } 

?>