<?php

require_once('../../private/initialize.php');

$page_title = 'Book';

include(SHARED_PATH . '/metromed_header.php');

  if (isset($_GET['date'])) {
    $date = $_GET['date'];
  }

  if (is_post()) {
    $appointment = [];
    $appointment['user_id'] = $_SESSION['user_id'];
    $appointment['doc_id'] = $_POST['doc_id'];
    $appointment['app_date'] = $date;

    $result = book_appointment($appointment);
    echo "$result";
  }

?>

<div class="container">
  <h1 class="text-center">Appointmenmt for: <?php echo date('F d, Y',strtotime($date)); ?></h1><hr>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <form action="<?php echo url_for('/booking/book.php?date=' . h(u($date))); ?>" method="post" autocomplete="off">

        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="user_id">
        </div>
        <div class="form-group">
          <label for="">Doctor</label>
          <input type="text" class="form-control" name="doc_id" value="">
        </div>
        <!-- <button class="btn btn-primary" type="submit" name="submit">Submit</button> -->
        <div id="operations">
          <input class="btn btn-primary" type="submit" value="Submit" />
        </div>
      </form>
    </div>
  </div>
</div>



<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
