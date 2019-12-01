<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Metro Medical Center'; ?>
<?php include(SHARED_PATH . '/metromed_header.php');


$email = "";
$password = "";
$role = "";

global $db;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["Email"]))){
        $email_err = "Please enter email address.";
    } else{
        $email = trim($_POST["Email"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
        $sql = "SELECT user_id, email, password, role FROM user WHERE email ='".$email."'";
        if($stmt = mysqli_prepare($db, $sql)){
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $user_id, $email, $actPassword, $role);
                    if(mysqli_stmt_fetch($stmt)){
                       if((trim($password) == trim($actPassword))){
                           echo $email." ".$password;
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["email"] = $email;
                            $_SESSION["role"] = $role;
                            switch($role){
                                case "1":
                                    echo "You have logged in";
                                    header("location: userprofile.php");
                                    break;
                                case "2":
                                    header("location: contact.php");
                                    break;
                                case "3":
                                    header("location: administrator/index.php");
                                    break;
                                default:
                                    header("location: index.php");}
                        } else{
                            echo "The password you entered was not valid.";
                        }
                    }
                } else{
                    echo  "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db);
}
?>

    <form class="form-signin" method="post" >
      <h1 class="h3 mb-3 font-weight-normal" id="form-labels">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <!-- <div class="checkbox mb-3">
        <input type="checkbox" value="remember-me">
        <label>Remember me</label>
      </div> -->
      <div style="white-space:nowrap" class="checkbox mb-3">
        <input type="checkbox" value="remember-me" id="inputRememberMe"/>
        <label for="inputRememberMe">Remember me</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br />
      <?php echo "Don't have an account yet?" ?>
        <a href="register.php">Register here</a>
    </form>





<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
