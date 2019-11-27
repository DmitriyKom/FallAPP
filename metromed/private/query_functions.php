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

  function book_appointment($appointment) {
    global $db;

    // echo $appointment['doc_id'];
    // echo $appointment['date'];
    $user_id = $appointment['user_id'];
    $doc_id = $appointment['doc_id'];
    $app_date = $appointment['app_date'];


    $query = "INSERT INTO appointment (user_id, doc_id, app_dt) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    echo $query;
    $bind = mysqli_stmt_bind_param($stmt, 'sss', $user_id, $doc_id, $app_date);
    // echo $bind;
    mysqli_stmt_execute($stmt);


    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    return $msg;
    mysqli_stmt_free_result($stmt);
    mysqli_close($db);
  }

  function find_user_by_id($id) {
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
    $sql .= ";";
    $result = mysqli_query($db, $sql);
    // echo $sql;
    confirm_result_set($result);
    $patient = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $patient; // returns an assoc

  }

  function find_user_by_id_2($id) {
    global $db;

    $sql = "SELECT u.*, i.* FROM user_info AS i, user AS u ";
    $sql .= "WHERE i.user_id='" . $id . "'" . " AND u.user_id='" . $id . "'";
    $sql .= ";";
    $result = mysqli_query($db, $sql);
    // echo $sql;
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user; // returns an assoc

  }

  function create_patient($patient) {
    global $db;

    $sql = "INSERT INTO user_info ";
    $sql .= "(f_name, l_name, m_name, address, city, state, zip, phone_number, dob, ins_id, policy_number) ";
    $sql .= "VALUES (";
    $sql .= "'" . $patient['f_name'] . "',";
    $sql .= "'" . $patient['l_name'] . "',";
    $sql .= "'" . $patient['m_name'] . "',";
    $sql .= "'" . $patient['address'] . "',";
    $sql .= "'" . $patient['city'] . "',";
    $sql .= "'" . $patient['state'] . "',";
    $sql .= "'" . $patient['zip'] . "',";
    $sql .= "'" . $patient['phone_number'] . "',";
    $sql .= "'" . $patient['dob'] . "',";
    $sql .= "'" . $patient['ins_id'] . "',";
    $sql .= "'" . $patient['policy_number'] . "'";
    $sql .= "); ";
        // echo $sql;
    $result1 = mysqli_query($db, $sql);
    // Result is BOOL

    $sql2 = "INSERT INTO user ";
    $sql2 .= "(email, password, role, enabled) ";
    $sql2 .= "VALUES (";
    $sql2 .= "'" . $patient['email'] . "',";
    $sql2 .= "'" . $patient['password'] . "',";
    $sql2 .= "'" . $patient['role'] . "',";
    $sql2 .= "'" . $patient['enabled'] . "'";
    $sql2 .= ");";
        // echo $sql2;
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

  function update_user($user) {
    global $db;

    $sql = "UPDATE user_info SET ";
    $sql .= "f_name='" . $user['f_name'] . "', ";
    $sql .= "l_name='" . $user['l_name'] . "', ";
    $sql .= "m_name='" . $user['m_name'] . "', ";
    $sql .= "address='" . $user['address'] . "', ";
    $sql .= "city='" . $user['city'] . "', ";
    $sql .= "state='" . $user['state'] . "', ";
    $sql .= "zip='" . $user['zip'] . "', ";
    $sql .= "phone_number='" . $user['phone_number'] . "' ";
    $sql .= "WHERE user_id='" . $user['user_id'] . "' ";
    $sql .= "LIMIT 1; ";
    echo $sql;
    $result1 = mysqli_query($db, $sql);

    $sql2 = "UPDATE user SET ";
    $sql2 .= "email='" . $user['email'] . "' ";
    $sql2 .= "WHERE user_id='" . $user['user_id'] . "' ";
    $sql2 .= "LIMIT 1;";
    // echo $sql2;
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
    // $conn = mysqli_connect("localhost", "ics325fa1919", "3887", "ics325fa1919");
    // if ($conn->connect_error) {
    //   die("Connection failed: " . $conn->connect_error);
    // }
    //   $sql = "UPDATE user SET email='$email' WHERE user_id='".$userid."'";
    //
    //   $sql = "UPDATE user_info SET f_name='$firstname', l_name='$lastname', m_name='$middlename',
    //           address='$address', city='$city', state='$state', zip='$zip', phone_number='$phone' WHERE user_id='".$userid."'";
    //
    // if ($conn->query($sql)){
    //   echo "Your profile was updated sucessfully";
    // }
    // else{
    //   echo "Error: ". $sql ."
    //   ". $conn->error;
    // }
    // $conn->close();

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
    $sql .= "policy_number='" . $patient['policy_number'] . "' ";
    $sql .= "WHERE user_id='" . $patient['user_id'] . "' ";
    $sql .= "LIMIT 1; ";
    echo $sql;
    $result1 = mysqli_query($db, $sql);

    $sql2 = "UPDATE user SET ";
    $sql2 .= "email='" . $patient['email'] . "', ";
    $sql2 .= "role='" . $patient['role'] . "', ";
    $sql2 .= "enabled='" . $patient['enabled'] . "' ";
    $sql2 .= "WHERE user_id='" . $patient['user_id'] . "' ";
    $sql2 .= "LIMIT 1;";
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

  function delete_user($user_id) {
    global $db;

    $sql2 = "DELETE FROM user ";
    $sql2 .= "WHERE user_id='" . $user_id . "' ";
    $sql2 .= "LIMIT 1;";
    // echo $sql2;
    $result2 = mysqli_query($db, $sql2);

    $sql = "DELETE FROM user_info ";
    $sql .= "WHERE user_id='" . $user_id . "' ";
    $sql .= "LIMIT 1; ";
    // echo $sql;
    $result1 = mysqli_query($db, $sql);


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

  function find_insurance_by_user_id($id) {
    global $db;

    $sql = "SELECT * FROM user_info ";
    $sql .= "WHERE user_id='" . $id . "' ";
    $sql .= ";";
    $result = mysqli_query($db, $sql);
    // echo $sql;
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user; // returns an assoc

  }

  function update_user_insurance($user) {
    global $db;

    $sql = "UPDATE user_info SET ";
    $sql .= "ins_id='" . $user['ins_id'] . "', ";
    $sql .= "policy_number='" . $user['policy_number'] . "' ";
    $sql .= "WHERE user_id='" . $user['user_id'] . "' ";
    $sql .= "LIMIT 1; ";
    echo $sql;
    $result1 = mysqli_query($db, $sql);

    if($result1 == true) {
      return true;
    }else{
      // INSERT failed
      echo mysqli_error($db) . "on both queries. Value of \$enabled: $enabled";
      db_disconnect($db);
      exit;
    }
  }

  function find_all_insurance() {
    global $db;

    $sql = "SELECT * FROM insurance ";
    $sql .= "ORDER BY ins_id ASC;";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    while($row = mysqli_fetch_assoc($result)){
      $array[$row['ins_id']] = $row['ins_co'];
    }
    return $array;
  }



?>
