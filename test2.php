
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
        // $query ="SELECT * FROM stock GROUP BY item_number ORDER BY item_number DESC";
        $q = "SELECT * FROM item";
        
        $r = @mysqli_query($dbc, $q);
        $items = [];
        $i = 0;
        if ($r){
            while( $data = mysqli_fetch_array($r) ){
                $items[$i] = [$data['item_number'], $data['name']];
                echo'<br/>  '.$data['item_number'].' name: '.$data['name'];
                $i += 1;
            }
        }
        /* array(2) { 
                [0]=> array(2) { 
                    [0]=> string(10) "XX-CM-0001" 
                    [1]=> string(12) "Test Item 01" 
                } 
                [1]=> array(2) { 
                    [0]=> string(10) "EL-CM-0001" 
                    [1]=> string(27) "Electronic Fan Capacitor 01" } 
            } 
        */
        echo '<br/><br/>$i = '.$i.'<br/><br/>';
        echo '<br/><br/>'.var_dump($items);
        echo '<br/><br/>';
        echo $items[0][0];

        if(true){

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
            $j = 0;
            echo $items[$j][0].'<br/>';
            while( $j < $i){
                // SELECT * FROM `stock` WHERE item_number = 'el-cm-0001' ORDER BY stock_id DESC LIMIT 1
                // [i][0] is the item number [i][1] is the item name
                $row = queryDb( 'stock', 'item_number',$items[$j][0], 'ORDER BY stock_id DESC LIMIT 1');
                echo '<tr class="center "><td>' . 
                '<a href="item_history.php?i='.$items[$j][0].'" class="btn btn-xs btn-primary">
                    <span class="fa fa-history"></span>
                </a>&nbsp;'.$j. ' '.
                $items[$j][1]                . '</td><td class="center ">' .
                $row['item_number']         . '</td><td class="center">' . 
                $row['balance_available']   . '</td><td class="center">' .
                $row['balance_stock']       . '</td class="center">' .
                // '</tr>';
                $j += 1;
            }
            echo '</tbody> </table> </div>';
        }

}
?>