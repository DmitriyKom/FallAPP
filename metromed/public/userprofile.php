<?php require_once('../private/initialize.php'); ?>

<?php
$email = filter_input(INPUT_POST, 'Email');
$password = filter_input(INPUT_POST, 'password');
 ?>

<?php $page_title = 'User Profile'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div class="d-flex pt-5" id="wrapper">
  <div class="bg-light border-right" id="sidebar-left">
    <div class="list-group list-group-flush">
      <a href="userprofile.html" class="list-group-item list-group-item-action active">My Profile</a>
      <a href="#" class="list-group-item list-group-item-action bg-light">Insurance</a>
      <a href="#" class="list-group-item list-group-item-action bg-light">Appointments</a>

    </div>
  </div>

  <div class="page-content">

    <?php
      $conn = mysqli_connect("localhost", "root", "", "fallapp");
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else {
      $sql = "SELECT * FROM user WHERE email='".$email."'";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()){
        $userId=$row['user_id'];
        $Email=$row['email'];
        $Password=$row['password'];
        }

        $sql = "SELECT * FROM user_info WHERE user_id='".$userId."'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
          $userId=$row['user_id'];
          $Firstname=$row['f_name'];
          $Lastname=$row['l_name'];
          $Middlename=$row['m_name'];
          $Address=$row['address'];
          $City=$row['city'];
          $State=$row['state'];
          $Zipcode=$row['zip'];
          $Phone=$row['phone_number'];
          }
        }
    ?>

    <form class="ml-3" action="userupdate.php" method="post">
      <input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputFirstName">First Name</label>
          <input type="text" class="form-control" name="inputFirstName" placeholder="First" value="<?php echo $Firstname; ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="inputMiddleName">Middle Name</label>
          <input type="text" class="form-control" name="inputMiddleName" placeholder="Middle" value="<?php echo $Middlename; ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="inputLastName">Last Name</label>
          <input type="text" class="form-control" name="inputLastName" placeholder="Last" value="<?php echo $Lastname; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" name="inputEmail" placeholder="Email" value="<?php echo $Email; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPhone">Phone Number</label>
          <input type="text" class="form-control" name="inputPhone" placeholder="Phone" value="<?php echo $Phone; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St" value="<?php echo $Address; ?>">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" name="inputAddress2" placeholder="Apartment, Unit, etc...">
      </div>
      <div class=" form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" class="form-control" name="inputCity" placeholder="city" value="<?php echo $City; ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State</label>
          <select name="inputState" class="form-control">
            <option selected>Choose...</option>
            <option value="Alabama">Alabama</option>
            <option value="Alaska">Alaska</option>
            <option value="Arizona">Arizona</option>
            <option value="Arkansas">Arkansas</option>
            <option value="California">California</option>
            <option value="Colorado">Colorado</option>
            <option value="Connecticut">Connecticut</option>
            <option value="Delaware">Delaware</option>
            <option value="District of Columbia">District of Columbia</option>
            <option value="Florida">Florida</option>
            <option value="Georgia">Georgia</option>
            <option value="Hawaii">Hawaii</option>
            <option value="Idaho">Idaho</option>
            <option value="Illinois">Illinois</option>
            <option value="Indiana">Indiana</option>
            <option value="Iowa">Iowa</option>
            <option value="Kansas">Kansas</option>
            <option value="Kentucky">Kentucky</option>
            <option value="Louisiana">Louisiana</option>
            <option value="Maine">Maine</option>
            <option value="Maryland">Maryland</option>
            <option value="Massachusetts">Massachusetts</option>
            <option value="Michigan">Michigan</option>
            <option selected="selected" value="Minnesota">Minnesota</option>
            <option value="Mississippi">Mississippi</option>
            <option value="Missouri">Missouri</option>
            <option value="Montana">Montana</option>
            <option value="Nebraska">Nebraska</option>
            <option value="Nevada">Nevada</option>
            <option value="New Hampshire">New Hampshire</option>
            <option value="New Jersey">New Jersey</option>
            <option value="New Mexico">New Mexico</option>
            <option value="New York">New York</option>
            <option value="North Carolina">North Carolina</option>
            <option value="North Dakota">North Dakota</option>
            <option value="Ohio">Ohio</option>
            <option value="Oklahoma">Oklahoma</option>
            <option value="Oregon">Oregon</option>
            <option value="Pennsylvania">Pennsylvania</option>
            <option value="Rhode Island">Rhode Island</option>
            <option value="South Carolina">South Carolina</option>
            <option value="South Dakota">South Dakota</option>
            <option value="Tennessee">Tennessee</option>
            <option value="Texas">Texas</option>
            <option value="Utah">Utah</option>
            <option value="Vermont">Vermont</option>
            <option value="Virginia">Virginia</option>
            <option value="Washington">Washington</option>
            <option value="West Virginia">West Virginia</option>
            <option value="Wisconsin">Wisconsin</option>
            <option value="Wyoming">Wyoming</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Zip</label>
          <input type="text" class="form-control" name="inputZip" placeholder="zipcode" value="<?php echo $Zipcode; ?>">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
