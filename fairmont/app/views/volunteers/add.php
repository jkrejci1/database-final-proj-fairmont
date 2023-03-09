<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/volunteers" class="btn btn-light">Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Volunteer</h2>
    <form action="<?php echo URLROOT; ?>/volunteers/add" method="post">
      <div class="form-group">
        <label for="name">First Name: <sup>*</sup></label>
        <input type="text" name="firstName" class="form-control form-control-lg <?php echo (!empty($data['firstName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstName']; ?>">
        <span class="invalid-feedback"><?php echo $data['firstName']; ?></span>
      </div>
      <div class="form-group">
        <label for="name">Last Name: <sup>*</sup></label>
        <input type="text" name="lastName" class="form-control form-control-lg <?php echo (!empty($data['lastName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastName']; ?>">
        <span class="invalid-feedback"><?php echo $data['lastName']; ?></span>
      </div>
      <div class="form-group">
        <label for="email">Email: <sup>*</sup></label>
        <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
        <span class="invalid-feedback"><?php echo $data['email']; ?></span>
      </div>
      <div class="form-group">
        <label for="phoneNumber">Phone Number: <sup>*</sup></label>
        <input type="text" name="phoneNumber" class="form-control form-control-lg <?php echo (!empty($data['phoneNumber_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phoneNumber']; ?>">
        <span class="invalid-feedback"><?php echo $data['phoneNumber']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>