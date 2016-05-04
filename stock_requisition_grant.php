<?php
 	require_once('login.check.php');
	require_once('global_function.php');
	require_once( 'mysqli_connect.php' );

    $transaction_id = $_GET['transaction_id'];
    $date_authorized = date("Y-m-d G:i:s");
    $authorizer = $_SESSION['user_id'];
    //Get quantity from tbl transaction
    $q = "SELECT item_number, quantity,requester FROM transaction  WHERE transaction_id = '$transaction_id'";
    $result_q = mysqli_query($dbc, $q);
   	while($row = mysqli_fetch_array($result_q)){
   		$item_number = $row['item_number'];
   		$rq_quantity =  $row['quantity'];
   		$requester = $row['requester'];
   	}

   	//Get available balance of item number from tbl stock
   	$q_balance = "SELECT item_number, balance_available FROM stock WHERE item_number = '$item_number' ORDER BY date_process DESC LIMIT 1";
    $r_q_balance = @mysqli_query($dbc, $q_balance);
    while($row = mysqli_fetch_array($r_q_balance)){
   		$item_number = $row['item_number'];
   		$balance_available =  $row['balance_available'];

   	}

   	//Deduct requested quantity from current available balance
   	$new_bal = $balance_available - $rq_quantity;
	$date_process = date("Y-m-d G:i:s");

	//Update request status to Granted
	$q_update = "UPDATE transaction SET status = 'Granted', date_authorized = '$date_authorized', authorizer = '$authorizer' WHERE transaction_id = '$transaction_id'";
	$result = @mysqli_query($dbc, $q_update);
	
	//INSERT new available balance
   	$q_insert = "INSERT INTO stock( transaction_id, item_number, user_id, balance_available,date_process)
   							 VALUES('$transaction_id','$item_number','$requester', '$new_bal','$date_process')";
   	$result_q_insert = @mysqli_query($dbc, $q_insert);

	mysqli_close($dbc);
?>