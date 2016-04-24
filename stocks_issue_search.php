<?php 
	require_once('header.php');
	require_once('mysqli_connect.php');
    
?>


        <div id="page-wrapper">
           <?php //echo var_dump($GLOBALS); ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" id="item_name">Issue Stocks</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="item_name">
                            These are all GRANTED requests as of 
                            <?php 
                            date_default_timezone_set("Asia/Muscat");
                            echo date('Y-m-d H:i:s');
                            ?><br/>
                             <!-- Item Name (item number) to be displayed here -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="dataTable_wrapper">
                                <!-- here will table data will be displayed -->
                                <div class="table-responsive">
                                    <?php require_once('stocks_get_granted.php'); ?> 
                                
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
        var rights = <?php echo json_encode($_SESSION['rights']); ?>;
        // if (rights != '2'){ // this feature is for Store manager only.
        //     alert('You are not allowed to use this feature!');
        //     window.location.assign("stocks_view.php");
        // }
        $('#dataTables-items').DataTable({
                responsive: true
        });
    });
</script>
    
