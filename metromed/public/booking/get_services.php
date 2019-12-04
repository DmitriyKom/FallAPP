<?php require_once('../../private/initialize.php'); ?>

<?php
global $db;
if (isset($_POST['service_id'])) {

  $sql = "SELECT i.* FROM user_info i INNER JOIN user u ON i.user_id = u.user_id ";
  $sql .= "WHERE u.role='2' ";
  $sql .= "ORDER BY i.user_id ASC";
  $sql .= ";";

  $sql = "SELECT i.* FROM user_info i INNER JOIN provider p ON i.user_id = p.user_id ";
  $sql .= "WHERE specialty=".mysqli_real_escape_string($db,$_POST['service_id'])." order by specialty";

  $res = mysqli_query($db, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->user_id.'">'.h(ucwords($row->f_name. " " .$row->l_name)).'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }
} else if(isset($_POST['provider_id'])) {
  $qry = "select * from states_new where country_id=".mysqli_real_escape_string($con,$_POST['country_id'])." order by state";
  $res = mysqli_query($db, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->state_id.'">'.$row->state.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }
} else if(isset($_POST['state_id'])) {
  $qry = "select * from cities where state_id=".mysqli_real_escape_string($con,$_POST['state_id'])." order by city";
  $res = mysqli_query($db, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->city_id.'">'.$row->city.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }
}
?>
