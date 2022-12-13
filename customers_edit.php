<?php
include("../database/functions.php");

$input = filter_input_array(INPUT_POST);
$userTable = 'Fall22_S004_3_User';
$studentTable = 'Fall22_S004_3_Student';


if ($input['action'] == 'edit') {
    if (isset($input['FirstName'])) {
        $update_field = "FirstName='" . $input['FirstName'] . "'";
        $rowID_field = "UserID='" . $input['id'] . "'";

        updateSQL($userTable, $rowID_field, $update_field);

    }
    if (isset($input['LastName'])) {
        $update_field = "LastName='" . $input['LastName'] . "'";
        $rowID_field = "UserID='" . $input['id'] . "'";

        updateSQL($userTable, $rowID_field, $update_field);
    }

    if (isset($input['Address'])) {
        $update_field = "Address='" . $input['Address'] . "'";
        $rowID_field = "UserID='" . $input['id'] . "'";

        updateSQL($userTable, $rowID_field, $update_field);
    }

    if (isset($input['Gender'])) {
        $update_field = "Gender='" . $input['Gender'] . "'";
        $rowID_field = "UserID='" . $input['id'] . "'";

        updateSQL($userTable, $rowID_field, $update_field);
    }

    if (isset($input['DOB'])) {

        $update_field = "DOB=" . "to_date('".$input['DOB']."', 'DD/MM/RRRR')";
        $rowID_field = "UserID='" . $input['id'] . "'";

        updateSQL($userTable, $rowID_field, $update_field);
    }

    if (isset($input['Major'])) {
        $update_field = "Major='" . $input['Major'] . "'";
        $rowID_field = "UserID='" . $input['id'] . "'";

        updateSQL($studentTable, $rowID_field, $update_field);
    }

    if (isset($input['RegisterDate'])) {
        $update_field = "RegisterDate=" . "to_date('".$input['RegisterDate']."', 'DD/MM/RRRR')";
        $rowID_field = "UserID='" . $input['id'] . "'";

        updateSQL($studentTable, $rowID_field, $update_field);
    }



}

?>