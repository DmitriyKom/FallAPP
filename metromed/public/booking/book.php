<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Book'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>


<?php
  if (isset($_GET['date'])) {
    $date = $_GET['date'];
  }

//Leaving commented until DB details are known

  // if (isset($_POST['submit'])) {
  //   $name = $_POST['name'];
  //   $email = $_POST['email'];
  //
  //
  //   //mysqli connection to DB
  //   $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
  //   if (mysqli_connect_errno()) {
  //      echo '<p>Error: Could not connect to database.<br/>
  //      Please try again later.</p>';
  //      exit;
  //   }
  //
  //   Prepared stmt to insert appt
  //   Need to determine how to use session variables to eliminate the need to use POST variables
  
  //   $query = "INSERT INTO booking (name, email, date) VALUES (?,?,?)";
  //   $stmt = mysqli_prepare($db, $query);
  //   mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $date);
  //   mysqli_stmt_execute($stmt);
  //   $msg = "<div class='alert alert-success'>Booking Successfull</div>";
  //
  //   mysqli_stmt_free_result($stmt);
  //   mysqli_close($db);
  //
  //
  // }
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
