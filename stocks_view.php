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
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                            <div class="col-lg-4">
                                <button class="btn btn-primary toggle btn-block" data-toggle="exportTable"><i class="fa fa-bars"></i> Export Data</button>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        
                        
                        <div class="panel-body" id="exportTable" style="display:none">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="list-group border-bottom">

                                        <a href="stocks_print_pdf.php" target="_blank" class="list-group-item">
                                        <i class="fa fa-file-pdf-o fa-2x"></i> Export to <b>PDF</b></a>
                                        <a href="stocks_print_csv.php" target="_blank" class="list-group-item">
                                        <i class="fa fa-bar-chart-o fa-2x"></i> Export to <b>CSV</b></a>
                                        <a href="stocks_print_txt.php" target="_blank" class="list-group-item">
                                        <i class="fa fa-file-text-o fa-2x"></i> &nbsp; Export to <b>Text</b></a>
                                    </div> 
                                </div>
                                <!-- col-lg-5 -->
                            </div>
                            <!-- /.row -->
                                
                        </div>
                        
                    </div>          
                <div/>      
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
                responsive: true,
                columnDefs: [{ orderable: false,  width: 20, targets: 0 }],
                    order: [[ 3, "desc" ]],
                    iDisplayLength: 25
        });
        $('[data-toggle="tooltip"]').tooltip();   
        
         /* TOGGLE FUNCTION */
        $(".toggle").on("click",function(){
            var elm = $("#"+$(this).data("toggle"));
            if(elm.is(":visible"))
                elm.addClass("hidden").removeClass("show");
            else
                elm.addClass("show").removeClass("hidden");
            
            return false;
        });
    });
</script>
    


