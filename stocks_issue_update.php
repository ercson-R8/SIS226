<?php

    // This module is exclusive for store manager users only. 
    /* search table $table, user the key $key on field $field
    *  returns result in an array 
    */
    if (!session_start()){
        session_start();
    }
    if (isset($_POST['stocksIssueConfirm'])) {
        echo 'now inside post submit<br/><br/>'; 
        if(true){
            // sanitize the date 
            if (true){  
                $data['userID'] = (int)$_SESSION['user_id'];
                $data['remarks_store_manager'] = strip_tags($_POST['remarks_store_manager']);
                $data['password'] = strip_tags($_POST['password']);
                $data['transaction_id'] = (int)strip_tags($_POST['transaction_id']);
            }       
            $row = queryDb( 'user', 'user_id',$data['userID']);            
            // verify supplied with stored password
            if ((password_verify($data['password'], $row['password']))){ 
                if (true){
                     // fetch the previous transaction info. this is the request trxn
                    $transaction_id = $data['transaction_id']; // the old one
                    {
                        // Change the status of the current rq trxn from Granted to Approved
                        require('mysqli_connect.php');
                        $status = "Approved";
                        $query ="UPDATE transaction 
                                    SET status = \"$status\" 
                                    WHERE transaction_id = \"$transaction_id\"
                                    ";
                        $stmt = mysqli_prepare($dbc, $query);
                        mysqli_stmt_bind_param($stmt, "s", $status);
                        mysqli_stmt_execute($stmt);
                        $affected_rows = mysqli_stmt_affected_rows($stmt);
                        mysqli_stmt_close($stmt);
                        mysqli_close($dbc);
                    }

                    // create a "sub" transaction using the rqt trxn id                    
                    $row = queryDb('transaction', 'transaction_id', $data['transaction_id']);
                    $transaction_type= 'sub';
                    $authorizer = (int)$row['authorizer'];
                    $requester  = (int)$row['requester'];
                    $item_number= $row['item_number'];
                    $quantity   = (int)$row['quantity'];
                    $status = 'Issued';
                    $remarks_authorizer = $row['remarks_authorizer'];
                    $store_manager = $data['userID'];
                    $remarks_store_manager = $data['remarks_store_manager'];
                    $date_authorized = $row['date_authorized'];
                    $date_release = date("Y-m-d G:i:s");
                    $date_requested = $row['date_requested'];
                    
                    // fetch the prior trxn which contains the recent/accurate available/stock balance
                    require('mysqli_connect.php');
                    $query = "SELECT * FROM stock 
                                WHERE item_number LIKE \"$item_number\" 
                                ORDER BY `transaction_id` DESC";   
                    $response = @mysqli_query($dbc, $query);
                    while ($row= mysqli_fetch_array($response)){
                        $prevAvail[] = $row['balance_available'];
                        $prevStockp[] = $row['balance_stock'];
                    }
                    $prevAvailBalance = $prevAvail[0]; 
                    $prevStoclBalance = $prevStockp[0];
                    mysqli_close($dbc);
                    
                    // create a new transaction in response to the previous request trxn
                    // once this trxn has been created, we can now update the stocks table
                    // and adjust the available and stock balance.
                    require('mysqli_connect.php');
                    $query = "INSERT INTO transaction ( transaction_type, authorizer, requester,
                                                        item_number, quantity, status,
                                                        remarks_authorizer, store_manager,
                                                        remarks_store_manager, date_authorized, date_requested ) 
                                VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "siisississs",$transaction_type, $authorizer,
                                        $requester, $item_number, $quantity, $status, $remarks_authorizer, 
                                        $store_manager, $remarks_store_manager, $date_authorized, $date_requested );
                    mysqli_stmt_execute($stmt);
                    $last_id = mysqli_insert_id($dbc);
                    $r = mysqli_stmt_affected_rows($stmt);
                    echo"<br/><br/><br/>trxn: ".$r.' last id: '.$last_id;

                }
                    // update the stock table/card                   
                if (true){

                    $row = queryDb( 'stock', 'transaction_id', $data['transaction_id']);
                    // $item_number is taken from trxn table above
                    $transaction_id = $last_id;
                    $quantity_received = 0;
                    $quantity_release = $quantity; // this is quantity the requester requested
                    $balance_stock = (int)$prevStoclBalance - $quantity_release;
                    // the available balance will remain the same
                    $balance_available = $prevAvailBalance;
                    $date_process = date("Y-m-d G:i:s");
                    
                    $query = "INSERT INTO stock ( transaction_id, item_number, user_id,
                                                        quantity_received, quantity_release, balance_stock,
                                                        balance_available,	date_process ) 
                                VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "isiiiiis",  $transaction_id, $item_number, $data['userID'], 
                                                                $quantity_received, $quantity_release, $balance_stock,
                                                                $balance_available, $date_process);
                    $r=mysqli_stmt_execute($stmt);
                    $r = mysqli_stmt_affected_rows($stmt);
                
                } // end of stock update 
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                //return s=t or status is success; parameters: item+status
                $s = "Location: stocks_issue_form.php?i=".$data['transaction_id']."&s=".$r;
                header($s);
                exit;
            
            }else{
                
                $s = "Location: stocks_issue_form.php?i=". $data['transaction_id']."&s=".$r;
                header($s);
                exit;
            }

        }        
        
    }
    
    function queryDb( $table, $field, $key, $extra=""){
        echo '<br/>from queryDB';
        require('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        mysqli_close($dbc);
        return (mysqli_fetch_array($response));
    }
    
