<?php require_once('../../private/initialize.php'); ?>


<?php $page_title = 'Book'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>


<?php
  session_start();

  if (isset($_GET['date'])) {
    $date = $_GET['date'];
  }

//Leaving commented until DB details are known

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];


  //   //mysqli connection to DB
    $db = new mysqli('localhost', 'fallappuser', '1233', 'fallapp');
    if (mysqli_connect_errno()) {
       echo '<p>Error: Could not connect to database.<br/>
       Please try again later.</p>';
       exit;
    }

  //   Prepared stmt to insert appt
  //   Need to determine how to use session variables to eliminate the need to use POST variables

    $query = "INSERT INTO Appointment(app_id,user_id,doc_id,app_dt,app_time) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'sssss', $name, $name, $name, $date, $date);
    mysqli_stmt_execute($stmt);
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";



        // $insert_user_info_query = "INSERT INTO user_info(first_name,last_name,middle_name,address,city,state,zip,phone_number,SSN,ins_id)
        //     VALUES('". $first_name."','".$last_name."','".$middle_name."','".$address ."','".
        //     $city ."','". $state ."','". $zipcode ."',". $phone .",". $SSN .", 1 )";


    // $sql = "SELECT user_id FROM user_info WHERE SSN =".$SSN;
    // if ($stmt = mysqli_prepare($link, $sql)) {
    //     $param_email = trim($_POST["email"]);
    //     if (mysqli_stmt_execute($stmt)) {
    //         mysqli_stmt_store_result($stmt);
    //         if (mysqli_stmt_num_rows($stmt) == 1) {
    //             mysqli_stmt_bind_result($stmt, $user_id);
    //             if(mysqli_stmt_fetch($stmt)) {
    //                 $_SESSION["user_id"] = $user_id;
    //                 $insert_user_query = "INSERT INTO user(user_id, email, password) VALUES(
    //             " . $user_id . "," . '"' . $email . '"' . "," . '"' . $password . '"' . ")";
    //                 if (mysqli_query($link, $insert_user_query)) {
    //                     echo "Thank you for registering";
    //                 } else {
    //                     echo "ERROR: Could not able to execute sql2. "
    //                         . mysqli_error($link);
    //                     return false;
    //                 };
    //             }
    //         }
    //     }
    //     return true;
    // }
        mysqli_stmt_free_result($stmt);
    mysqli_close($db);
  }
?>

<div class="container">
  <h1 class="text-center">Appointmenmt for: <?php echo date('F d, Y',strtotime($date)); ?></h1><hr>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form class="" method="post" autocomplete="off">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" name="email">
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>
</div>



<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
