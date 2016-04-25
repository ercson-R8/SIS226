<?php

    if (!session_start()){
    session_start();
    }
    /*
    array(28) { 
        [0]=> string(2) "45" ["transaction_id"]=> string(2) "45" 
        [1]=> string(3) "sub" ["transaction_type"]=> string(3) "sub" 
        [2]=> string(3) "104" ["authorizer"]=> string(3) "104" 
        [3]=> string(3) "106" ["requester"]=> string(3) "106" 
        [4]=> string(10) "2016-04-25" ["date_requested"]=> string(10) "2016-04-25"
        [5]=> string(10) "XX-CM-0001" ["item_number"]=> string(10) "XX-CM-0001" 
        [6]=> string(1) "8" ["quantity"]=> string(1) "8" 
        [7]=> string(7) "Granted" ["status"]=> string(7) "Granted" 
        [8]=> string(58) "modified stock request update.php, check if this will work" 
                        ["remarks_authorizer"]=> string(58) "modified stock request update.php, check if this will work" 
        [9]=> NULL ["date_release"]=> NULL 
        [10]=> string(3) "106" ["store_manager"]=> string(3) "106" 
        [11]=> string(0) "" ["remarks_store_manager"]=> string(0) "" 
        [12]=> NULL ["date_authorized"]=> NULL 
        [13]=> NULL ["date_add"]=> NULL }
    
    
    */

    // $data['id'] =  $_SESSION['id'];
    // $data['right'] = $_SESSION['rights'];
    // echo var_dump($_SESSION);
    // echo '<Br/>';
    // if (isset($_GET)){
    //     echo var_dump($_GET);
    // }
    function queryDb( $table, $field, $key, $extra=""){
        echo 'from queryDB';
        require_once('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        return (mysqli_fetch_array($response));
        
    }

                // create an "add" transaction and then update the stocks table
                if (true){
                     // fetch the previous transaction info. this is the request trxn
                    $row = queryDb( 'transaction', 'transaction_id',45);
                    // transaction_id	= this is an AI
                    echo '<br/><br/>$row: '.var_dump($row);
                    $transaction_type= 'sub';
                    $authorizer	= (int)$row['authorizer'];
                    $requester	= (int)$row['requester'];
                    $item_number= $row['itemNumber'];
                    $quantity	= (int)$row['quantity'];
                    $status = 'Issued';
                    $remarks_authorizer	= $row['remarks_authorizer'];
                    $store_manager = $data['userID'];
                    $remarks_store_manager = $data['remarks_store_manager'];
                    $date_authorized = $row['date_authorized'];
                    $date_release = date("Y-m-d");
                    $date_requested	= $row['date_requested'];
                    
                    // create a new transaction in response to the previous request trxn
                    // once this trxn has been created, we can now update the stocks table
                    // and adjust the available and stock balance.
                    require('mysqli_connect.php');
                    $query = "INSERT INTO transaction ( transaction_type, authorizer, requester,
                                                        item_number, quantity, status,
                                                        remarks_authorizer,	store_manager,
                                                        remarks_store_manager, date_authorized, date_requested ) 
                                VALUES                  ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "siisississs",$transaction_type, $authorizer,
                                        $requester, $item_number, $quantity, $status, $remarks_authorizer, 
                                        $store_manager, $remarks_store_manager, $date_authorized, $date_requested );
                    mysqli_stmt_execute($stmt);
                    $last_id = mysqli_insert_id($dbc);
                    $r = mysqli_stmt_affected_rows($stmt);

                    echo"<br/>trxn: ".$r.' last id: '.$last_id;
                }
                // update the stock table/card
                if (true){
                    $row = queryDb( 'stocks', 'transaction_id',$data['transaction_id']);
                    $transaction_id = $last_id; // the recently created ID 
                    // $item_number is taken from trxn table above
                    $quantity_received = 0;
                    $quantity_release = $quantity; // this is quantity the requester requested
                    $balance_stock = (int)$row['balance_stock'] - (int)$quantity_release;
                    // deduct quantity from the available balance 
                    $balance_available = $data['balance_available'] - (int)$quantity_release;
                    $date_process = date("Y-m-d"); 
                    
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
                    echo '<br/>stock: '.$r;
                
                } // end of stock update 
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                //return s=t or status is success; parameters: item+status
                $s = "Location: stocks_request_form.php?i=".$data['itemNumber']."&s=".$r;
                //header($s);
                exit;

    
    








?>
<html>
    <head>
        
    </head>
    <body>
        <br/><br/>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!--<script>
        var data = <?php //echo json_encode($_SESSION['rights']); ?>;
        $(document).ready(function(){
            if (data != '3'){
                alert('Not allowed to use this feature!');
                //window.location.assign("landing.php");
            }
        });
    </script>-->
    
    
    
    </body>
</html>
