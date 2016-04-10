<?php 

require_once('mysqli_connect.php'); 

if (!session_start()){
	session_start();
}

if(true){
    $itemNumber= strip_tags($_GET['v']);
    // Get a connection for the database
    require_once('mysqli_connect.php');     
    // Create a query for the database
    if(true){
        $query ="SELECT item_number
                    FROM item
                    WHERE item_number = '".$itemNumber."' 
                ";
        $response = @mysqli_query($dbc, $query);

        if($response) {
            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available
            $i = 0;
            $result = "";
            while($row = mysqli_fetch_array($response)){
                    $i += 1;
            } 
            echo $i;
            exit;
                   
        }  
        else {
            echo mysqli_error($dbc);
            die();
        }
        die();
        
    }
        

}