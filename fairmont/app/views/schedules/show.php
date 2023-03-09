<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/schedules" class="btn btn-light">Back</a>
<br>

<h1>Volunteer: <?php echo $data['schedule']->VolunteerFirstName; ?> <?php echo $data['schedule']->VolunteerLastName; ?></h1>
<h4> <?php echo $data['schedule']->jobDate; ?></h4>
<h4> <?php echo $data['schedule']->startTime ?> - <?php echo $data['schedule']->endTime ?></h4>
<p>Leader: <?php echo $data['schedule']->LeaderFirstName; ?> <?php echo $data['schedule']->LeaderLastName; ?></p>
  <hr/>
  <a href="<?php echo URLROOT; ?>/schedules/edit/<?php echo $data['schedule']->id; ?>" class="btn btn-dark">Change Date & Time</a>

  <div class="d-flex justify-content-end">
  <form class="ms-auto" action="<?php echo URLROOT; ?>/schedules/delete/<?php echo $data['schedule']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>