<?php require_once('../private/initialize.php');
include(SHARED_PATH . '/metromed_header.php');

global $db;
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $insert_user_info_query = "INSERT INTO user_info(f_name,l_name,m_name,address,city,state,zip,phone_number,ins_id)
            VALUES('". $f_name."','".$l_name."','".$m_name."','".$address ."','".
            $city ."','". $state ."','". $zipcode ."',". $phone .", 1 )";
        // echo $insert_user_info_query;
        if (mysqli_query($db, $insert_user_info_query)) {
            //echo "Users Information added successfully";
        } else {
            echo "ERROR: Could not able to execute sql1. "
                . mysqli_error($db);
            return false;
        };
    $sql = "SELECT user_id FROM user_info WHERE SSN =".$SSN;
    if ($stmt = mysqli_prepare($db, $sql)) {
        $param_email = trim($_POST["email"]);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $user_id);
                if(mysqli_stmt_fetch($stmt)) {
                    $_SESSION["user_id"] = $user_id;
                    $insert_user_query = "INSERT INTO user(user_id, email, password) VALUES(
                " . $user_id . "," . '"' . $email . '"' . "," . '"' . $password . '"' . ")";
                    if (mysqli_query($db, $insert_user_query)) {
                        echo "Thank you for registering";
                    } else {
                        echo "ERROR: Could not able to execute sql2. "
                            . mysqli_error($db);
                        return false;
                    };
                }
            }
        }
        return true;
    }//end of addUsers_Info function
    mysqli_close($db);
}
?>

    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>

<form class="form-signin" method="post" >
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus>
    <br>
    <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <input type="text"  name="f_name" id="inputPassword" class="form-control" placeholder="First Name" required>
    <input type="text"  name="l_name" id="inputPassword" class="form-control" placeholder="Last Name" required>
    <input type="text"  name="m_name" id="inputPassword" class="form-control" placeholder="Middle Name">
    <input type="text"  name="address" id="inputPassword" class="form-control" placeholder="Address">
    <input type="text"  name="city" id="inputPassword" class="form-control" placeholder="City">
    <input type="text"  name="state" id="inputPassword" class="form-control" placeholder="State">
    <input type="text"  name="zipcode" id="inputPassword" class="form-control" placeholder="Zipcode">
    <input type="text"  name="phone_number" id="inputPassword" class="form-control" placeholder="Phone Number">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    <a href="register.php">Register account</a>
</form>



<?php include(SHARED_PATH . '/metromed_footer.php');  session_destroy();?>
