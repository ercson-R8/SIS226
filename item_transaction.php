<?php 
	require_once('header.php');
?>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Item Transaction Record</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             <span id="itemEditStatus"></span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-0"></div>
                                    <div class="col-lg-12">
                                        <!-- FORM BODY starts here -->
                                        <form role="form" name="item_trxn"">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Requester</label>
                                                        <input class="form-control"  name="requester" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Transaction Type</label>
                                                        <input class="form-control" name="transaction_type" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <input class="form-control" name="status" readonly>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!-- /.row -->
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Item Name</label>
                                                        <input class="form-control"  name="item_name" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input class="form-control" name="quantity" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Date Requested</label>
                                                        <input class="form-control" name="date_requested" readonly>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!-- /.row -->
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Authorizer</label>
                                                        <input class="form-control"  name="authorizer" id="authorizer" readonly>
                                                        <!-- <p class="help-block">Where will this item be stored.</p> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Date Authorized</label>
                                                        <input class="form-control" name="date_authorized"  id="date_authorized"readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Remarks</label>
                                                        <textarea class="form-control" name="remarks_authorizer" id="remarks_authorizer" rows="1" readonly></textarea>

                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!-- /.row -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Store Manager</label>
                                                        <input class="form-control"  name="store_manager" id="store_manager" readonly>
                                                        <!-- <p class="help-block">Where will this item be stored.</p> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Date Released/Added</label>
                                                        <input class="form-control" name="date_release" id="date_release" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Remarks</label>
                                                        <textarea class="form-control" name="remarks_store_manager" id="remarks_store_manager" rows="1" readonly ></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!-- /.row -->
                                            
                                        </form>
                                        <!-- FORM BODY ends here -->
                                    </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
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

    
    <?php 
        /*
        * fetch the transaction number and search transaction table
        * pass the data to the script below to populate the input fields
        */
        function queryDb( $table, $field, $key){
            require('mysqli_connect.php');
            $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ";
            $response = @mysqli_query($dbc, $query);
            return (mysqli_fetch_array($response));
           
        }
        
        
        $i = ( $_GET['i'] ); // fetch the url parameter
        $row = queryDb( 'transaction', 'transaction_id',$i); // fetch the all data from the given table
        
        {
            $data[] = $row['transaction_type'];         // 0 transaction_type
            $data[] = $row['authorizer'];               // 1 authorizer
            $data[] = $row['requester'];                // 2 requester
            $data[] = $row['date_requested'];           // 3 date_requested
            $data[] = $row['quantity'];                 // 4 quantity
            $data[] = $row['status'];                   // 5 status
            $data[] = $row['remarks_authorizer'];       // 6 remarks_authorized
            $data[] = $row['date_release'];             // 7 date_release
            $data[] = $row['store_manager'];            // 8 store_manager
            $data[] = $row['remarks_store_manager'];    // 9 remarks_store_manager
            $data[] = $row['date_authorized'];          // 10 date_authorized
            $data[] = $row['date_add'];                 // 11 date added
        }
        $itemName = $row['item_number'];                // use to fetch the item name
        $requester = $row['requester'];
        $authorizer= $row['authorizer'];
        $storeManager = $row['store_manager'];
        
        $row = queryDb('item', 'item_number',$itemName);// use to fetch the item name
        $data[] = $row['name'];                         // 12 item_name
        
        $row = queryDb('user', 'user_id',$requester);   // use to fetch the requester name
        $data[] = $row['username'];                     // 13 item_name
        
        $row = queryDb('user', 'user_id',$authorizer);  // use to fetch the authorizer name
        $data[] = $row['username'];                     // 14 item_name
        
        $row = queryDb('user', 'user_id',$storeManager);// use to fetch the storeManager name
        $data[] = $row['username'];                     // 15 item_name
        

        mysqli_close($dbc);
        
    ?>
    <?php include('footer.php'); ?>
    <script>
        var data = <?php echo json_encode($data); ?>;
        
        // populate the input fields
        {
            document.getElementById("itemEditStatus").innerHTML = 'Transaction date <h4> '+data[11]+'</h4>';
            document.forms["item_trxn"]["transaction_type"].value = data[0]; // 
            document.forms["item_trxn"]["authorizer"].value = data[14]; //
            document.forms["item_trxn"]["requester"].value = data[13]; // 
            
            document.forms["item_trxn"]["date_requested"].value = data[3];
            document.forms["item_trxn"]["quantity"].value = data[4];
            document.forms["item_trxn"]["status"].value = data[5]; // 
            document.forms["item_trxn"]["remarks_authorizer"].value = data[6];
            
            document.forms["item_trxn"]["date_release"].value = data[7];
            document.forms["item_trxn"]["store_manager"].value = data[15];
            document.forms["item_trxn"]["remarks_store_manager"].value = data[9];
            document.forms["item_trxn"]["date_authorized"].value = data[10];
            document.forms["item_trxn"]["item_name"].value = data[12];

        }
     
    </script>
    

