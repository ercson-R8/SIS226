<?php require_once('login.check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIS V1:Simplified Inventory System</title>
    <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="bower_components/datatables/media/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="bower_components/datatables/media/js/dataTables.bootstrap.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- SIS Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>


</head>
<body>
    <div id="wrapper">
         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Simplified Inventory System</a>
            </div>
            <!-- /.navbar-header -->
            
            
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $fullname;  ?>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="user_edit.php?action=edit&amp;id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-user fa-fw"></i> Manage Profile</a>
                        </li>
                        <li><a href="user_reset_pw.php?action=reset&amp;id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-gear fa-fw"></i> Reset Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul><!-- /.dropdown-user -->
                </li><!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php if ( $u_role == '2' || $u_role == '4' ) { ?>
                            
                        <li>
                             <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Requisitions<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">

                                <li>
                                    <a href="item_requisition.php">Item
                            </a>
                                </li>
                                <li>
                                    <a href="stock_requisition.php">Stock</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php } ?>
                        <li>
                             <a href="#"><i class="fa fa-list-alt fa-fw"></i> Items<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">

                                <li>
                                    <a href="item_request.php">Request for New Item</a>
                                </li>
                                <li>
                                    <a href="item_add.php">Add New Items</a>
                                </li>
                                <li>
                                    <a href="item_view.php">View Items</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                             <a href="#"><i class="fa fa-archive fa-fw"></i> Stocks<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="stocks_request_search.php" ><i class="fa fa-shopping-cart fa-fw"></i>Request Stocks</a>
                                </li>
                                <!-- this function will move to
                                <li>
                                    <a href="stocks_authorize.php"><i class="fa fa-legal fa-fw"></i>Authorize Stocks Req.</a>
                                </li>
                                -->
                                <li>
                                    <a href="stocks_issue_search.php"><i class="fa fa-key fa-fw"></i>Issue Stocks</a>
                                </li>
                                <li>
                                    <a href="stocks_receive_search.php"><i class="fa fa-truck fa-fw"></i>Receive Stocks</a>
                                </li>
                                <li>
                                    <a href="stocks_view.php"><i class="fa fa-search fa-fw"></i>Search/View Stocks</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php if ( $u_role == '4' ) { ?>

                        <li>
                             <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="user_add.php">Add Users</a>
                                </li>
                                <li>
                                    <a href="user_view.php">View/Search Users</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php } ?>
                        <!-- End SIS Navigation List-->

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Navigation-->


            