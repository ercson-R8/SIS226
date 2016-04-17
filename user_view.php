<?php 
    include('header.php');

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
                            <table class="table table-striped table-bordered table-hover" id="userTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>E-mail Address / Username</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php require_once('user_get_list.php'); ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>

    </div>
    <!-- /#page-wrapper -->


</div>
<!-- /#wrapper -->

<script>
    $(document).ready(function() {
        $('userTable').DataTable({
                responsive: true,
                columnDefs: [{ "orderable": false, "targets": 0 }]
        });
    });
</script>

<?php include('footer.php'); ?>   
