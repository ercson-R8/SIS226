<?php 
    require_once('header.php');
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">View/Search Users</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        User List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <div class="table-responsive">
                                <?php  require_once('user_get_list.php'); ?>
                            </div><!-- /.table-responsive -->
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div><!-- /.col-lg-12 -->
    </div><!-- /#page-wrapper -->
</div><!-- /#page-wrapper -->
<?php include('footer.php'); ?>
<script type="text/javascript" src="js/user.js"></script>