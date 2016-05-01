
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

            echo '<br/><br/><table>';
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
            $j = 1;
            while($row = mysqli_fetch_array($response)){
                
                $i= $row['item_number'];
                $item = queryDb('item', 'item_number',$i);// use to fetch the item info
                $data['itemName']           = $item['name']; 
                
                
                
                echo '<tr class="center "><td>' . 
                '<a href="item_history.php?i='.$row['item_number'].'" class="btn btn-xs btn-primary">
                    <span class="fa fa-history"></span>
                </a>&nbsp;'.$j. ' '.
                $data['itemName']           . '</td><td class="center ">' .
                $row['item_number']         . '</td><td class="center">' . 
                $row['balance_available']   . '</td><td class="center">' .
                $row['balance_stock']       . '</td class="center">' .

                '</tr>';
                $j = $j + 1 ;
            }
            echo '</tbody> </table> </div>';
        }

}
?>