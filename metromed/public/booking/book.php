<?php

require_once('../../private/initialize.php');

$page_title = 'Book';

include(SHARED_PATH . '/metromed_header.php');

  if (!isset($_GET['date'])) {
    redirect_to(url_for('userprofile/appointment.php'));
  }

  $date = $_GET['date'];

  if (is_post()) {
    $appointment = [];
    $appointment['user_id'] = $_SESSION['user_id'];
    $appointment['doc_id'] = $_POST['doc_id'];
    $appointment['app_date'] = $date;

    $result = book_appointment($appointment);
    echo "$result";
  }

  $f_name = find_user_by_id_3($_SESSION['user_id']);
  $provider_set = find_all_provider_names();
?>

<div class="container">
  <h1 class="text-center">Appointmenmt for: <?php echo h(ucwords($f_name['f_name']. " " .$f_name['l_name'])); ?>
    <?php echo " on ".date('F d, Y',strtotime($date)); ?></h1><hr>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <form action="<?php echo url_for('/booking/book.php?date=' . h(u($date))); ?>" method="post" autocomplete="off">

        <div class="form-group">
          <label for="">Patient Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">

          <label for="docName">Doctor</label>

          <select name="doc_id" id="docName">
            <?php while($provider = mysqli_fetch_assoc($provider_set)) { ?>
                <option value="<?php echo h($provider['user_id']) ?>"><?php echo h(ucwords($provider['f_name'])) . " " . h(ucwords($provider['l_name'])) ?></option>
            <?php } ?>
          </select>

          <!-- <input type="text" class="form-control" name="doc_id" value=""> -->
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
