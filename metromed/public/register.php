<?php

require_once('../private/initialize.php');

include(SHARED_PATH . '/metromed_header.php');

$email = "";
$password = "";
$f_name = "";
$l_name = "";
$m_name = "";
$address = "";
$city = "";
$state = "";
$zipcode = "";
$phone = "";
$dob = "";

if (is_post()) {
    $sql = "SELECT email FROM user WHERE email = '".trim($_POST["email"])."'";
    if ($stmt = mysqli_prepare($db, $sql)) {
        $param_email = trim($_POST["email"]);;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                echo "This email has already been taken.";
                return false;
            } else {
                $email = trim($_POST["email"]);;
            }
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    $password =  trim($_POST["password"]);
    $f_name = trim($_POST["f_name"]);
    $l_name = trim($_POST["l_name"]);
    $m_name = trim($_POST["m_name"]);
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $zipcode = trim($_POST["zipcode"]);
    $phone = trim($_POST["phone_number"]);
    $dob = trim($_POST["dob"]);



        $insert_user_info_query = "INSERT INTO user_info(f_name,l_name,m_name,address,city,state,zip,phone_number,dob,ins_id)
            VALUES('". $f_name."','".$l_name."','".$m_name."','".$address ."','".
            $city ."','". $state ."','". $zipcode ."','". $phone ."','". $dob ."', 1 )";
        echo $insert_user_info_query;

        global $db;

        // mysqli_begin_transaction($db, MYSQLI_TRAN_START_READ_WRITE);

        if (mysqli_query($db, $insert_user_info_query)) {
            echo "Users Information added successfully";
        } else {
            echo "ERROR: Not able to execute sql1. "
                . mysqli_error($db);
            return false;
        };
    $new_id = mysqli_insert_id($db);
    $sql = "SELECT user_id FROM user_info WHERE user_id =".$new_id;
    if ($stmt = mysqli_prepare($db, $sql)) {
        $param_email = trim($_POST["email"]);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $user_id);
                if(mysqli_stmt_fetch($stmt)) {
                    $_SESSION["user_id"] = $user_id;
                    $insert_user_query = "INSERT INTO user(email, password) VALUES(
                " . '"' . $email . '"' . "," . '"' . $password . '"' . ")";
                    if (mysqli_query($db, $insert_user_query)) {
                        echo "Thank you for registering";
                    } else {
                        echo "ERROR: Not able to execute sql2. "
                            . mysqli_error($db);
                        return false;
                    };
                }
            }
        }
        return true;
    }//end of addUsers_Info function
    // mysqli_commit($db);
    mysqli_close($db);
}
?>

    <!-- <h2>Sign Up</h2> -->
    <!-- <p>Please fill this form to create an account.</p> -->

  <form class="form-signin" method="post" >
    <h1 class="h3 mb-3 font-weight-normal" id="form-labels">Create an account</h1>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required autofocus>
    <br>
    <input type="password"  name="password" id="password" class="form-control" placeholder="Password" required>
    <input type="text"  name="f_name" id="f_name" class="form-control" placeholder="First Name" >
    <input type="text"  name="l_name" id="l_name" class="form-control" placeholder="Last Name" >
    <input type="text"  name="m_name" id="m_name" class="form-control" placeholder="Middle Name" >
    <input type="text"  name="address" id="address" class="form-control" placeholder="Address" >
    <input type="text"  name="city" id="city" class="form-control" placeholder="City" >
    <input type="text"  name="state" id="state" class="form-control" placeholder="State" >
    <input type="text"  name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode" >
    <input type="text"  name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number">
    <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" >
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <br />
    <?php echo "Already have an account?" ?>
    <a href="login.php">Sign in</a>
  </form>



<?php include(SHARED_PATH . '/metromed_footer.php');  session_destroy();?>
