<?php

if (!session_start()){
    session_start();
    }

if (true) {         // (strcmp( $_SESSION["session_rights"],"admin") == 0)
	if(isset($_POST['submit'])){       // if(isset($_POST['submit'])){         // && !($_SESSION["isSessionDone"]) ){
        
        
        
        $data 	 = $_POST['data'];
	    foreach ($data as $key => $value) {
		    $data[$key] = strip_tags($value);
        }    
        $item_number = ($data['item_number']);
        $location = ($data['location']);
        $unit = ($data['unit']);
        $supplier = ($data['supplier']);        
        $item_name = ($data['item_name']);
        $brand = ($data['brand']);
        $description = ($data['description']);     
        
        require_once('mysqli_connect.php');
        
        $query = "INSERT INTO item ( item_number, location, unit,
                    supplier, name, brand, description ) 
                    VALUES 
                    ( ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssssss",$item_number, $location,
                            $unit, $supplier, $item_name, $brand,
                            $description);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        $op_status = "";
        if($affected_rows == 1){ // everything went okay
            

            $op_status="1"; // success is true | 1;
            
            /*
            *   On successful addition of an item, we will also create an auto transaction
            *   this will enable us to update the stock balance in the "stock card"
            *    
            */
            if (true){

                // transaction_id	= this is AI
                $transaction_type= 'add';
                
                $authorizer= 101; // this should be replaced with the global session user id $_SESSION["userID"];
                $requester= 101; // this should be replaced with the global session user id $_SESSION["userID"];
                //date_requested= this is auto NULL
                // $item_number= will be taken from the recently created item, from the code above.
                $quantity	= 0;
                $status	= 'Approved';
                $remarks_authorizer	= 'Authorizer not required.';
                // date_release	= this is auto NULL
                $store_manager	= 101; // this should be replaced with the global session user id $_SESSION["userID"];
                $remarks_store_manager	= 'Initial addition of an inventory item';
                $date_authorized	= date("Y-m-d");
                $date_add = date("Y-m-d");

                $query = "INSERT INTO transaction ( transaction_type, authorizer, requester,
                                                	item_number, quantity, status,
                                                    remarks_authorizer,	store_manager,
                                                    remarks_store_manager, date_authorized, date_add ) 
                            VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                // user id should also be save here
                // this will be taken from the global session var
                $stmt = mysqli_prepare($dbc, $query);
                mysqli_stmt_bind_param($stmt, "siisississs",$transaction_type, $authorizer,
                                    $requester, $item_number, $quantity, $status, $remarks_authorizer, 
                                    $store_manager, $remarks_store_manager, $date_authorized, $date_add );
                mysqli_stmt_execute($stmt);
                $last_id = mysqli_insert_id($dbc);
                $r = mysqli_stmt_affected_rows($stmt);
                $r .=$last_id;
                //echo 'from inside<br/>';
                
            } // end of transaction update 
            
            /*
            *   On successful addition of an item, we will also update the stock card
            *   this item will now have a initial stock balance of ZERO (0)
            */
            if (true){
                                
                $transaction_id = $last_id; // the recently created ID 
                $item_number = $item_number;
                // user id should also be save here
                $user_id = 101; // this will be taken from the global session var $_SESSION["userID"];
                
                $quantity_received = 0;
                $quantity_release = 0;
                $balance_stock = 0;
                $balance_available = 0;
                $date_process = date("Y-m-d"); 
                
                $query = "INSERT INTO stock ( transaction_id, item_number, user_id,
                                                	quantity_received, quantity_release, balance_stock,
                                                    balance_available,	date_process ) 
                            VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?)";
                
                
                $stmt = mysqli_prepare($dbc, $query);
                mysqli_stmt_bind_param($stmt, "isiiiiis",  $transaction_id, $item_number, $user_id, 
                                                            $quantity_received, $quantity_release, $balance_stock,
                                                            $balance_available, $date_process);
                mysqli_stmt_execute($stmt);
                $r = mysqli_stmt_affected_rows($stmt);
                
            } // end of stock update 

            
            
                
        }else {//echo 'Error Occurred<br />';
            $error_msg = mysqli_error($dbc);
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
            $op_status="0";
            
        }
    }

    $s = "Location: item_add_form.php?s=". $op_status."&n=".$item_name." r= ".$r;
    header($s);
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
    exit;
}
else {
	exit("Unautorized access!");
    
}



?>