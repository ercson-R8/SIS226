<?php 
	require_once('header.php');
	require_once('mysqli_connect.php');
?>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Request Stocks Form</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                             <h3><span id="itemName">Item Name</span><br/></h3>
                        </div>
                        <div class="panel-body">
                            <span id="stockUpdateStatus"></span><hr/>
                            <div class="row">
                                <div class="col-lg-0"> </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-truck fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div><span id="supplier">Name</span></div>
                                                        <br/>
                                                        <div>Supplier</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Supplier details -->
                                    
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-lightbulb-o fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><span id="availBal">105</span></div>
                                                        <div>Available Balance</div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Available balance -->
                                    
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-bank fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><span id="stockBal">105</span></div>
                                                        <div>Stock Balance</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Stock balance -->
                                    
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-comments fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div ><span id="description">Lorem ipsum dolor sit amet, </span></div>
                                                        <div>Description</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Item Description -->

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                            
                            <hr>
                                <form action="stocks_request_update.php" name="stocksRequest" id="stocksRequest"  onsubmit="return verifyInputs();"method="post">
                                        <div class="row">
                                            <div class="col-lg-1">
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                        <input class="form-control" name="quantity" placeholder="Quantity" 
                                                        pattern="^[0-9]+$"
                                                        title="Number is required here."
                                                        autofocus
                                                        required>
                                                        <input type="hidden" name ="userID" class="form-control">
                                                        <input type="hidden" name ="itemNumber" class="form-control">
                                                        <input type="hidden" name ="availBal" class="form-control">
                                                        <input type="hidden" name ="stockBal" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <textarea class="form-control" 
                                                            name="remarks_user_authorizer" 
                                                            id="remarks_user_authorizer" value="Remarks" placeholder= "Remarks" rows="4" >
                                                        </textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <select class="form-control" name="authorizer">
                                                            <option value="">Department Head</option>
                                                    <?php
                                                        require_once('mysqli_connect.php');     
                                                        $query ="SELECT * FROM user WHERE rights=\"3\"";
                                                        $response = @mysqli_query($dbc, $query);
                                                        while($row = mysqli_fetch_array($response)){
                                                            echo'<option value="'.$row['user_id'].'">'. 
                                                            $row['first_name'].' '.$row['last_name'].'</option>';
                                                        }
                                                        mysqli_close($dbc);
                                                    ?>
                                                    </select>
                                                    
                                                    
                                                </div>
                                                <button type="submit" name="btnstocksRequest" class="btn btn-primary btn-lg btn-block"  >
                                                    Confirm
                                                </button>
                                                <a href="index.php" id="cancel" class="btn btn-warning btn-lg btn-block">Cancel </a>
                                            </div>
                                            <div class="col-lg-1">
                                            </div>
                                        </div>
                                        
                                    </form>
                            <!-- Stock Receive Form -->
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
    $currentUserID = 101; // for testing purpose only. to be removed later, this should be a session var userID
    $data[itemNumber] = $i;
    $extra = "ORDER BY stock_id DESC LIMIT 1";
    $row = queryDb( 'stock', 'item_number',$i, $extra); // fetch the all data from the given table
    
    $data['balance_stock']      = $row['balance_stock'];
    $data['balance_available']  = $row['balance_available'];

    $row = queryDb('item', 'item_number',$i);// use to fetch the item info
    $data['itemName']           = $row['name']; 
    $data['description']        = $row['description']; 
    $data['supplier']           = $row['supplier'];
    
    $row = queryDb('user', 'user_id',$currentUserID);// use to fetch the user info 
    $data['password']           = $row['password'];
    $data['rights']             = $row['rights'];
    $data['userID']             = $currentUserID;
    
    // parameter s is status of stocks_receive_update.php which will either contain t/f
    if (isset($_GET['s']) ){ 
        if (isset($_GET['s']) == '1'){
            $data['status'] = '<div class="alert alert-success alert-dismissable fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                                <div class="text-center"><h4> The item <b>'.$data['itemName'] .'</b> was REQUESTED successfully !</h4></div>
                            </div>';
        }else{
            $data['status'] = '<div class="alert alert-danger alert-dismissable fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <div class="text-center"> The item <b>'.$data['itemName'] .'</b> was NOT requested successfully!</div>
                        </div>';
        }
        
    }else{
        $data['status']="";
    }            
    mysqli_close($dbc);
?>



<script>
    var data = <?php echo json_encode($data); ?>;
    // populate the span ids and hidden inputs...
    {
        document.getElementById("stockBal").innerHTML = data['balance_stock'];
        document.getElementById("availBal").innerHTML = data['balance_available'];
        document.getElementById("itemName").innerHTML = data['itemName'];
        document.getElementById("description").innerHTML = data['description'];
        document.getElementById("supplier").innerHTML = data['supplier'];
        document.getElementById("supplier").innerHTML = data['supplier'];
        document.getElementById("stockUpdateStatus").innerHTML = data['status'];
        
        document.forms["stocksRequest"]["userID"].value = data['userID'];
        document.forms["stocksRequest"]["remarks_user_authorizer"].value = "";
        document.forms["stocksRequest"]["stockBal"].value = data['balance_stock'];
        document.forms["stocksRequest"]["availBal"].value = data['balance_available'];
        document.forms["stocksRequest"]["itemNumber"].value = data['itemNumber'];
        
    }
    
    function verifyInputs(){
        quantity = parseInt(document.forms["stocksRequest"]["quantity"].value,10);
        availBal = parseInt(document.getElementById("availBal").innerHTML,10);
        authorizer = document.forms["stocksRequest"]["authorizer"].value;
        if (quantity <= availBal){
            if(authorizer != ''){
                return true;
            }else{
                alert('Please select your head of department');
                return false;
            }
        }else {
            alert('There is not enough stocks for this request!');
            return false;
        }
        
    }       
        
        
</script>
<script type="text/javascript" src="js/sha512.js"></script> 
<script type="text/javascript" src="js/forms.js"></script> 
    
<?php include('footer.php'); ?>

