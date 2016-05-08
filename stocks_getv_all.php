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
        $q = "SELECT * FROM item";
        $r = @mysqli_query($dbc, $q);
        $items = [];    // where the all item numbers and item names will be stored 
        $i = 0;         // current total number of items
        if ($r){
            while( $data = mysqli_fetch_array($r) ){
                $items[$i] = [$data['item_number'], $data['name']];
                $i += 1;
            }
        }
	

        if(true){
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

            $j = 0;
            while($j < $i){
                // [i][0] is the item number [i][1] is the item name
                $row = queryDb( 'stock', 'item_number',$items[$j][0], 'ORDER BY stock_id DESC LIMIT 1');
                echo '<tr class="center "><td>' . 
                '<a href="item_history.php?i='.$items[$j][0].'" data-toggle="tooltip" data-placement="right" title="View Item History!" class="btn btn-xs btn-primary">
                    <span class="fa fa-history"></span>
                </a>&nbsp;'.
                $items[$j][1]                  . '</td><td class="center ">' .
                $row['item_number']         . '</td><td class="center">' . 
                $row['balance_available']   . '</td><td class="center">' .
                $row['balance_stock']       . '</td class="center">' .
                '</tr>';
                $j += 1;
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



