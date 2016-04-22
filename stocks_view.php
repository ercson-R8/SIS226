<?php 
	require_once('header.php');
	require_once('mysqli_connect.php');
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" id="item_name">View Stocks</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="item_name">
                            <br/>
                             <!-- Item Name (item number) to be displayed here -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="dataTable_wrapper">
                                <!-- here will table data will be displayed -->
                                <div class="table-responsive">
                                    <?php require_once('stocks_getv_all.php'); ?> 
                                
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
                responsive: true
        });
    });
</script>
    


