<?php

    if (!session_start()){
    session_start();
    }

    $data['id'] =  $_SESSION['id'];
    $data['right'] = $_SESSION['rights'];
    echo var_dump($_SESSION);
    


?>
<html>
    <head>
        
    </head>
    <body>
        <br/><br/>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        var data = <?php echo json_encode($_SESSION['rights']); ?>;
        $(document).ready(function(){
            if (data != '3'){
                alert('Not allowed to use this feature!');
                window.location.assign("landing.php");
            }
        });
    </script>
    
    
    
    </body>
</html>
