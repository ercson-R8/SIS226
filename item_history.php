<?php 
	require_once('header.php');
	require_once('item_request_control.php');

?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" id="item_name">Item History</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="item_name">
                            <h3><span id="itemName">Item Name</span></h3>
                            <h5><span id="itemNumber">Item Number</span></h5>
                            <!-- Item Name (item number) to be displayed here -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="dataTable_wrapper">
                                <!-- here wwill table data will be displayed -->
                                <div class="table-responsive">
                                    <?php
                                        $i = $_GET['i'];
                                        //echo $i; 
                                        include_once('item_get_history.php'); 
                                        
                                    ?>
                                
                                </div>
                            <!-- /.table-responsive -->
                            
                            <!-- credits to DataTables  https://datatables.net/ -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<?php include('footer.php'); ?>
    
    
    <script>
    
        // Initialising DataTables
        $(document).ready(function() {
            $('#dataTables-items').DataTable({
                    responsive: true,
                    columnDefs: [{ orderable: true,  width: 20, targets: 0 }],
                    order: [[ 1, "desc" ]],
                    iDisplayLength: 10
            });
        });
    </script>
    


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
    $i = ( $_GET['i'] ); // old item_number
    //$i = 'EL-CM-0000'; // for testing purpose only. to be removed later.
    $currentUserID = 10011; // this should be replaced with the global session user id $_SESSION["userID"];
    $data['itemNumber'] = $i;


    $row = queryDb('item', 'item_number',$i);// use to fetch the item info
    $data['itemName']           = $row['name']; 
    $data['description']        = $row['description']; 
    $data['supplier']           = $row['supplier'];
    
     
    mysqli_close($dbc);
?>



    <script>
        var data = <?php echo json_encode($data); ?>;
        // populate the span ids...
        {
            document.getElementById("itemName").innerHTML = data['itemName'];
            document.getElementById("itemNumber").innerHTML = data['itemNumber'];

            
        }
        
    </script>


</body>

</html>
