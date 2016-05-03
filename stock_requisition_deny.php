<?php
 	require_once('login.check.php');
	require_once('global_function.php');
	require_once( 'mysqli_connect.php' );

    $transaction_id = $_GET['transaction_id'];
    $date_authorized = date("Y-m-d G:i:s");
    $authorizer = $_SESSION['user_id'];
	$q_update = "UPDATE transaction SET status = 'Denied', date_authorized = '$date_authorized', authorizer = '$authorizer' WHERE transaction_id = '$transaction_id'";
	$result = mysqli_query($dbc, $q_update);

	mysqli_close($dbc);
?>