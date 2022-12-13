<?php
include("../database/functions.php");

$input = filter_input_array(INPUT_POST);
$vehicleTable = 'Fall22_S004_3_Vehicle';

if ($input['action'] == 'edit') {
    if (isset($input['Availability'])) {
        $update_field = "Availability='" . $input['Availability'] . "'";
        $rowID_field = "VehicleID='" . $input['id'] . "'";

        updateSQL($vehicleTable, $rowID_field, $update_field);

    }
    if (isset($input['Rate'])) {
        $update_field = "Rate='" . $input['Rate'] . "'";
        $rowID_field = "VehicleID='" . $input['id'] . "'";

        updateSQL($vehicleTable, $rowID_field, $update_field);
    }

    if (isset($input['Condition'])) {
        $update_field = "Condition='" . $input['Condition'] . "'";
        $rowID_field = "VehicleID='" . $input['id'] . "'";

        updateSQL($vehicleTable, $rowID_field, $update_field);
    }

    if (isset($input['Model'])) {
        $update_field = "Model='" . $input['Model'] . "'";
        $rowID_field = "VehicleID='" . $input['id'] . "'";

        updateSQL($vehicleTable, $rowID_field, $update_field);
    }


    if (isset($input['Type'])) {
        $update_field = "Type='" . $input['Type'] . "'";
        $rowID_field = "VehicleID='" . $input['id'] . "'";

        updateSQL($vehicleTable, $rowID_field, $update_field);
    }



}

?>