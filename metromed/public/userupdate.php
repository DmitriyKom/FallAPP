<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'User Update'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<?php
$userid = filter_input(INPUT_POST, 'userId');
$email = filter_input(INPUT_POST, 'inputEmail');
/*$password = filter_input(INPUT_POST, 'password');*/
$firstname = filter_input(INPUT_POST, 'inputFirstName');
$lastname = filter_input(INPUT_POST, 'inputLastName');
$middlename = filter_input(INPUT_POST, 'inputMiddleName');
$address = filter_input(INPUT_POST, 'inputAddress');
$address2 = filter_input(INPUT_POST, 'inputAddress2');
$phone = filter_input(INPUT_POST, 'inputPhone');
$city = filter_input(INPUT_POST, 'inputCity');
$state = filter_input(INPUT_POST, 'inputState');
$zip = filter_input(INPUT_POST, 'inputZip');

$conn = mysqli_connect("localhost", "root", "", "fallapp");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  $sql = "UPDATE user SET email='$email' WHERE user_id='".$userid."'";

  $sql = "UPDATE user_info SET f_name='$firstname', l_name='$lastname', m_name='$middlename',
          address='$address', city='$city', state='$state', zip='$zip', phone_number='$phone' WHERE user_id='".$userid."'";

if ($conn->query($sql)){
  echo "Your profile was updated sucessfully";
}
else{
  echo "Error: ". $sql ."
  ". $conn->error;
}
$conn->close();

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
