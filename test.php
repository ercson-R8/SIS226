
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
                    //     $transaction_type= 'sub';
                    // $authorizer	= (int)$row['authorizer'];
                    // $requester	= (int)$row['requester'];
                    // $item_number= $row['itemNumber'];
                    // $quantity	= (int)$row['quantity'];
                    // $status = 'Issued';
                    // $remarks_authorizer	= $row['remarks_authorizer'];
                    // $store_manager = $data['userID'];
                    // $remarks_store_manager = $data['remarks_store_manager'];
                    // $date_authorized = $row['date_authorized'];
                    // $date_release = date("Y-m-d");
                    // $date_requested	= $row['date_requested'];
                    
                    

                    
    
    
    
    
    /*
                
    
    
    
    */
    function queryDb( $table, $field, $key, $extra=""){
        echo 'from queryDB<br/>';
        require('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        return (mysqli_fetch_array($response));
        
        
    }
    
               

    $row = queryDb('transaction', 'transaction_id', '45');
        
    echo 'row: ';
    echo var_dump($row);
    
     
     $x = 9-5;
    echo '<br/><br/> 9 - 5 = '. $x. '<br/><br/>';
    $data['userID'] = $_SESSION['user_id'];
    $row = queryDb( 'user', 'user_id',$data['userID']); 
            echo '<br/>1<br/>$row--> ';
            echo var_dump($row);

    $id = 'XX-CM-0066';
    require('mysqli_connect.php');
                    $query = "SELECT * FROM stock 
                                WHERE item_number LIKE \"$id\" 
                                ORDER BY `transaction_id` DESC";   
    $response = @mysqli_query($dbc, $query);
    $i = 0;
    while ($row= mysqli_fetch_array($response)){
        echo '<br/>row: '.$row['balance_available'];
        $data[] = $row['balance_available'];
    }
    mysqli_close($dbc);
    echo '<br/><br/><br/>data 1: '. var_dump($data);
    
    echo var_dump($row);
    /*
    array(8) { 
        ["userID"]=> string(3) "106" 
        [0]=> string(2) "35" 
        [1]=> string(2) "45" 
        [2]=> string(2) "20" 
        [3]=> string(2) "35" 
        [4]=> string(2) "45" 
        [5]=> string(2) "50" 
        [6]=> string(1) "0" }
    */
    echo '<br/>prev avail bal is: '.$data[1];
    

?>



