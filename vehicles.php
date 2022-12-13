<?php

include("database/functions.php");
template_header('');
$conn = conn_connect_mysql();
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$array = oci_parse($conn, "SELECT *
                    FROM Fall22_S004_3_Vehicle");
oci_execute($array)
?>

<table id="vehicleTable" class="table table-bordered">
	<thead>
		<tr>
        	<th>VehicleId</th>
			<th>Availability</th>
			<th>Rate</th>
			<th>Condition</th>
            <th>Model</th>	
            <th>Type</th>											
		</tr>
	</thead>
	<tbody>
		<?php while( $user = $row=oci_fetch_array($array) ) { ?>
		   <tr id="<?php echo $user [0]; ?>">
		   <td><?php echo $user [0]; ?></td>
           <td><?php echo $user [1]; ?></td>
		   <td><?php echo $user [2]; ?></td>
		   <td><?php echo $user [3]; ?></td>
		   <td><?php echo $user [4]; ?></td>
           <td><?php echo $user [5]; ?></td>				   				   				  
		   </tr>
		<?php } ?>
	</tbody>
</table>

<script>
	$('#vehicleTable').DataTable();

	$('#vehicleTable').Tabledit({
  editButton: true,
  removeButton: false,
  columns: {
    identifier: [0, 'id'],
    editable: [[1, 'Availability'],[2, 'Rate'],
				[3, 'Condition'],[4, 'Model'],
				[5, 'Type']]
  },
  url: 'edit/vehicles_edit.php'
});


</script>
<?php
oci_close($conn);
template_footer(); ?>