<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php /*flash('team_message');*/ ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Schedules</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/schedules/add" class="btn btn-primary">
       Add schedule
      </a>
    </div>
  </div>
  <div class="list-group">
  <?php foreach($data['schedules'] as $schedule) : ?>
    <!--Creates a link with the teams id at the end to properly show it on the teams page-->
    <a href="<?php echo URLROOT; ?>/schedules/show/<?php echo $schedule->id; ?>" class="list-group-item list-group-item-action">
    <b><?php echo $schedule->VolunteerFirstName;?> <?php echo $schedule->VolunteerLastName;?>:</b> <?php echo $schedule->jobDate;?></a>
  <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>