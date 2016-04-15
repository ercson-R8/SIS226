<?php


if (!session_start()){
    session_start();
    }
?>


<table class="table table-striped table-bordered table-hover " id="dataTables-items">
    
<?php
    if(true) {
        require_once('mysqli_connect.php');     
        // Create a query for the database
        $query ="SELECT item_number,
                        location,
                        unit,
                        supplier,
                        name,
                        brand,
                        description 
                FROM item"                                    
                ;
                
        // Get a response from the database by sending the connection
        // and the query
        $response = @mysqli_query($dbc, $query);
        // If the query executed properly, proceed
        if($response){
            echo '
            <thead>
                <tr>
                    <th>Name</th>
                    <th>No.</th>  
                    <th>Loc.</th>  
                    <th>Supplier</th>
                    <th>Brand</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>';

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available

            while($row = mysqli_fetch_array($response)){
                
                echo '<tr class="center "><td>' . 
                '<a href="stocks_request_form.php?i='.$row['item_number'].'" class="btn btn-xs btn-primary">
                    <span class="fa fa-plus-square"></span>
                </a>&nbsp;'.
                $row['name']            . '</td><td class="center ">' .
                $row['item_number']     . '</td><td class="center">' . 
                $row['location']        . '</td><td class="center">' . 
                $row['supplier']        . '</td><td class="center">' .
                $row['brand']           . '</td><td class="center">' .
                $row['description']     . '</td class="center">' .

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




