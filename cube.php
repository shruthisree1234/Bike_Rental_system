<?php

 

include("database/functions.php");
template_header('');
$conn = conn_connect_mysql();
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

 

$array = oci_parse($conn, "SELECT v.Type AS VEHICLE_TYPE, v.Model AS VEHICLE_MODEL, COUNT(b.BookingID) AS BOOKING_COUNT
FROM Fall22_S004_3_Vehicle v
JOIN
Fall22_S004_3_Booking b ON v.VehicleID= b.VehicleID
GROUP BY ROLLUP(v.Type, v.Model)
ORDER BY v.Type, v.Model");
oci_execute($array)
?>

 

<table id="editableTable" class="table table-bordered">
<thead>
<tr>
<th>VehicleType</th>
<th>VehicleModel</th>
<th>Bookings</th>                                            
</tr>
</thead>
<tbody>
<?php while( $user = $row=oci_fetch_array($array) ) { ?>
<tr id="<?php echo $user [0]; ?>">
<td><?php echo $user [0]; ?></td>
<td><?php echo $user [1]; ?></td>
<td><?php echo $user [2]; ?></td>                                                        
</tr>
<?php } ?>
</tbody>
</table>

 


<?php
oci_close($conn);
template_footer(); ?>