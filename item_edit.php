<?php

if (!session_start()){
    session_start();
}


if (true) {         // (strcmp( $_SESSION["session_rights"],"admin") == 0)
	if(true){       // if(isset($_POST['submit'])){         // && !($_SESSION["isSessionDone"]) ){
       
        $data 	 = $_POST['data'];
	    foreach ($data as $key => $value) {
		    $data[$key] = strip_tags($value);
        } 
        
             
        $itemNumber = ($data['item_number']);
        $location = ($data['location']);
        $unit = ($data['unit']);
        $supplier = ($data['supplier']);        
        $itemName = ($data['item_name']);
        $brand = ($data['brand']);
        $description = ($data['description']);     
        $itemNumberOld = ($data['item_numberPrev']);
        require_once('mysqli_connect.php');

        $query = "UPDATE item 
                    SET item_number = \"$itemNumber\" ,
                        location = \"$location\" ,
                        unit = \"$unit\" ,
                        supplier = \"$supplier\" ,
                        name = \"$itemName\" ,
                        brand = \"$brand\" ,
                        description = \"$description\" 
                    WHERE item_number = \"$itemNumberOld\"
                    ";
        
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssssss",$itemNumber, $location,
                            $unit, $supplier, $itemName, $brand,
                            $description);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){ // everything went okay
            
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
            $data = '1<div class="alert alert-success alert-dismissable fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
                            <div class="text-center"><h4> The item <b>'.$itemName.'</b> was updated SUCCESSFULLY !</h4>
                            </div></div>' ;
        }else {//echo 'Error Occurred<br />';
            $error_msg = mysqli_error($dbc);
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
            $data = '0<div class="alert alert-danger alert-dismissable fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="text-center"> The item <b>'.$itemName.'</b> was <b><u>NOT</u></b> updated successfully!</div>
                    <div class="text-center">Verify the item number.</div>
                </div>';
        }
    }


    //$s = "Location: item_add_form.php?s=". $op_status."&n=".$itemName;
    echo ($data);

}
else {
	echo 'bottom else...';
	exit("Unautorized access!");
    
}



?>