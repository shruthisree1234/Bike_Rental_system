
<?php

include("database/functions.php");
template_header('');

   // connect to the database
   
   $conn = conn_connect_mysql();
   if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$array = oci_parse($conn, "SELECT u.UserID, u.FirstName, u.LastName, r.BOOKINGS_PER_USER
FROM Fall22_S004_3_User u  
JOIN
(SELECT b.UserID, COUNT(b.BookingID) AS BOOKINGS_PER_USER
FROM Fall22_S004_3_Booking b GROUP BY b.UserID) r
ON r.UserID = u.UserID ORDER BY r.BOOKINGS_PER_USER DESC");

oci_execute($array);
?>
<table id="User" class="table table-bordered">
	<thead>
		<tr>
        	<th>UserId</th>
			<th>FirstName</th>
			<th>Lastname</th>
         <th>Numbers of Booking</th>
													
		</tr>
	</thead>
	<tbody>
		<?php while( $user = $row=oci_fetch_array($array) ) { ?>
		   <tr id="<?php echo $user [0]; ?>">
		   <td><?php echo $user [0]; ?></td>
           <td><?php echo $user [1]; ?></td>
		   <td><?php echo $user [2]; ?></td>
         <td><?php echo $user [3]; ?></td>
		  		   				   				  
		   </tr>
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
