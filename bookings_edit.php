<?php
include("../database/functions.php");

$input = filter_input_array(INPUT_POST);
$bookingTable = 'Fall22_S004_3_Booking';



if ($input['action'] == 'edit') {

    if (isset($input['PickupDate'])) {

        $update_field = "PickupDate=" . "to_date('".$input['PickupDate']."', 'DD/MM/RRRR')";
        $rowID_field = "BookingId='" . $input['id'] . "'";

        updateSQL($bookingTable, $rowID_field, $update_field);
    }

    if (isset($input['ReturnDate'])) {
        $update_field = "ReturnDate=" . "to_date('".$input['ReturnDate']."', 'DD/MM/RRRR')";
        $rowID_field = "BookingId='" . $input['id'] . "'";

        updateSQL($bookingTable, $rowID_field, $update_field);
    }



}

?>