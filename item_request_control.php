<?php 
	require_once('mysqli_connect.php');
	require_once('global_function.php');

	$msg="";

	$item_number = $_POST['rq_item'];
	$quantity = $_POST['rq_quantity'];
	$rq_by = $_POST['rq_by'];
	$rq_date = date("Y-m-d G:i:s");
	$status = 10;

	if ( isset($_POST['send_request']) ) 
	{			
		$q_insert = "INSERT INTO item_request (item_number,quantity,rq_by,rq_date,status) 
					 VALUES ( '$item_number','$quantity','$rq_by','$rq_date','$status') ";
		$result_q = mysqli_query($dbc, $q_insert);
		

		if ( $result_q ) {
    		$msg =  '<div class="alert alert-success" role="alert">Your request has been sent successfully.</div>';
		} else {
			$msg =  '<div class="alert alert-danger" role="alert">Error: ' . $q_insert . "<br>" . mysqli_error($dbc) . '</div>';
		}
	}
?>