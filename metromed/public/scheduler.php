<?php

  require_once('../private/initialize.php');

  $page_title = 'Schedule';

  include(SHARED_PATH . '/metromed_header.php');

?>


    <div class="schedule">
        <h1 class="text-center">Schedule New Patient<br></h1>
        <form action="" method="POST">
          <label for="fname"> Patient First Name</label>
          <input type="text" id="fname" name="first" placeholder="Patient First Name">

          <label for="lname">Patient Last Name</label>
          <input type="text" id="lname" name="last" placeholder="Patient Last Name">

          <label for="address">Patient Address</label>
          <input type="text" id="address" name="address" placeholder="Patient Address">


          <label for="country">Country</label>
          <select id="country" name="country">
              <option value="usa">United States of America</option>
              <option value="Canada">Canada</option>
              <option value="mexico">Mexico</option>
          </select>

          <label for="insurance">Insurance Company</label>
          <input type="text" id="insurance" name="insurance" placeholder="Insurance Company">

          <label for="policy">Policy Number</label>
          <input type="text" id="policy" name="policy" placeholder="Policy Number">

          <label for="calender">Appointment Date</label>
          <input type="date" data-date-inline-picker="true">

          <input type="submit" value="Submit">
        </form>
      </div>



    <?php include(SHARED_PATH . '/metromed_footer.php'); ?>
