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

    // $sql = "SELECT * FROM user_info ";
    // $sql .= "WHERE user_id='" . $id . "'";
    // $result = mysqli_query($db, $sql);
    // confirm_result_set($result);
    // $patient = mysqli_fetch_assoc($result);
    // mysqli_free_result($result);
    // return $patient; // returns an assoc

    $sql = "SELECT i.*, u.email, u.role, u.enabled FROM user_info AS i, user AS u ";
    $sql .= "WHERE i.user_id='" . $id . "'" . " AND u.user_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    echo $sql;
    confirm_result_set($result);
    $patient = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $patient; // returns an assoc

  }

  function create_patient($f_name, $l_name, $m_name, $address, $city, $state, $zip, $phone_number, $dob, $ins_id, $policy_number, $email, $password, $role, $enabled) {
    global $db;

    $sql = "INSERT INTO user_info ";
    $sql .= "(f_name, l_name, m_name, address, city, state, zip, phone_number, dob, ins_id, policy_number) ";
    $sql .= "VALUES (";
    $sql .= "'" . $f_name . "',";
    $sql .= "'" . $l_name . "',";
    $sql .= "'" . $m_name . "',";
    $sql .= "'" . $address . "',";
    $sql .= "'" . $city . "',";
    $sql .= "'" . $state . "',";
    $sql .= "'" . $zip . "',";
    $sql .= "'" . $phone_number . "',";
    $sql .= "'" . $dob . "',";
    $sql .= "'" . $ins_id . "',";
    $sql .= "'" . $policy_number . "'";
    $sql .= "); ";
        echo $sql;
    $result1 = mysqli_query($db, $sql);
    // Result is BOOL

    $sql2 = "INSERT INTO user ";
    $sql2 .= "(email, password, role, enabled) ";
    $sql2 .= "VALUES (";
    $sql2 .= "'" . $email . "',";
    $sql2 .= "'" . $password . "',";
    $sql2 .= "'" . $role . "',";
    $sql2 .= "'" . $enabled . "'";
    $sql2 .= ");";
        echo $sql2;
    $result2 = mysqli_query($db, $sql2);


    if($result1 == true && $result2 == true) {
      return true;
    } elseif($result1 == true && $result2 == false) {
      echo mysqli_error($db) . " on query 2. Value of \$enabled: $enabled";
      db_disconnect($db);
      exit;
    }elseif ($result1 == false && $result2 == true) {
      echo mysqli_error($db) . "on query 1. Value of \$enabled: $enabled";
      db_disconnect($db);
      exit;
    }else{
      // INSERT failed
      echo mysqli_error($db) . "on both queries. Value of \$enabled: $enabled";
      db_disconnect($db);
      exit;
    }
  }

  function update_patient($patient) {
    global $db;

    $sql = "UPDATE user_info SET ";
    $sql .= "f_name='" . $patient['f_name'] . "', ";
    $sql .= "l_name='" . $patient['l_name'] . "', ";
    $sql .= "m_name='" . $patient['m_name'] . "', ";
    $sql .= "address='" . $patient['address'] . "', ";
    $sql .= "city='" . $patient['city'] . "', ";
    $sql .= "state='" . $patient['state'] . "', ";
    $sql .= "zip='" . $patient['zip'] . "', ";
    $sql .= "phone_number='" . $patient['phone_number'] . "', ";
    $sql .= "dob='" . $patient['dob'] . "', ";
    $sql .= "ins_id='" . $patient['ins_id'] . "', ";
    $sql .= "policy_number='" . $patient['policy_number'] . "', ";
    $sql .= "email='" . $patient['email'] . "', ";
    $sql .= "role='" . $patient['role'] . "', ";
    $sql .= "enabled='" . $patient['enabled'] . "' ";
    $sql .= "WHERE user_id='" . $patient['user_id'] . "' ";
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
