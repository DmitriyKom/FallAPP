<?php

require_once('../../private/initialize.php');


global $db;
if (isset($_POST['service_id'])) {

  $sql = "SELECT i.* FROM user_info i INNER JOIN user u ON i.user_id = u.user_id ";
  $sql .= "WHERE u.role='2' ";
  $sql .= "ORDER BY i.user_id ASC";
  $sql .= ";";

  $sql = "SELECT i.*, p.provider_id FROM user_info i INNER JOIN provider p ON i.user_id = p.user_id ";
  $sql .= "WHERE specialty=".mysqli_real_escape_string($db,$_POST['service_id'])." ORDER BY specialty";

  $res = mysqli_query($db, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->provider_id.'">'.h(ucwords($row->f_name. " " .$row->l_name)).'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }
} else if(isset($_POST['provider_id'])) {
  $full_calendar = range(8,18);
  $num_slots = count($full_calendar);
  $sql = 'SELECT a.* FROM appointment a, user_info i ';
  $sql .= 'WHERE i.user_id="' . mysqli_real_escape_string($db,$_POST['provider_id']) . '" AND app_dt="' . mysqli_real_escape_string($db,$_POST['date']) . '" ORDER BY app_time;';
  $res = mysqli_query($db, $sql);
  $num_rows = mysqli_num_rows($res);
  if($num_rows > 0 && $num_rows < $num_slots) {
    while($row = mysqli_fetch_object($res)) {
      $res_calendar[] = $row->app_time;
      $free_cal = array_diff($full_calendar,$res_calendar);
    }
    echo '<option value="">------- Select -------</option>';
    foreach ($free_cal as $value) {
      echo '<option value="'.$value.'">'. date("g:i a", mktime($value, 0)) .'</option>';
    }

  } else if ($num_rows == $num_slots) {
    echo '<option value="">Nothing Available</option>';

  } else if ($num_rows == 0) {
    echo '<option value="">------- Select -------</option>';
    foreach ($full_calendar as $value) {
      echo '<option value="'.$value.'">'. date("g:i a", mktime($value, 0)) .'</option>';
    }
  } else {
    echo '<option value="">Error</option>';
    // echo '<option value="">';
    // echo $num_rows;
    // echo '</option>';
  }
}

?>
