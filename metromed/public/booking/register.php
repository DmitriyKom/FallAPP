<?php require_once('../private/initialize.php');
include(SHARED_PATH . '/metromed_header.php');
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'fallapp');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$email = "";
$password = "";
$first_name = "";
$last_name = "";
$middle_name = "";
$address = "";
$city = "";
$state = "";
$zipcode = "";
$phone = "";
$SSN = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT ssn FROM user_info WHERE ssn = '".trim($_POST["SSN"])."'";
        if ($stmt = mysqli_prepare($link, $sql)) {
            $param_email = trim($_POST["SSN"]);;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    echo  "This SSN already taken.";
                    return false;
                } else {
                    $SSN = trim($_POST["SSN"]);;
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
    $sql = "SELECT email FROM user WHERE email = '".trim($_POST["email"])."'";
    if ($stmt = mysqli_prepare($link, $sql)) {
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
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $middle_name = trim($_POST["middle_name"]);
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $zipcode = trim($_POST["zipcode"]);
    $phone = trim($_POST["phone_number"]);
    
        $insert_user_info_query = "INSERT INTO user_info(first_name,last_name,middle_name,address,city,state,zip,phone_number,SSN,ins_id)
            VALUES('". $first_name."','".$last_name."','".$middle_name."','".$address ."','".
            $city ."','". $state ."','". $zipcode ."',". $phone .",". $SSN .", 1 )";
        // echo $insert_user_info_query;
        if (mysqli_query($link, $insert_user_info_query)) {
            //echo "Users Information added successfully";
        } else {
            echo "ERROR: Could not able to execute sql1. "
                . mysqli_error($link);
            return false;
        };
    $sql = "SELECT user_id FROM user_info WHERE SSN =".$SSN;
    if ($stmt = mysqli_prepare($link, $sql)) {
        $param_email = trim($_POST["email"]);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $user_id);
                if(mysqli_stmt_fetch($stmt)) {
                    $_SESSION["user_id"] = $user_id;
                    $insert_user_query = "INSERT INTO user(user_id, email, password) VALUES(
                " . $user_id . "," . '"' . $email . '"' . "," . '"' . $password . '"' . ")";
                    if (mysqli_query($link, $insert_user_query)) {
                        echo "Thank you for registering";
                    } else {
                        echo "ERROR: Could not able to execute sql2. "
                            . mysqli_error($link);
                        return false;
                    };
                }
            }
        }
        return true;
    }//end of addUsers_Info function
    mysqli_close($link);
}
?>

    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>

<form class="form-signin" method="post" >
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <br>
    <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <input type="text"  name="first_name" id="inputPassword" class="form-control" placeholder="First Name" required>
    <input type="text"  name="last_name" id="inputPassword" class="form-control" placeholder="last Name" required>
    <input type="text"  name="middle_name" id="inputPassword" class="form-control" placeholder="Middle Name">
    <input type="text"  name="address" id="inputPassword" class="form-control" placeholder="Address">
    <input type="text"  name="city" id="inputPassword" class="form-control" placeholder="City">
    <input type="text"  name="state" id="inputPassword" class="form-control" placeholder="State">
    <input type="text"  name="zipcode" id="inputPassword" class="form-control" placeholder="Zipcode">
    <input type="text"  name="phone_number" id="inputPassword" class="form-control" placeholder="Phone Number">
    <input type="password"  name="SSN" id="inputPassword" class="form-control" placeholder="SSN" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    <a href="Register.php">Register account</a>
</form>



<?php include(SHARED_PATH . '/metromed_footer.php');  session_destroy();?>

