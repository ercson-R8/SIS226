<?php

    // This module is exclusive for store manager(3) users only. 

    if (!session_start()){
        session_start();
    }
    //echo var_dump($_POST);

    if (isset($_POST['stocksReceiveConfirm'])) {         
        if(true){
            // sanitize the date 
            if (true){  
                $data['quantity'] = (int)strip_tags($_POST['quantity']);
                /* once site is live the line below will be used
                $data['userID'] = $_SESSION["userID"];
                */
                $data['userID'] = $_SESSION['user_id'];
                $data['suppliedPassword'] = (strip_tags($_POST['password']));
                $data['remarks_store_manager'] = strip_tags($_POST['remarks_store_manager']);
                $data['itemNumber'] = strip_tags($_POST['itemNumber']);
                $data['balance_available'] = (int)strip_tags($_POST['availBal']);
                $data['balance_stock'] = (int)strip_tags($_POST['stockBal']);
            }
            
            // fetch user info
            $row = queryDb( 'user', 'user_id',$data['userID']); 
                $data['password']      = $row['password'];
                $data['rights']      = $row['rights'];
            
            //echo "<br/>suppliedPassword=".$data['suppliedPassword'];
           // echo "<br/>password=".$data['password']; 

            // verify supplied with stored password
            if ((password_verify($data['suppliedPassword'], $data['password']))){//($data['suppliedPassword']==$data['password']){ // ( $data['password'] == $suppliedPassword) 
                // create an "add" transaction and then update the stocks table
                if (true){
                    // transaction_id	= this is an AI
                    $transaction_type= 'add';
                    $authorizer= $data['userID']; 
                    $requester= $data['userID'];  
                    //date_requested= this is auto NULL
                    $item_number= $data['itemNumber'];
                    $quantity	= $data['quantity'];
                    $status	= 'Approved';
                    $remarks_authorizer	= 'Authorizer not required.';
                    // date_release	= this is auto NULL
                    $store_manager	= $data['userID']; // this should be replaced with the global session user id
                    $remarks_store_manager	= $data['remarks_store_manager'];
                    $date_authorized	= date("Y-m-d G:i:s"); 
                    $date_add = date("Y-m-d G:i:s");
                    // echo '<br/><br/>';
                    // echo var_dump($data);
                    require('mysqli_connect.php');
                    $query = "INSERT INTO transaction ( transaction_type, authorizer, requester,
                                                        item_number, quantity, status,
                                                        remarks_authorizer,	store_manager,
                                                        remarks_store_manager, date_authorized, date_add ) 
                                VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "siisississs",$transaction_type, $authorizer,
                                        $requester, $item_number, $quantity, $status, $remarks_authorizer, 
                                        $store_manager, $remarks_store_manager, $date_authorized, $date_add );
                    mysqli_stmt_execute($stmt);
                    $last_id = mysqli_insert_id($dbc);
                    $r = mysqli_stmt_affected_rows($stmt);

                    //echo"<br/>trxn: ".$r.' last id: '.$last_id;
                } // end add transaction 
                // update the stock table/card
                if (true){
                    $transaction_id = $last_id; // the recently created ID 
                    $item_number = $data['itemNumber'];
                    // user id should also be save here
                    $user_id = $data['userID'];
                    $quantity_received = $data['quantity'];
                    $quantity_release = 0;
                    $balance_stock = $data['balance_stock'] + $data['quantity'];
                    $balance_available = $data['balance_available']+ $data['quantity'];
                    $date_process = date("Y-m-d G:i:s"); 
                    
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
                $s = "Location: stocks_receive_form.php?i=".$data['itemNumber']."&s=".$r;
                header($s);
                exit;
            
            }else{
                $r = 0;
                $s = "Location: stocks_receive_form.php?i=". $data['itemNumber']."&s=".$r;
                //echo $s;
                header($s);
                exit;
            }            
        }        
    }
    
    function queryDb( $table, $field, $key, $extra=""){
        require('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        return (mysqli_fetch_array($response));
        
    }
    
    
    
    