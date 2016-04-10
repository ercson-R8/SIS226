<?php

if (!session_start()){
    session_start();
    }

if (true) {    
    require_once('mysqli_connect.php');
    
            
            
            
            /*
            *   On successful addition of an item, we will also update the stock card
            *   this item will now have a initial stock balance of ZERO (0)
            */
            if (true){
                $last_id = 48;
                $item_number='EL-CM-0000';
                
                $transaction_id = $last_id; // the recently created ID 
                $item_number = $item_number;
                // user id should also be save here
                $user_id = 1; // this will be taken from the global session var
                
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
                $s = "<br/>from stock update R: ".$r;
                echo ($s);
                $r = mysqli_stmt_affected_rows($stmt);
                $s = "<br/>from stock update R: ".$r;
                echo ($s);
                
            } // end of stock update 
            		
            

            
            // close the DB connection 
            mysqli_stmt_close($stmt);
            mysqli_close($dbc); 
            
                
}


    
    exit;


?>