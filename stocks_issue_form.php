<?php 
	require_once('header.php');
	require_once('mysqli_connect.php');
?>
    
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Issue Stocks Form</h2>
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
                            <span id="stockIssueStatus"></span><hr/>
                            <div class="row">
                                <div class="col-lg-0"> </div>
                                <div class="col-lg-12">

                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa  fa-user fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="medium"><span id="Requester">Name</span></div>
                                                        <br/>
                                                        <div>Requester</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Requester details -->
                                    
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-lightbulb-o fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="medium"><span id="quantity"></span></div>
                                                        <br/>
                                                        <div>Quantity Requested</div>
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
                                                        <i class="fa fa-gavel fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="medium"><span id="authorizer"></span></div>
                                                        <br/>
                                                        <div>Authorizer</div>
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
                                                        <i class="fa fa-info-circle fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div ><span id="remarks"></span></div>
                                                        <div>Remarks</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Remarks -->

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                            
                            <hr>
                                <form action="stocks_issue_update.php" name="stocksIssue" id="stocksIssue"  onclick="return hashPassword();"method="post">
                                        <div class="row">
                                            <div class="col-lg-1">
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                        <textarea class="form-control"
                                                            name="remarks_store_manager" 
                                                            id="remarks_store_manager" value="Remarks" placeholder= "Remarks" rows="2" >
                                                        </textarea>

                                                        <input type="hidden" name ="transaction_id" class="form-control">
                                                        <input type="hidden" name ="quantity" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                       <input class="form-control" placeholder="Password"  name="password" id="password" type="password" value="" required>  
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <button type="submit" name="stocksIssueConfirm" id="confirm" class="btn btn-primary btn-lg btn-block"  >
                                                    Confirm
                                                </button>
                                                <a href="stocks_issue_search.php" id="cancel" class="btn btn-warning btn-lg btn-block">Cancel </a>
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
    $data['transaction_id'] = ( $_GET['i'] ); // transaction id
    /* fetch the following 
        Item Name and Number
        Requester
        Authorizer
        Quantity being requested
        Department Head
        Remarks
    */
    $row = queryDb('transaction', 'transaction_id',$data['transaction_id']);// use to fetch the item number 
    $data['item_number']            = $row['item_number']; 
    $data['requester']              = $row['requester'];
    $data['authorizer']             = $row['authorizer'];
    $data['remarks']                = $row['remarks_authorizer'];
    $data['quantity']               = $row['quantity'];
      
    $row = queryDb('item', 'item_number',$data['item_number']);// use to fetch the item name
    $data['item_name']              = $row['name']; 
    
    $row = queryDb('user', 'user_id',$data['requester']);// use to fetch the requester's first and lastname
    $data['req_first_name']         = $row['first_name']; 
    $data['req_last_name']          = $row['last_name']; 
    
    $row = queryDb('user', 'user_id',$data['authorizer']);// use to fetch the authorizer's first and lastname
    $data['aut_first_name']             = $row['first_name']; 
    $data['aut_last_name']              = $row['last_name'];
        
    $row = queryDb('user', 'user_id',$_SESSION['user_id']);// use to fetch the current user info 
    $data['password']                   = $row['password'];
    $data['disableControls']            = false;
    
    // parameter s is status of stocks_receive_update.php which will either contain t/f
    if (isset($_GET['s']) ){ 
        if (($_GET['s']) == '1'){
            $data['status'] = '<div class="alert alert-success alert-dismissable fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                                <div class="text-center"><h4> The requested item <b>'.$data['itemName'] .'</b> was ISSUED successfully !</h4></div>
                            </div>';
            $data['remarks']                = $row['remarks_store_manager'];
            $data['disableControls']        = true;
        }else{
            $data['status'] = '<div class="alert alert-danger alert-dismissable fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <div class="text-center"> Error. Please verify your <b>password</b></div>
                        </div>';
        }
        
    }else{
        $data['status']="";
    }            
    mysqli_close($dbc);
?>



<script>
    var data = <?php echo json_encode($data); ?>;
    // populate the span ids...
    if (!data['disableControls']){
        document.getElementById("authorizer").innerHTML = data['aut_first_name']+' '+data['aut_last_name'];
        document.getElementById("quantity").innerHTML = data['quantity'];
        document.getElementById("itemName").innerHTML = data['item_name']+':'+data['item_number'];
        document.getElementById("remarks").innerHTML = data['remarks'];
        document.getElementById("Requester").innerHTML = data['req_first_name']+' '+data['req_last_name'];
        document.getElementById("stockIssueStatus").innerHTML = data['status'];
        
        document.forms["stocksIssue"]["transaction_id"].value = data['transaction_id'];
        document.forms["stocksIssue"]["quantity"].value = data['quantity'];
        document.forms["stocksIssue"]["remarks_store_manager"].value = "";
    }else{
        document.forms["stocksIssue"]["confirm"].disabled = true;
        document.getElementById("cancel").innerHTML = "Home";
        document.forms["stocksIssue"]["remarks_store_manager"].disabled = true;
        document.forms["stocksIssue"]["password"].disabled = true;
        document.getElementById("stockIssueStatus").innerHTML = data['status'];
    }
    
    function hashPassword(){
        password = document.forms["stocksIssue"]["password"].value;
        if (password != ""){
            document.forms["stocksIssue"]["password"].value = password;
            return true;
        }        
        
    }
</script>

<?php include('footer.php'); ?>


<script>
    var rights = <?php echo json_encode($_SESSION['rights']); ?>;
    $(document).ready(function(){
            if (rights != '3'){ // this feature is for Administrators/Store managers only.
                alert('Not allowed to use this feature!');
                window.location.assign("stocks_view.php");
            }
        });
</script>