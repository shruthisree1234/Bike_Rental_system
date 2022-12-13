<?php

include("database/functions.php");
template_header('');
$conn = conn_connect_mysql();
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$array = oci_parse($conn, "SELECT b.BookingId,b.PickupDate,b.ReturnDate,b.VehicleID,u.UserID,u.FirstName,u.LastName
                    FROM Fall22_S004_3_User u, Fall22_S004_3_Booking b
                    WHERE u.UserID = b.UserID");
oci_execute($array)
?>

<table id="bookingsTable" class="table table-bordered">
	<thead>
		<tr>
        	<th>BookingId</th>
			<th>PickupDate</th>
			<th>ReturnDate</th>
			<th>VehicleID</th>
            <th>UserID</th>	
            <th>FirstName</th>
            <th>LastName</th>											
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
           <td><?php echo $user [6]; ?></td>				   				   				  
		   </tr>
		<?php } ?>
	</tbody>
</table>
<script>
	$('#bookingsTable').DataTable();

	$('#bookingsTable').Tabledit({
  editButton: true,
  removeButton: false,
  columns: {
    identifier: [0, 'id'],
    editable: [[1, 'PickupDate'],[2, 'ReturnDate']]
  },
  url: 'edit/bookings_edit.php'
});


</script>

<?php
oci_close($conn);
template_footer(); ?>