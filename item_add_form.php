<?php 
	require_once('header.php');
    //require_once('rights.validate.php?r=3&u=landing.php');
?>

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


    
<?php
    
    // if item_add.php returns string "s" that is not empty, it
    // would mean that contact info was properly stored/updated.
    $s=[];
    $n=[];
   
    if (isset($_GET)){
        $s =  trim($_GET['s']);
        $n =  trim($_GET['n']);
    }
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
            <div class="text-center"> The item number already exist.</div>
        </div>';
    }
    else{
        $data = '';
    }
?>
<script>
    var data = <?php echo json_encode($data); ?>;
    document.getElementById("itemAddStatus").innerHTML = data;
</script>
    
<?php include('footer.php'); ?>

<!-- verify if current user is allowed to use this feature -->
<script>
    var data = <?php echo json_encode($_SESSION['rights']); ?>;
    $(document).ready(function(){
        if (data != '2'){ // level 2 is required to perform this feature
            alert('You are not allowed to use this feature!');
            window.location.assign("item_view.php");
        }
    });
</script>

