<?php

require_once('../../private/initialize.php');

$page_title = 'Booking_Attempt_2';

include(SHARED_PATH . '/metromed_header.php');

  if (!isset($_GET['date'])) {
    redirect_to(url_for('userprofile/appointment.php'));
  }

  $date = $_GET['date'];

  if (is_post()) {
    $appointment = [];
    $appointment['user_id'] = $_SESSION['user_id'];
    $appointment['doc_id'] = $_POST['provider'];
    $appointment['app_date'] = $date;
    $appointment['app_time'] = $_POST['app_time'];

    $result = book_appointment($appointment);
    echo "$result";
  }

  $f_name = find_user_by_id_3($_SESSION['user_id']);

?>

<head>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="motherOfAllLearningCurves.js"></script>
</head>

  <div class="community-info">
    <div class="jumbotron jumbotron community2-bg-cover">

    </div>

    <div class="container">
      <h1 class="text-center">Appointment for: <?php echo "<br />". h(ucwords($f_name['f_name']. " " .$f_name['l_name'])); ?>
        <?php echo " on ".date('F d, Y',strtotime($date)); ?></h1><hr>

      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <form action="<?php echo url_for('/booking/index.php?date=' . h(u($date))); ?>" method="post" autocomplete="off">

            <div class="form-group">
              <label for="service">Service :</label>
              <select name="service" class="form-control" id="service">
                <option value=''>------- Select --------</option>
                <?php
                  global $db;
                  $sql = "SELECT * FROM `service`";

                  $res = mysqli_query($db, $sql);
                  echo $sql;
                  if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_object($res)) {
                      echo "<option value='".$row->service_id."'>".h(ucwords($row->service))."</option>";
                    }
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="provider">Provider :</label>
              <select name="provider" class="form-control" id="provider" disabled="disabled"><option>------- Select --------</option></select>
            </div>

            <div class="form-group">
              <label for="app_time">Available Times :</label>
              <select name="app_time" class="form-control" id="app_time" disabled="disabled"><option>------- Select --------</option></select>
            </div>

            <div id="operations">
              <input class="btn btn-primary" type="submit" value="Submit" />
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
