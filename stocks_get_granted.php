
<table class="table table-striped table-bordered table-hover " id="dataTables-items">
    
<?php
    if(true) {
        require_once('mysqli_connect.php');     
        $query = "SELECT t.item_number, i.name, t.quantity, t.requester, t.authorizer, t.remarks_authorizer, t.transaction_id
                    FROM transaction t 
                    INNER JOIN item i on i.item_number = t.item_number 
                    WHERE status = \"Granted\"";                                  
        $response = @mysqli_query($dbc, $query);
        if($response){
            echo '
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Item</th>  
                    <th>Qty</th>  
                    <th>Requester</th>
                    <th>Authorizer</th>
                    <th>remarks_authorizer</th>
                </tr>
            </thead>
            <tbody>';

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available

            while($row = mysqli_fetch_array($response)){
                // fetch requester and authorizer's names
                $requester = queryDb('user', 'user_id',$row['requester']);
                $authorizer = queryDb('user', 'user_id',$row['authorizer']);
                
                // produce the table
                echo '<tr class="center "><td>' . 
                '<a href="stocks_issue_form.php?i='.$row['transaction_id'].'" data-toggle="tooltip" data-placement="right" title="Issue stocks for this request!"class="btn btn-xs btn-primary">
                    <span class="fa fa-unlock-alt"></span>
                </a> &nbsp;'                                                .
                $row['item_number']                                         . '</td><td class="center">' .
                $row['name']                                                . '</td><td class="center ">' .
                $row['quantity']                                            . '</td><td class="center">' . 
                $requester['first_name'].' '.$requester['last_name']        . '</td><td class="center">' . 
                $authorizer['first_name'].' '.$authorizer['last_name']      . '</td><td class="center">' .
                $row['remarks_authorizer']                                  . '</td class="center">' .

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

    function queryDb( $table, $field, $key, $extra=""){
        require('mysqli_connect.php');
        $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
        $response = @mysqli_query($dbc, $query);
        return (mysqli_fetch_array($response));
        
    }

?>




