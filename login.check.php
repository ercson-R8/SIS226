<?php 
    session_start();
    require_once( 'mysqli_connect.php' );

    $username = $_SESSION['username'];
    $q = "SELECT * FROM user WHERE username = '$username'";
    $result =  @mysqli_query($dbc, $q);
    
    while ( $row = $result->fetch_assoc()) 
    { 
		$fullname = $row['first_name'] . ' ' . $row['last_name'];
        $u_role = $row['rights'];
	} 
    
    if( !isset(  $username ) ){
        header("Location: index.php");
    }

?>