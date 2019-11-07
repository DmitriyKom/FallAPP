<?php require_once('../private/initialize.php'); ?>
<?php require_once('../private/calendar_functions.php'); ?>

<?php $page_title = 'Appointments'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>


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



<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
