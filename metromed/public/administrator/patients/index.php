<?php require_once('../../../private/initialize.php'); ?>
<?php

  $patient_set = find_all_patients();
  // echo $patient_set;
?>

<?php $page_title = 'Patients'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Patients</h1>

    <div class="actions">
      <a class="actions" href="<?php echo url_for('/administrator/patients/new.php'); ?>">Add New Patient</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
  	    <th>M.I.</th>
        <th>Phone</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($patient = mysqli_fetch_assoc($patient_set)) { ?>
        <tr>
          <td><?php echo h($patient['user_id']); ?></td>
          <td><?php echo h($patient['f_name']); ?></td>
          <td><?php echo h($patient['l_name']); ?></td>
    	    <td><?php echo h($patient['m_name']); ?></td>
          <td><?php echo h($patient['phone_number']); ?></td>

          <td><a class="action" href="<?php echo url_for('/administrator/patients/view.php?user_id=' . h(u($patient['user_id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/administrator/patients/edit.php?user_id=' . h(u($patient['user_id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/administrator/patients/remove.php?user_id=' . h(u($patient['user_id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($patient_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
