<?php

 

include("database/functions.php");
template_header('');
$conn = conn_connect_mysql();
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

 

$array = oci_parse($conn, "SELECT UserID,FirstName,LastName,PenaltyCharge
FROM (Fall22_S004_3_Penalty  NATURAL JOIN Fall22_S004_3_Booking)
    NATURAL JOIN  Fall22_S004_3_User
ORDER BY PenaltyCharge DESC
FETCH NEXT 5 ROWS ONLY");
oci_execute($array)
?>

 

<table id="editableTable" class="table table-bordered">
<thead>
<tr>
<th>UserID</th>
<th>FirstName</th>
<th>LastName</th>
<th>Penalty</th>                                            
</tr>
</thead>
<tbody>
<?php while( $user = $row=oci_fetch_array($array) ) { ?>
<tr id="<?php echo $user [0]; ?>">
<td><?php echo $user [0]; ?></td>
<td><?php echo $user [1]; ?></td>
<td><?php echo $user [2]; ?></td>
<td>$ <?php echo $user [3]; ?></td>                                                        
</tr>
<?php } ?>
</tbody>
</table>

 


<?php
oci_close($conn);
template_footer(); ?>