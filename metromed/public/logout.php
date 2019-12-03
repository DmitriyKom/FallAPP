<?php

  require_once('../private/initialize.php');

  $page_title = 'Log Out';

  include(SHARED_PATH . '/metromed_header.php');

  // Test if they *were* logged in
  $old_user = $_SESSION['loggedin'];
  unset($_SESSION['loggedin']);
  session_destroy();

?>

<!-- <h1>Log Out</h1> -->
<?php
  if (!empty($old_user))
  {
    echo '<p>You have successfully logged out.</p>';
  }
  else
  {
    // if they weren't logged in but came to this page somehow
    echo '<p>You were not logged in, and so have not been logged out.</p>';
  }
?>

<p><a href="<?php echo url_for('login.php') ?>">Back to Login</a></p>


<div class="">
  <div class="">

  </div>
  <h1 class="text-center"><strong>Thank you for visiting</strong><br><br></h1>
  <h3><br><br></h3>
  <h3></h3>

</div>




<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
