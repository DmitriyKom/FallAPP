<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Show Users'; ?>
<?php include(SHARED_PATH . '/metromed_header.php');
session_start();
$email = "";
$password = "";
$role = "";
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'fallappuser');
define('DB_PASSWORD', '1233');
define('DB_NAME', 'fallapp');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>

    <form class="form-signin" method="post" >
      <label style="display: inline" for="show_users">Display Users</label>
      <button style="display: inline" name="show_users"class="btn btn-lg btn-primary btn-block" type="submit">Go</button>
    </form>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
          $sql = "SELECT * FROM user";
          if($stmt = mysqli_prepare($link, $sql)){
              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);
                  if(mysqli_stmt_num_rows($stmt) >= 1){
                      mysqli_stmt_bind_result($stmt, $user_id, $email, $actPassword, $role, $enabled);

                      while(mysqli_stmt_fetch($stmt)) {
                        echo "<p><strong>User ID: ".$user_id."</strong>";
                        echo "<br />Email Address: ".$email;
                        echo "<br />Role: ".$role;
                      }
                  } else{
                      echo  "No account found with that email.";
                  }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }
          mysqli_stmt_close($stmt);
          mysqli_close($link);
  }
?>



<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
