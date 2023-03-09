<?php require APPROOT . '/views/inc/header.php';?>
  <a href="<?php echo URLROOT; ?>/schedules" class="btn btn-light">Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Schedule</h2>
    <form action="<?php echo URLROOT; ?>/schedules/add" method="post">

    <!--Name information for the volunteer-->
    <label for="volunteerName">Volunteer Name: <sup>*</sup></label>
    <!--All the possible volunteers to choose from-->
      <div class="from-group">
        <select name="volunteerID">
          <?php foreach($data['volunteers'] as $volunteer) : ?>
            <!--Use the id of the leader as the value-->         
            <option value="<?php echo $volunteer->volunteerID;?>"> <?php echo $volunteer->firstName;?> <?php echo $volunteer->lastName;?></option>
          <?php endforeach; ?>
        </select>
      </div>
        

    <!--Name information for the volunteer-->
    <label for="leaderName">Leader Name: <sup>*</sup></label>
    <!--All the possible volunteers to choose from-->
      <div class="from-group">
        <select name="leaderID">
          <?php foreach($data['leaders'] as $leader) : ?>
          <!--Use the id of the leader as the value-->         
            <option value="<?php echo $leader->leaderID;?>"> <?php echo $leader->firstName;?> <?php echo $leader->lastName;?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!--Information for the date-->
      <div class="from-group">
        <label for="jobDate">Date (YEAR-MM-DD): <sup>*</sup></label>
        <input name="jobDate" class="form-control form-control-lg <?php echo (!empty($data['jobDate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['jobDate']; ?>">
        <span class="invalid-feedback"><?php echo $data['jobDate']; ?></span>
      </div>

      <!--Information for the time-->
      <!--For the start time-->
      <div class="form-group">
        <label for="startTime">Start Time (HH:MM:SS): <sup>*</sup></label>
        <input name="startTime" class="form-control form-control-lg <?php echo (!empty($data['startTime_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['startTime']; ?>">
        <span class="invalid-feedback"><?php echo $data['startTime']; ?></span>
      </div>

      <!--For the end time-->
      <div class="form-group">
        <label for="endTime">End Time (HH:MM:SS): <sup>*</sup></label>
        <input name="endTime" class="form-control form-control-lg <?php echo (!empty($data['endTime_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['endTime']; ?>">
        <span class="invalid-feedback"><?php echo $data['endTime']; ?></span>
      </div>

      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>