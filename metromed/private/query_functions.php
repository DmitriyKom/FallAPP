<?php

  function find_all_patients() {
    global $db;

    $sql = "SELECT * FROM user_info ";
    $sql .= "ORDER BY user_id ASC";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_patient_by_id($id) {
    global $db;

    $sql = "SELECT * FROM user_info ";
    $sql .= "WHERE user_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $patient = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $patient; // returns an assoc
  }

  function create_patient($first_name, $last_name, $middle_name, $address, $city, $state, $zip, $phone_number, $SSN, $birth_dt, $ins_id, $policy_number) {
    global $db;

    $sql = "INSERT INTO user_info ";
    $sql .= "(first_name, last_name, middle_name, address, city, state, zip, phone_number, SSN, birth_dt, ins_id, policy_number) ";
    $sql .= "VALUES (";
    $sql .= "'" . $first_name . "',";
    $sql .= "'" . $last_name . "',";
    $sql .= "'" . $middle_name . "',";
    $sql .= "'" . $address . "',";
    $sql .= "'" . $city . "',";
    $sql .= "'" . $state . "',";
    $sql .= "'" . $zip . "',";
    $sql .= "'" . $phone_number . "',";
    $sql .= "'" . $SSN . "',";
    $sql .= "'" . $birth_dt . "',";
    $sql .= "'" . $ins_id . "',";
    $sql .= "'" . $policy_number . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // Result is BOOL
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_patient($patient) {
    global $db;

    $sql = "UPDATE user_info SET ";
    $sql .= "menu_name='" . $patient['menu_name'] . "', ";
    $sql .= "position='" . $patient['position'] . "', ";
    $sql .= "visible='" . $patient['visible'] . "' ";
    $sql .= "WHERE id='" . $patient['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // The result of UPDATE statements is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

?>
