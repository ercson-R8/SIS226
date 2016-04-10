<?php include('header.php'); ?>
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
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail Address</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="user_edit.php" class="btn btn-xs btn-primary">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="user_delete.php" class="btn btn-xs btn-danger">
                                            <span class="fa fa-times-circle-o"></span>
                                        </a>
                                    </td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>Win 95+</td>
                                    <td class="center">4</td>
                                    <td class="center">X</td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="user_edit.php" class="btn btn-xs btn-primary">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="user_delete.php" class="btn btn-xs btn-danger">
                                            <span class="fa fa-times-circle-o"></span>
                                        </a>
                                    </td>
                                    <td>Gecko</td>
                                    <td>Win 95+</td>
                                    <td class="center">4</td>
                                    <td class="center">X</td>
                                </tr>

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
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                columnDefs: [{ "orderable": false, "targets": 0 }]
        });
    });
    </script>

</body>

</html>
