<?php 

    // This form will call on stocks_get_balance.php passing the item_number as paramater
    // the stocks_get_balance.php will return the following: 
?>

<?php
/*
* this page will be called by pages like item_view.php etc.. passing item number in parameter "i"
* this page will call on item_number_verify.php to check if the new item number supplied does not exist yet
* lastly it will pass the data array to edit.php to update the changes made.
*
*/

if (!session_start()){
    session_start();
    }
error_reporting(0);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Receive Stocks</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="js/sha512.js"></script> 
    <script type="text/javascript" src="js/forms.js"></script> 
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('nav.html'); ?>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Receive Stock Form</h2>
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
                                <form action="stocks_receive_update.php" name="stocksReceive" id="stocksReceive"  onclick="return hashPassword();"method="post">
                                        <div class="row">
                                            <div class="col-lg-1">
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                        <input class="form-control" name="quantity" placeholder="Quantity" 
                                                        pattern="^[0-9]+$"
                                                        title="Number is required here."
                                                        required>
                                                        <input type="hidden" name ="userID" class="form-control">
                                                        <input type="hidden" name ="itemNumber" class="form-control">
                                                        <input type="hidden" name ="availBal" class="form-control">
                                                        <input type="hidden" name ="stockBal" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <textarea class="form-control" 
                                                            name="remarks_store_manager" 
                                                            id="remarks_store_manager" value="Remarks" placeholder= "Remarks" rows="4" >
                                                        </textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="" required>    
                                                </div>
                                                <button type="submit" name="btnStocksReceive" class="btn btn-primary btn-lg btn-block"  >
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





<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>



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
    $i = 'EL-CM-0000'; // for testing purpose only. to be removed later.
    $currentUserID = 2; // for testing purpose only. to be removed later, this should be a session var userID
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
                                <div class="text-center"><h4> The item <b>'.$data['itemName'] .'</b> was UPDATED successfully !</h4></div>
                            </div>';
        }else{
            $data['status'] = '<div class="alert alert-danger alert-dismissable fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <div class="text-center"> The item <b>'.$data['itemName'] .'</b> was NOT updated successfully!</div>
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
        {
            document.getElementById("stockBal").innerHTML = data['balance_stock'];
            document.getElementById("availBal").innerHTML = data['balance_available'];
            document.getElementById("itemName").innerHTML = data['itemName'];
            document.getElementById("description").innerHTML = data['description'];
            document.getElementById("supplier").innerHTML = data['supplier'];
            document.getElementById("supplier").innerHTML = data['supplier'];
            document.getElementById("stockUpdateStatus").innerHTML = data['status'];
            
            document.forms["stocksReceive"]["userID"].value = data['userID'];
            document.forms["stocksReceive"]["remarks_store_manager"].value = "";
            document.forms["stocksReceive"]["stockBal"].value = data['balance_stock'];
            document.forms["stocksReceive"]["availBal"].value = data['balance_available'];
            document.forms["stocksReceive"]["itemNumber"].value = data['itemNumber'];
            
        }
        
        function hashPassword(){
            password = document.forms["stocksReceive"]["password"].value;
            if (password != ""){
                password = hex_sha512(password);
                document.forms["stocksReceive"]["password"].value = password;
                return true;
            }
            
            //alert(hashedPW);
            
            
        }
    </script>