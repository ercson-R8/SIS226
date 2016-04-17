<?php
    require_once( 'mysqli_connect.php' ); 
    require_once( 'user.control.php' );

	/*
	 * SQL Query Select data from table user
	 */
	$sql_query = 'SELECT * FROM user';
	$result =  @mysqli_query($dbc, $sql_query);
	echo "<p style='text-align:right; font-weight:700;'>Total Registered Users:" . $result->num_rows . "</p>";

	while ( $row = $result->fetch_assoc()) {
		$params = '&amp;id=' . $row['user_id'];

	?>
	 <tr class="odd gradeX">
        <td>
            <a href="user_edit.php?action=edit<?php echo $params; ?>" class="btn btn-xs btn-primary">
                <span class="fa fa-edit"></span>
            </a>
            <a href="user_delete.php" id="<?php echo $row['user_id']; ?>" class="btn btn-xs btn-danger">
                <span class="fa fa-times-circle-o"></span>
            </a>
        </td>
        <td><?php echo $row['last_name'] ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['middle_name']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo get_role($row['rights']); ?></td>
    </tr>
<?php }	?>
