<?php 
	require_once('header.php');
	require_once('mysqli_connect.php');
?>
    
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Inventory Item</h1>
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
                            <span id="itemEditStatus"></span>
                            <div class="row">
                                <div class="col-lg-0"> </div>
                                <div class="col-lg-12">
                                    <form role="form" name="item_edit" id="item_edit" method="post">
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
                                                    <input type="hidden"  name ="data[item_numberPrev]" class="form-control">
                                                    <input class="form-control" name="data[item_number]" placeholder="Ex: EL-CM-0001 (Electronics Dept - Consumable - 0001)"
                                                        pattern="^[A-Z]{2}-[A-Z]{2}-[0-9]{4}$"
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
                                                <a href="index.php" id="cancel" class="btn btn-warning btn-lg btn-block">Cancel </a>
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



<?php include('footer.php'); ?>
<?php 
    /*
    * fetch the item number and search item table
    * pass the data to the script below to populate the input fields
    */
    
    require_once('mysqli_connect.php'); 
    $i = ( $_GET['i'] ); // old item_number
    //echo $i;
    $query ="SELECT * FROM item WHERE  item_number=\"$i\" ";

    $response = @mysqli_query($dbc, $query);
    
    $row = mysqli_fetch_array($response);
    //echo var_dump($row);
    
    $data[] = $row['item_number'];
    $data[] = $row['location'];
    $data[] = $row['unit'];
    $data[] = $row['supplier'];
    $data[] = $row['name'];
    $data[] = $row['brand'];
    $data[] = $row['description'];
    $data[] = $i;

    mysqli_close($dbc);


?>
<script>
    var data = <?php echo json_encode($data); ?>;
    
    // populate the input fields
    {
        document.forms["item_edit"]["data[item_number]"].value = data[0];
        document.forms["item_edit"]["data[location]"].value = data[1];
        document.forms["item_edit"]["data[unit]"].value = data[2];
        document.forms["item_edit"]["data[supplier]"].value = data[3];
        document.forms["item_edit"]["data[item_name]"].value = data[4];
        document.forms["item_edit"]["data[brand]"].value = data[5];
        document.forms["item_edit"]["data[description]"].value = data[6];
        // hidden field
        document.forms["item_edit"]["data[item_numberPrev]"].value = data[7];
    }
    
    
    
    // call item_edit.php and pass the data 
    var request;

    // Bind to the submit event of our form
    $("#item_edit").submit(function(event){
        
       {
           alert('jquery was executed');
            // Abort any pending request
            if (request) {
                request.abort();
            }
            
            // setup some local variables
            var $form = $(this);

            // Let's select and cache all the fields
            var $inputs = $form.find("input, select, button, textarea");

            // Serialize the data in the form
            var serializedData = $form.serialize();

            // Let's disable the inputs for the duration of the Ajax request.
            // Note: we disable elements AFTER the form data has been serialized.
            // Disabled form elements will not be serialized.
            $inputs.prop("disabled", true);

            // Fire off the request to /form.php
            request = $.ajax({
                url: "item_edit.php",
                type: "post",
                data: serializedData
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // Log a message to the console
                var status = response;
                status = status.substr(0,3);
                console.log("Hooray, it worked!"+status+" -"+(response).substr(1));
                
                document.getElementById("itemEditStatus").innerHTML = response.substr(3);
                alert (status.substr(2,1)== '1');
                if (status.substr(2,1)=='1') {
                    $inputs.prop("disabled", true);
                    document.getElementById("cancel").innerHTML = "Home";
                }else{
                    $inputs.prop("disabled", false);
                }
                
            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function () {
                // Reenable the inputs
                //$inputs.prop("disabled", fieldsDisable);
            });

            // Prevent default posting of form
            event.preventDefault();
        }
    });

     
</script>
    
