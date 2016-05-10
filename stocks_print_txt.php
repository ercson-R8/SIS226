<?php
if (!session_start()){
    session_start();
    }
    
require('mysqli_connect.php');


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
    $tblData = "Item Name\t\t\t\tItem No.\tAvail. Bal\tStock Bal\r\n";
    if(true){
        $j = 0;
        while($j < $i){
            // [i][0] is the item number [i][1] is the item name
            $row = queryDb( 'stock', 'item_number',$items[$j][0], 'ORDER BY stock_id DESC LIMIT 1');
            $tblData .= $items[$j][1]."\t\t\t\t".
                        $row['item_number']."\t".
                        $row['balance_available']."\t".
                        $row['balance_stock']."\t".
                        "\r\n";
            $j += 1;
        }  
    }
    mysqli_close($dbc);
}


// create a text file
$file = 'stocks.txt';
// Append a new person to the file
$current = $tblData;
// Write the contents back to the file
file_put_contents($file, $current);

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
fclose ($file);
?>