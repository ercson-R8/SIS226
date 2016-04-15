<?php include('header.php'); ?>


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

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                columnDefs: [{ "orderable": false, "targets": 0 }]
        });
    });
</script>

<?php include('footer.php'); ?>   
