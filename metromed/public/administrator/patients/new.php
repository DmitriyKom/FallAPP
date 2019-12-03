<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'New Patient'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div class="schedule">

  <a class="back-link" href="<?php echo url_for('/administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="page new">
    <h1>Add New Patient</h1>

    <form action="<?php echo url_for('/administrator/patients/create.php'); ?>" method="post">
          <label class="label" for="f_name">First Name</label>
          <input type="text" name="f_name" id="f_name" value="<?php echo h($f_name); ?>" / autofocus>

        <label class="label" for="l_name">Last Name</label>
        <input type="text" name="l_name" id="l_name" value="<?php echo h($l_name); ?>" />

        <label class="label" for="m_name">Middle Name</label>
        <input type="text" name="m_name" id="m_name" value="<?php echo h($m_name); ?>" />

        <label class="label" for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo h($email); ?>" />

        <label class="label" for="password">Password</label>
        <input type="password" name="password" id="password" value="<?php echo h($password); ?>" />

        <label class="label" for="role">Role</label>
        <select name="role" id="role">
          <option value="1"<?php if($role == 1) { echo " selected"; } ?>>Patient</option>
          <option value="2"<?php if($role == 2) { echo " selected"; } ?>>Provider</option>
          <option value="3"<?php if($role == 3) { echo " selected"; } ?>>Administrator</option>
        </select>

        <label class="label" for="enabled">Enabled</label>
        <input style="padding-right: 90%;" type="checkbox" name="enabled" id="enabled" value="<?php echo h("1"); ?>" />

        <label class="label" for="address">Address</label>
        <input type="text" name="address" id="address" value="<?php echo h($address); ?>" />

        <label class="label" for="city">City</label>
        <input type="text" name="city" id="city" value="<?php echo h($city); ?>" />

        <label class="label" for="state">State</label>
        <input type="text" name="state" id="state" value="<?php echo h($state); ?>" />

        <label class="label" for="zip">Zip</label>
        <input type="text" name="zip" id="zip" value="<?php echo h($zip); ?>" />

        <label class="label" for="phone_number">Phone Number</label>
        <input type="tel" name="phone_number" pattern="[0-9]{10}" id="phone_number" value="<?php echo h($phone_number); ?>" /required>

        <label class="label" for="dob">DOB</label>
        <input type="date" name="dob" id="dob" value="<?php echo h($dob); ?>" / required>

        <label class="label" for="ins_id">Insurance ID</label>
        <select name="ins_id" id="ins_id">
          <option value="1"<?php if($ins_id == "1") { echo " selected"; } ?>>1</option>
          <option value="2"<?php if($ins_id == "2") { echo " selected"; } ?>>2</option>
        </select>

        <label class="label" for="policy_number">Policy Number</label>
        <input type="text" name="policy_number" id="policy_number" value="<?php echo h($policy_number); ?>" / required>

      <div id="operations">
        <input type="submit" value="Add Patient" />
      </div>
    </form>

  </div>

</div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
