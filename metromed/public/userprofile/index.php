<?php

require_once('../../private/initialize.php');

include(SHARED_PATH . '/metromed_header.php');

$page_title = 'User Profile';

$u_id = $_SESSION['user_id'];

if(is_post()) {

  $user = array();
  $user['f_name'] = $_POST['f_name'] ?? '';
  $user['f_name'] = $_POST['f_name'] ?? '';
  $user['l_name'] = $_POST['l_name'] ?? '';
  $user['m_name'] = $_POST['m_name'] ?? '';
  $user['address'] = $_POST['address'] ?? '';
  $user['city'] = $_POST['city'] ?? '';
  $user['state'] = $_POST['state'] ?? '';
  $user['zip'] = $_POST['zip'] ?? '';
  $user['phone_number'] = $_POST['phone_number'] ?? '';
  $user['user_id'] = $_SESSION['user_id'] ?? '';
  $user['email'] = $_POST['email'] ?? '';

  $result = update_user($user);
  redirect_to(url_for('/userprofile.php'));

} else {

  $user_id = find_user_by_id_2($u_id);

}

?>

<div class="d-flex pt-5" id="wrapper">
  <div class="bg-light border-right" id="sidebar-left">
    <div class="list-group list-group-flush">
      <a href="<?php echo url_for('userprofile/index.php') ?>" class="list-group-item list-group-item-action active">My Profile</a>
      <a href="<?php echo url_for('userprofile/insurance.php') ?>" class="list-group-item list-group-item-action bg-light">Insurance</a>
      <a href="<?php echo url_for('booking/appointment.php') ?>" class="list-group-item list-group-item-action bg-light">Appointments</a>
    </div>
  </div>

  <div class="page-content">

    <form class="ml-3" action="<?php echo url_for('userprofile.php?user_id=' . h(u($u_id))); ?>" method="post">
      <input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="f_name">First Name</label>
          <input type="text" class="form-control" name="f_name" id="f_name" placeholder="First" value="<?php echo h($user_id['f_name']); ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="m_name">Middle Name</label>
          <input type="text" class="form-control" name="m_name" id="m_name" placeholder="Middle" value="<?php echo h($user_id['m_name']); ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="l_name">Last Name</label>
          <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Last" value="<?php echo h($user_id['l_name']); ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo h($user_id['email']); ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="phone_number">Phone Number</label>
          <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone" value="<?php echo h($user_id['phone_number']); ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" value="<?php echo h($user_id['address']); ?>">
      </div>
      <!-- <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" name="inputAddress2" placeholder="Apartment, Unit, etc...">
      </div> -->
      <div class=" form-row">
        <div class="form-group col-md-6">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" id="city" placeholder="city" value="<?php echo h($user_id['city']); ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="state">State</label>
          <select name="state" class="form-control">
            <option selected>
              <?php echo h($user_id['state']); ?>
            </option>
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
            <option value="Minnesota">Minnesota</option>
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
          <label for="zip">Zip</label>
          <input type="text" class="form-control" name="zip" id="zip" placeholder="zipcode" value="<?php echo h($user_id['zip']); ?>">
        </div>
      </div>
      <div id="operations">
      <input type="submit" class="btn btn-primary" value="Update" />
        <!-- <input type="submit" value="Add Patient" /> -->
      </div>
    </form>
  </div>
</div>
<!-- </div> -->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
