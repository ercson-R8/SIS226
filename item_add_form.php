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

    <title>Add Inventory Item</title>

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

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('nav.html'); ?>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Inventory Item</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                            <br/>
                        </div>
                        <div class="panel-body">
                            <span id="itemAddStatus"></span>
                            <div class="row">
                                <div class="col-lg-0"> </div>
                                <div class="col-lg-12">
                                    <form role="form"  action="item_add.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" name="data[item_name]" placeholder="Name of the item" required>
                                                    <!-- <p class="help-block">Where will this item be stored.</p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Item Number</label>
                                                    <input class="form-control" name="data[item_number]" placeholder="Ex: EL-CM-0001 (Electronics Dept - Consumable - 0001)"
                                                        pattern="^^[A-Z]{2}-[A-Z]{2}-[0-9]{4}$"
                                                        title="Item number Dept-CM|NC-XXXX"
                                                        required >
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Brand</label>
                                                    <input class="form-control" name="data[brand]" placeholder="Brand name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Supplier</label>
                                                    <input class="form-control" name="data[supplier]" Brandplaceholder="Supplier" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <input class="form-control" name="data[location]" placeholder="Where will this item be stored. Ex. AAA01" 
                                                        pattern="^[A-Z]{1}[A-Z]{2}[0-9]{2}$"
                                                        title="Zone-Section-Shelf No. "
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    
                                                    <label>Unit</label>
                                                    <input class="form-control" name="data[unit]" placeholder="Example: PC, BAG, BOX, METER, REAM, PARK, etc." required>
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input class="form-control"  name="data[description]" placeholder="Cable, UTP, CAT6e, blue " required>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                                            
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-warning btn-lg btn-block">Reset</button>
                                            </div>
                                        
                                        </div>
                                        
                                    </form>
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

<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
    
<?php
    
    // if item_add.php returns string "s" that is not empty, it
    // would mean that contact info was properly stored/updated.
    $s=[];
    $n=[];
    $s =  trim($_GET['s']);
    $n =  trim($_GET['n']);
    if ($s=='1'){
    $data = ' 
        <div class="alert alert-success alert-dismissable fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
            <div class="text-center"><h4> The item <b>'.$n .'</b> was added successfully !</h4></div>
        </div>';
    }
    else if ($s=='0'){
    $data = ' 
        <div class="alert alert-danger alert-dismissable fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <div class="text-center"> The item <b>'.$n .'</b> was NOT added successfully!</div>
        </div>';
    }
    else{
        echo'';
    }
?>
<script>
    var data = <?php echo json_encode($data); ?>;
    document.getElementById("itemAddStatus").innerHTML = data;
</script>
    
</body>

</html>
