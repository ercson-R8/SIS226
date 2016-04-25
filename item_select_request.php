<?php 
	require_once('mysqli_connect.php');
	
	$query = "SELECT item_number, name FROM item ORDER BY name ASC";
	$result =  @mysqli_query($dbc, $query);
?>
<label>Select item from the list</label>
<select name="rq_item" class="form-control">
	<?php while ( $row = $result->fetch_assoc()) { ?>
	<option value="<?php echo $row['item_number'] ?>"><?php echo $row['name']; ?></option>
	<?php } ?>
	<option value="0">------Item not on list-----</option>
</select>