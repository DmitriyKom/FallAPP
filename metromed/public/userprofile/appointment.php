<?php

  require_once('../../private/initialize.php');
  require_once('../../private/calendar_functions.php');

  include(SHARED_PATH . '/metromed_header.php');

  //Restrict page to administrators
  if($_SESSION['loggedin'] = true){
    redirect_to(url_for('/index.php'));
  }

  $page_title = 'Appointments';

?>

<div class="d-flex pt-5" id="wrapper">
  <div class="bg-light border-right" id="sidebar-left">
    <div class="list-group list-group-flush">

      <a href="<?php echo url_for('userprofile/index.php') ?>" class="list-group-item list-group-item-action bg-light">My Profile</a>

      <?php
        if ($_SESSION['role'] == "1") {
          echo '<a href="';
          echo url_for('userprofile/insurance.php');
          echo '"';
          echo 'class="list-group-item list-group-item-action bg-light">Insurance</a>';
        }
      ?>

      <a href="<?php echo url_for('userprofile/appointment.php') ?>" class="list-group-item list-group-item-action active">Appointments</a>

      <?php
        if ($_SESSION['role'] == "3") {
          echo '<a href="';
          echo url_for('administrator/patients/index.php');
          echo '"';
          echo 'class="list-group-item list-group-item-action bg-light">Patients</a>';
        }
      ?>
    </div>
  </div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
        date_default_timezone_set("America/Menominee");
        $dateComponents = getdate();
        if (isset($_GET['month']) && isset($_GET['year'])) {
          $month = $_GET['month'];
          $year = $_GET['year'];
        }else {
          $month = $dateComponents['mon'];
          $year = $dateComponents['year'];
        }
        echo build_calendar($month, $year);
      ?>
    </div>
  </div>
</div>
</div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
