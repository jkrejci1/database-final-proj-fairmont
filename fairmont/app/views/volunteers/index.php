<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Volunteers</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/volunteers/add" class="btn btn-primary">
       Add a volunteer
      </a>
    </div>
  </div>
  <div class="list-group">
  <?php foreach($data['volunteers'] as $volunteer) : ?>
    <a href="<?php echo URLROOT; ?>/volunteers/show/<?php echo $volunteer->volunteerID; ?>" class="list-group-item list-group-item-action"><?php echo $volunteer->name?></a>
  <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>