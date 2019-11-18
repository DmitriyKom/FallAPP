<?php

require_once('../../../private/initialize.php');

if(is_post()) {

  // Values sent from new.php

  // $patient = [];
  $f_name = $_POST['f_name'] ?? '';
  $l_name = $_POST['l_name'] ?? '';
  $m_name = $_POST['m_name'] ?? '';
  $address = $_POST['address'] ?? '';
  $city = $_POST['city'] ?? '';
  $state = $_POST['state'] ?? '';
  $zip = $_POST['zip'] ?? '';
  $phone_number = $_POST['phone_number'] ?? '';
  $dob = empty($_POST['dob']) ? "NULL" : $_POST['dob'];
  $ins_id = $_POST['ins_id'] ?? '';
  $policy_number = empty($_POST['policy_number']) ? "NULL" : $_POST['policy_number'];

  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $role = $_POST['role'] ?? '';
  $enabled = (empty($_POST['enabled'])) ? "0" : $_POST['enabled'];
  // if($_POST['enabled'] == 1){
  //   $enabled = 1;
  // }else {
  //   $enabled = 'NULL';
  // }


  $result = create_patient($f_name, $l_name, $m_name, $address, $city, $state, $zip, $phone_number, $dob, $ins_id, $policy_number, $email, $password, $role, $enabled);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/administrator/patients/view.php?user_id=' . $new_id));

} else {
  redirect_to(url_for('/administrator/patients/new.php'));
}

?>
