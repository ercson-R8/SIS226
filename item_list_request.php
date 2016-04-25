<?php
	require_once('mysqli_connect.php');

	$query = "SELECT i.name, s.balance_available FROM item i, stock s WHERE i.item_number = s.item_number";
	$result =  @mysqli_query($dbc, $query);

?>
<table class="table table-striped table-bordered table-hover" id="dataTables-items">
	<thead>
		<th>Name</th>
		<th>Available in Stock</th>
	</thead>
	<tbody>
		<?php while ( $row = $result->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['balance_available']; ?></td>
		</tr>
		<?php } mysqli_close($dbc); ?>
	</tbody>
</table>
