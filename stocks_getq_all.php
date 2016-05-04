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
        $query ="SELECT item.item_number,
                        item.location,
                        item.unit,
                        item.supplier,
                        item.name,
                        item.brand,
                        item.description
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
                    <th>&nbsp;</th>
                    <th>Name</th>
                    <th>No.</th>  
                    <th>Loc.</th>  
                    <th>Supplier</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Available Balance</th>
                </tr>
            </thead>
            <tbody>';

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available

            while($row = mysqli_fetch_array($response)){

                $item_no = $row['item_number'];
                $q_balance = "SELECT balance_available FROM stock WHERE item_number = '$item_no' ORDER BY date_process DESC LIMIT 1";
                $r_q_balance = @mysqli_query($dbc, $q_balance);
                ?>
                <tr class="center ">
                <td><a href="stocks_request_form.php?i=<?php echo $row['item_number']?>" class="btn btn-xs btn-primary">
                    <span class="fa fa-plus-square"></span>
                </a></td>
                <td><?php echo $row['name']; ?></td>
                <td class="center "><?php echo $row['item_number'];  ?></td>
                <td class="center"><?php echo $row['location']; ?> </td>
                <td class="center"><?php  echo $row['supplier'];  ?></td>
                <td class="center"><?php echo  $row['brand']; ?></td>
                <td class="center"><?php echo $row['description']; ?></td class="center">
                <td class="center">
                    <?php 
                        while($row = mysqli_fetch_array($r_q_balance)){
                            echo $row['balance_available'];
                        }
                    ?>
                </td>
                </tr>
           <?php }
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




