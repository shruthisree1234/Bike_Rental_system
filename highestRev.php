<?php 
include("database/functions.php");

template_header('');
$conn = conn_connect_mysql();
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$array = oci_parse($conn, "SELECT BookingID,(ReturnDate-PickupDate) * 
(SELECT rate 
FROM Fall22_s004_3_Vehicle v
WHERE v.VehicleID = b.VehicleID) AS Revenue
FROM Fall22_s004_3_Booking b
ORDER BY Revenue DESC");
oci_execute($array)
?>

<table  class="table table-striped table-bordered" id="hrTable">
	<thead>
		<tr>
        	<th>BookingID</th>
			<th>Revenue</th>												
		</tr>
	</thead>
	<tbody>
		<?php while( $booking = $row=oci_fetch_array($array) ) { ?>
		   <tr id="<?php echo $booking [0]; ?>">
		   <td><?php echo $booking [0]; ?></td>
           <td>$ <?php echo $booking [1]; ?></td>
		<?php } ?>
	</tbody>
</table>
<script>
	$('#hrTable').DataTable();

	$('#hrTable').Tabledit({
  editButton: false,
  removeButton: false
});


</script>

<?php
template_footer();
?>