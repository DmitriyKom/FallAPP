<?php

require_once('../../../private/initialize.php');

if(is_post()) {

  // Values sent from new.php

  $patient = [];
  $patient['f_name'] ? $_POST['f_name'] : '';
  $patient['l_name'] ? $_POST['l_name'] : '';
  $patient['m_name'] ? $_POST['m_name'] : '';
  $patient['address'] ? $_POST['address'] : '';
  $patient['city'] ? $_POST['city'] : '';
  $patient['state'] ? $_POST['state'] : '';
  $patient['zip'] ? $_POST['zip'] : '';
  $patient['phone_number']  ? $_POST['phone_number'] : '';
  $patient['dob'] = empty($_POST['dob']) ? "NULL" : $_POST['dob'];
  $patient['ins_id'] ? $_POST['ins_id'] : '';
  $patient['policy_number'] = empty($_POST['policy_number']) ? "NULL" : $_POST['policy_number'];

  $patient['email'] ? $_POST['email'] : '';
  $patient['password'] ? $_POST['password'] : '';
  $patient['role'] ? $_POST['role'] : '';
  $patient['enabled'] = (empty($_POST['enabled'])) ? "0" : $_POST['enabled'];

  $result = create_patient($patient);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/administrator/patients/view.php?user_id=' . $new_id));

} else {
  redirect_to(url_for('/administrator/patients/new.php'));
}

?>
