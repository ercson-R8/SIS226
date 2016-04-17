<?php 
    require_once( 'mysqli_connect.php' );

    /*
     * Delete user record by User ID
     * user_id
     */
    
    $user_id = $_GET['user_id'];
    $sql_query = "DELETE FROM user where user_id = '$user_id'";
    $result = @mysqli_query($dbc, $sql_query);
    
	mysqli_close($dbc);

?>