<?php

require_once('../../../private/initialize.php');

if(is_post()) {

  // Handle form values sent by new.php

  // $patient = [];
  $first_name = $_POST['first_name'] ?? '';
  $last_name = $_POST['last_name'] ?? '';
  $middle_name = $_POST['middle_name'] ?? '';
  $address = $_POST['address'] ?? '';
  $city = $_POST['city'] ?? '';
  $state = $_POST['state'] ?? '';
  $zip = $_POST['zip'] ?? '';
  $phone_number = $_POST['phone_number'] ?? '';
  $SSN = $_POST['SSN'] ?? '';
  $birth_dt = $_POST['birth_dt'] ?? '';
  $ins_id = $_POST['ins_id'] ?? '';
  $policy_number = $_POST['policy_number'] ?? '';


  $result = create_patient($first_name, $last_name, $middle_name, $address, $city, $state, $zip, $phone_number, $SSN, $birth_dt, $ins_id, $policy_number);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/administrator/patients/view.php?user_id=' . $new_id));

} else {
  redirect_to(url_for('/administrator/patients/new.php'));
}

?>
