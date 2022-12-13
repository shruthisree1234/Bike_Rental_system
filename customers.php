<?php

include("database/functions.php");
template_header('');
$conn = conn_connect_mysql();
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$array = oci_parse($conn, "SELECT * 
                    FROM Fall22_S004_3_User u, Fall22_S004_3_Student s
                    WHERE u.UserID = s.UserID");
oci_execute($array)
?>

<table  class="table table-striped table-bordered" id="customersTable">
	<thead>
		<tr>
        	<th>Id</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Address</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Major</th>
            <th>Register Date</th>													
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
           <td><?php echo $user [7]; ?></td>
           <td><?php echo $user [8]; ?></td>  				   				   				  
		   </tr>
		<?php } ?>
	</tbody>
</table>
<script>
	$('#customersTable').DataTable();

	$('#customersTable').Tabledit({
  editButton: true,
  removeButton: false,
  columns: {
    identifier: [0, 'id'],
    editable: [[1, 'FirstName'],[2, 'LastName'],
				[3, 'Address'],[4, 'Gender'],
				[5, 'DOB'],[6, 'Major'],[7,'RegisterDate']]
  },
  url: 'edit/customers_edit.php'
});


</script>

<?php
oci_close($conn);
template_footer(); ?>