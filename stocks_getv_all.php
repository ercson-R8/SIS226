<?php


if (!session_start()){
    session_start();
    }
?>


<table class="table table-striped table-bordered table-hover " id="dataTables-items">
    
<?php
    /*
    * fetch the data and by searching the table
    * pass the data to the script below to populate the span ids...
    */
    function queryDb( $table, $field, $key, $extra=""){
        require('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        return (mysqli_fetch_array($response));
        
    }

    if(true) {
        require_once('mysqli_connect.php');     
        // Create a query for the database
        $query ="SELECT * FROM stock GROUP BY item_number ORDER BY item_number DESC";
                
        // Get a response from the database by sending the connection
        // and the query
        $response = @mysqli_query($dbc, $query);
        // If the query executed properly, proceed
        // stock_id	transaction_id	item_number	user_id	quantity_received	
        // quantity_release			date_process	

        if($response){
            echo '
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Item No.</th>  
                    <th>Avail. Bal.</th>  
                    <th>Stock Bal.</th>

                </tr>
            </thead>
            <tbody>';

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available

            while($row = mysqli_fetch_array($response)){
                $i= $row['item_number'];
                $item = queryDb('item', 'item_number',$i);// use to fetch the item info
                $data['itemName']           = $item['name']; 
                
                
                
                echo '<tr class="center "><td>' . 
                '<a href="item_history.php?i='.$row['item_number'].'" class="btn btn-xs btn-primary">
                    <span class="fa fa-history"></span>
                </a>&nbsp;'.
                $data['itemName']           . '</td><td class="center ">' .
                $row['item_number']         . '</td><td class="center">' . 
                $row['balance_available']   . '</td><td class="center">' .
                $row['balance_stock']       . '</td class="center">' .

                '</tr>';
            }
            echo '</tbody> </table> </div>';  
            }else {
                echo "Couldn't issue database query<br />";
                echo mysqli_error($dbc);
                die();
            }
        // Close connection to the database
        mysqli_close($dbc);
    }
?>



