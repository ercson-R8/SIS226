<?php 
    session_start();
    require_once( 'mysqli_connect.php' );

    $username = $_SESSION['username'];
    $q = "SELECT * FROM user WHERE username = '$username'";
    $result =  @mysqli_query($dbc, $q);
    
    
    if( !isset(  $username ) ){
        header("Location: index.php");
    }
?>