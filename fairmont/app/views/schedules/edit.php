<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/schedules" class="btn btn-light">Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Edit Schedule</h2>
    <form action="<?php echo URLROOT; ?>/schedules/edit/<?php echo $data['id']; ?>" method="post">

      <!--For the date-->
      <div class="form-group">
        <label for="normJobDate">Date: <sup>*</sup></label>
        <input name="normJobDate" class="form-control form-control-lg <?php echo (!empty($data['normJobDate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['normJobDate']; ?>">
        <span class="invalid-feedback"><?php echo $data['normJobDate']; ?></span>
      </div>

      <!--For the start time-->
      <div class="form-group">
        <label for="normStartTime">Start Time: <sup>*</sup></label>
        <input name="normStartTime" class="form-control form-control-lg <?php echo (!empty($data['normStartTime_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['normStartTime']; ?>">
        <span class="invalid-feedback"><?php echo $data['normStartTime']; ?></span>
      </div>

      <!--For the end time-->
      <div class="form-group">
        <label for="normEndTime">End Time: <sup>*</sup></label>
        <input name="normEndTime" class="form-control form-control-lg <?php echo (!empty($data['normEndTime_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['normEndTime']; ?>">
        <span class="invalid-feedback"><?php echo $data['normEndTime']; ?></span>
      </div>

      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>