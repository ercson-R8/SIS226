<?php 
	require_once('login.check.php');
	require_once('global_function.php');
	require_once( 'mysqli_connect.php' );

    $rq_id = $_GET['rq_id'];
    $authorizer = $_SESSION['user_id'];
    $date_authorized = date("Y-m-d G:i:s");
	$q_update = "UPDATE item_request SET status = '50',authorizer = '$authorizer', date_authorized = '$date_authorized'  WHERE rq_id = '$rq_id'";
	$result = mysqli_query($dbc, $q_update);

	mysqli_close($dbc);
?>