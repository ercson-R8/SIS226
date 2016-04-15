<?php
/*
* this page will be called by item_history.php and will fetch the i parameter from the item_view.php 
* the i parameter contains the item number 
*/

    if (!session_start()){
        session_start();
        }  
?>

<table class="table table-striped table-bordered table-hover " id="dataTables-items">


<?php
    if(true) {
        require_once('mysqli_connect.php');     
        $itemNumber = strip_tags($_GET["i"]);
        
        $query ="SELECT transaction_id,
                        item_number,
                        user_id,
                        quantity_received,
                        quantity_release,
                        balance_stock,
                        balance_available,
                        date_process
                         
                FROM stock
                WHERE item_number = \"$itemNumber\"
                ORDER BY stock_id
                ";
                
        // Get a response from the database by sending the connection
        // and the query
        $response = @mysqli_query($dbc, $query);
        // If the query executed properly, proceed
        if($response){
            echo '
            <thead>
                <tr>
                    <th>Trxn ID</th>'.
                    // <th>User ID</th>  
                    '<th>Received</th>  
                    <th>Issued</th>      
                    <th>Bal</th>
                    <th>Avail.</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>';

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available

            while($row = mysqli_fetch_array($response)){

                echo '<tr class="center "><td>' .
                '<a href="item_transaction.php?i='.$row['transaction_id'].'" class="btn btn-xs btn-warning">
                    <span class="fa fa-search"></span>
                </a>&nbsp;'.
                
                $row['transaction_id']      . '</td><td class="center">' .
                //$row['user_id']             . '</td><td class="center">' . 
                $row['quantity_received']   . '</td><td class="center">' .
                $row['quantity_release']    . '</td><td class="center">' .
                $row['balance_stock']       . '</td><td class="center">' .
                $row['balance_available']   . '</td><td class="center">' .
                $row['date_process']        . '</td class="center">' .

                '</tr>';
            }
            echo '</tbody> </table></div>';  
            }else {
                echo "Couldn't issue database query<br />";
                echo mysqli_error($dbc);
                die();
            }
        // Close connection to the database
        mysqli_close($dbc);
    }
?>




