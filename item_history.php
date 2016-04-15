<?php

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

    <title>Item History</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('nav.html'); ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" id="item_name">Items History</h1>
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
    
        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>
    
        // Initialising DataTables
        $(document).ready(function() {
            $('#dataTables-items').DataTable({
                    responsive: true
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
