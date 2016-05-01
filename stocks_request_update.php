<?php

    // This module is exclusive for store manager users only. 
    
    /* search table $table, user the key $key on field $field
    *  returns result in an array 
    */


    if (!session_start()){
        session_start();
    }
    //echo var_dump($GLOBALS);
    /*
        array(6) { 
            ["_GET"]=> array(0) { } 
            ["_POST"]=> array(8) { 
                ["quantity"]=> string(2) "10" 
                ["userID"]=> string(1) "2" 
                ["itemNumber"]=> string(10) "EL-CM-0001" 
                ["availBal"]=> string(2) "40" 
                ["stockBal"]=> string(2) "50" 
                ["remarks_user_authorizer"]=> string(0) "" 
                ["authorizer"]=> string(15) "Department Head" 
                ["btnStocksReceive"]=> string(0) "" } 
            ["_COOKIE"]=> array(1) { 
                ["PHPSESSID"]=> string(26) "jidrfim0gims14ot745rmofmk1" } 
            ["_FILES"]=> array(0) { } 
            ["GLOBALS"]=> *RECURSION* 
            ["_SESSION"]=> &array(0) { } 
        } 
    */

    if (true) {         // (strcmp( $_SESSION["session_rights"],"admin") == 0)
        if(true){
            // sanitize the date 
            if (true){  
                $data['quantity'] = (int)strip_tags($_POST['quantity']);
                /* once site is live the line below will be used
                $data['userID'] = $_SESSION["userID"];
                */
                $data['userID'] = $_SESSION['user_id'];
                $data['remarks_authorizer'] = strip_tags($_POST['remarks_user_authorizer']);
                $data['itemNumber'] = strip_tags($_POST['itemNumber']);
                $data['balance_available'] = (int)strip_tags($_POST['availBal']);
                $data['balance_stock'] = (int)strip_tags($_POST['stockBal']);
                $data['authorizer'] = (int)strip_tags($_POST['authorizer']);
                
            }
            
            // fetch user info
            $row = queryDb( 'user', 'user_id',$data['userID']); 
                $data['password']      = $row['password'];
                $data['rights']      = $row['rights'];

            // verify supplied with stored password
            if (true){ // no password verification needed 
                // create an "add" transaction and then update the stocks table
                if (true){
                    // transaction_id	= this is an AI
                    $transaction_type= 'sub';
                    $authorizer= $data['authorizer']; 
                    $requester= $data['userID'];  
                    //date_requested= this is auto NULL
                    $item_number= $data['itemNumber'];
                    $quantity	= $data['quantity'];
                    $status	= 'Pending';
                    $remarks_authorizer	= $data['remarks_authorizer'];
                    // date_release	= this is auto NULL
                    $store_manager	= $data['userID']; // this should be replaced with the global session user id
                   
                    $remarks_store_manager	= "";
                    $date_requested = date("Y-m-d");
                    $date_authorized	= null; 
                    $date_add = null;

                    require('mysqli_connect.php');
                    $query = "INSERT INTO transaction ( transaction_type, authorizer, requester,
                                                        item_number, quantity, status,
                                                        remarks_authorizer,	store_manager,
                                                        remarks_store_manager, date_authorized, date_add, date_requested ) 
                                VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "siisississss",$transaction_type, $authorizer,
                                        $requester, $item_number, $quantity, $status, $remarks_authorizer, 
                                        $store_manager, $remarks_store_manager, $date_authorized, $date_add, $date_requested );
                    mysqli_stmt_execute($stmt);
                    $last_id = mysqli_insert_id($dbc);
                    $r = mysqli_stmt_affected_rows($stmt);

                   // echo"<br/>trxn: ".$r.' last id: '.$last_id;
                }
                // update the stock table/card
                if (true){
                    $transaction_id = $last_id; // the recently created transaction_id 
                    $item_number = $data['itemNumber'];
                    // user id should also be save here
                    $user_id = $data['userID'];
                    $quantity_received = 0;
                    $quantity_release = 0;
                    $balance_stock = $data['balance_stock'];
                    // deduct quantity from the available balance 
                    // $balance_available = $data['balance_available'] - $data['quantity']; 
                    // the line above will be moved to Authorize Request Function
                    $balance_available = $data['balance_available'];
                    $date_process = date("Y-m-d"); 
                    
                    $query = "INSERT INTO stock ( transaction_id, item_number, user_id,
                                                        quantity_received, quantity_release, balance_stock,
                                                        balance_available,	date_process ) 
                                VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "isiiiiis",  $transaction_id, $item_number, $user_id, 
                                                                $quantity_received, $quantity_release, $balance_stock,
                                                                $balance_available, $date_process);
                    $r=mysqli_stmt_execute($stmt);
                    $r = mysqli_stmt_affected_rows($stmt);
                    // echo '<br/>stock: '.$r;
                
                } // end of stock update 
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                //return s=t or status is success; parameters: item+status
                $s = "Location: stocks_request_form.php?i=".$data['itemNumber']."&s=".$r;
                header($s);
                exit;
            
            }else{
                echo"<script>alert('Access is denied. Elevated clearance is required.');
                </script>";
                $s = "Location: stocks_request_form.php?i=". $data['itemNumber']."&s=".$r;
                header($s);
                exit;
            }
            
            
        }
        
        
        
    }
    
    function queryDb( $table, $field, $key, $extra=""){
        require_once('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        return (mysqli_fetch_array($response));
        
    }