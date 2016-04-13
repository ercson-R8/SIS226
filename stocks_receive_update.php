<?php

    // This module is exclusive for store manager users only. 
    
    /* search table $table, user the key $key on field $field
    *  returns result in an array 
    */


    if (!session_start()){
        session_start();
    }
    echo var_dump($GLOBALS);
    /*
        array(6) { 
            ["_GET"]=> array(0) { } 
            ["_POST"]=> array(4) { 
                ["quantity"]=> string(1) "1" 
                ["userID"]=> string(1) "2" 
                ["password"]=> string(0) "" 
                ["p"]=> string(128) "4976f7ec3db249fffefc9b7ecf43ed833b935cee548a589b1c5321e189ae049214ff7336d57
                                    6f47c6714b81d0b5d413d23fa0c0cb7fcd064459cbdbd9750fadb" 
                } 
            ["_COOKIE"]=> array(1) { 
                ["PHPSESSID"]=> string(26) "0mi4qln6unpvo0iarip86faou0" } 
            ["_FILES"]=> array(0) { } 
            ["GLOBALS"]=> *RECURSION* 
            ["_SESSION"]=> &array(0) { } 
        } 
    */

    if (true) {         // (strcmp( $_SESSION["session_rights"],"admin") == 0)
        if(true){
            // sanitize the date 
            if (true){  
                $data['quantity'] = strip_tags($_POST['quantity']);
                $data['userID'] = strip_tags($_POST['userID']);
                $data['suppliedPassword'] = strip_tags($_POST['p']);
                $data['remarks_store_manager'] = strip_tags($_POST['remarks_store_manager']);
                $data['itemNumber'] = strip_tags($_POST['itemNumber']);
                $data['balance_available'] = strip_tags($_POST['balance_available']);
                $data['balance_stock'] = strip_tags($_POST['balance_stock']);
            }
            
            // fetch user info
            $row = queryDb( 'user', 'user_id',$data['userID']); 
            $data['password']      = $row['password'];
            $data['rights']      = $row['rights'];
            // verify supplied with stored password
            if (true){ // ( $data['password'] == $suppliedPassword) && ($data['rights']==2), for now assume it is true
                // create an "add" transaction and then update the stocks table
                if (true){
                    // transaction_id	= this is an AI
                    $transaction_type= 'add';
                    $authorizer= $data['user_id']; 
                    $requester= $data['user_id'];  
                    //date_requested= this is auto NULL
                    // $item_number= will be taken from the recently created item
                    $quantity	= $data['quantity'];
                    $status	= 'Approved';
                    $remarks_authorizer	= 'Authorizer not required.';
                    // date_release	= this is auto NULL
                    $store_manager	= $data['user_id']; // this should be replaced with the global session user id
                    $remarks_store_manager	= $data['remarks_store_manager'];
                    $date_authorized	= date("Y-m-d"); 
                    $date_add = date("Y-m-d");
                    
                    
                    require('mysqli_connect.php');
                    $query = "INSERT INTO transaction ( transaction_type, authorizer, requester,
                                                        item_number, quantity, status,
                                                        remarks_authorizer,	store_manager,
                                                        remarks_store_manager, date_authorized, date_add ) 
                                VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $response = @mysqli_query($dbc, $query);
                    mysqli_fetch_array($response);
                    $last_id = mysqli_insert_id($dbc);
                }
                // update the stock table/card
                if (true){
                    $transaction_id = $last_id; // the recently created ID 
                    $item_number = $data['itemNumber'];
                    // user id should also be save here
                    $quantity_received = $data['quantity'];
                    $quantity_release = 0;
                    $balance_stock = $data['balance_stock'] + $data['quantity'];
                    $balance_available = $data['balance_available']+ $data['quantity'];
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
                
                //return s=t or status is success; parameters: item+status
                      
            
            }else{
                echo'Access denied. Require appropriate clearance.';
                return false;
            }
            
            
        }
        
        
        
    }
    
    function queryDb( $table, $field, $key, $extra=""){
        require('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        return (mysqli_fetch_array($response));
        
    }