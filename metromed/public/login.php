<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Metro Medical Center'; ?>
<?php include(SHARED_PATH . '/metromed_header.php');
session_start();
$email = "";
$password = "";
$role = "";
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'fallapp');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
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
        if($stmt = mysqli_prepare($link, $sql)){
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $user_id, $email, $actPassword, $role);
                    if(mysqli_stmt_fetch($stmt)){
                       if((trim($password) == trim($actPassword))){
                           echo $email." ".$password;
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["Email"] = $email;
                            $_SESSION["role"] = $role;
                            switch($role){
                                case "Customer":
                                    echo "You have logged in";
                                    //header("location: index.php");
                                    break;
                                case "doctor":
                                    header("location: contact.php");
                                    break;
                                default:
                                    header("location: .php");}
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
        mysqli_close($link);
}
?>

    <form class="form-signin" method="post" >
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
        <a href="Register.php">Register account</a>
    </form>




    
<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
