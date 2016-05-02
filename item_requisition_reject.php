<?php 
	require_once('global_function.php');
	require_once( 'mysqli_connect.php' );

    $rq_id = $_GET['rq_id'];
	$q_update = "UPDATE item_request SET status = '20' WHERE rq_id = '$rq_id'";
	$result = mysqli_query($dbc, $q_update);

	mysqli_close($dbc);
?>