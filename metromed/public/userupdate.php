<?php

require_once('../private/initialize.php');

if(is_post()) {

  $user = [];
  $user['f_name'] = $_POST['f_name'] ?? '';
  $user['l_name'] = $_POST['l_name'] ?? '';
  $user['m_name'] = $_POST['m_name'] ?? '';
  $user['address'] = $_POST['address'] ?? '';
  $user['city'] = $_POST['city'] ?? '';
  $user['state'] = $_POST['state'] ?? '';
  $user['zip'] = $_POST['zip'] ?? '';
  $user['phone_number']  = $_POST['phone_number'] ?? '';
  $user['user_id'] = $_SESSION['user_id'] ?? '';
  $user['email'] = $_POST['email'] ?? '';

  $result = update_user($user);
  redirect_to(url_for('/userprofile.php'));

} else {

  redirect_to(url_for('/index.php'));

}






// $userid = filter_input(INPUT_POST, 'userId');
// $email = filter_input(INPUT_POST, 'inputEmail');
// /*$password = filter_input(INPUT_POST, 'password');*/
// $firstname = filter_input(INPUT_POST, 'inputFirstName');
// $lastname = filter_input(INPUT_POST, 'inputLastName');
// $middlename = filter_input(INPUT_POST, 'inputMiddleName');
// $address = filter_input(INPUT_POST, 'inputAddress');
// $address2 = filter_input(INPUT_POST, 'inputAddress2');
// $phone = filter_input(INPUT_POST, 'inputPhone');
// $city = filter_input(INPUT_POST, 'inputCity');
// $state = filter_input(INPUT_POST, 'inputState');
// $zip = filter_input(INPUT_POST, 'inputZip');



/*else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}*/
?>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
