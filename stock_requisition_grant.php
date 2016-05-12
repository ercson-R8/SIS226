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
	   
	echo "<script> 
			alert('". $balance_available. "');
			</script>";   

   	//Deduct requested quantity from current available balance
   	$new_bal = $balance_available - $rq_quantity;
	$date_process = date("Y-m-d G:i:s");
	
	// Update the stock table with new avail bal
	// with ref to the $transaction_id
	$q_update = "UPDATE stock
					 SET balance_available = '$new_bal'
					 WHERE transaction_id = '$transaction_id'
					 ";
	$result = @mysqli_query($dbc, $q_update);
	

	//Update request status to Granted
	$q_update = "UPDATE transaction SET status = 'Granted', date_authorized = '$date_authorized', authorizer = '$authorizer' WHERE transaction_id = '$transaction_id'";
	$result = @mysqli_query($dbc, $q_update);
	


	mysqli_close($dbc);
?>