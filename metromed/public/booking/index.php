<?php

require_once('../../private/initialize.php');

$page_title = 'Booking_Attempt_2';

include(SHARED_PATH . '/metromed_header.php');

if (!isset($_GET['date'])) {
  redirect_to(url_for('userprofile/appointment.php'));
}

$date = $_GET['date'];

?>

<head>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="motherOfAllLearningCurves.js"></script>
</head>

  <div class="community-info">
    <div class="jumbotron jumbotron community2-bg-cover">

    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-sm-6 col-md-3">
          <label>Service :</label>
          <select name="service" class="form-control" id="service">
            <option value=''>------- Select --------</option>
            <?php
            // $provider_set = find_all_provider_names();
            global $db;
            $sql = "SELECT * FROM `service`";

            $res = mysqli_query($db, $sql);
            echo $sql;
            if(mysqli_num_rows($res) > 0) {
              while($row = mysqli_fetch_object($res)) {
              // while($provider = mysqli_fetch_assoc($provider_set)) {
              //   echo "<option value='";
              //   echo h($provider['user_id']) . "'>";
              //   echo h(ucwords($provider['f_name'])) . " " . h(ucwords($provider['l_name'])) . "</option>";
                echo "<option value='".$row->service_id."'>".h(ucwords($row->service))."</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="col-xs-12 col-md-sm-6 col-md-3">
          <label>Provider :</label>
          <select name="provider" class="form-control" id="provider" disabled="disabled"><option>------- Select --------</option></select>
        </div>
        <div class="col-xs-12 col-md-sm-6 col-md-3">
          <label>Available Times :</label>
          <select name="state" class="form-control" id="state" disabled="disabled"><option>------- Select --------</option></select>
        </div>
      </div>
    </div>

  </div>




<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
