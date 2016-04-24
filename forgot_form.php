<?php 
    require_once('login.control.php');
?>
<!DOCTYPE <html>
<head>
    <title>Simplified Inventory System: Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="active" id="forgot-form-link">Reset Password</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="forgot-form" action="" method="post" role="form" >
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="reset-submit" id="reset-submit" tabindex="4" class="form-control btn btn-forgot btn-success" value="Reset Password">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $errormsg; ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>