<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Leaders</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/leaders/add" class="btn btn-primary">
       Add leader
      </a>
    </div>
  </div>
  <div class="list-group">
  <?php foreach($data['leaders'] as $leader) : ?>
    <a href="<?php echo URLROOT; ?>/leaders/show/<?php echo $leader->leaderID; ?>" class="list-group-item list-group-item-action"><?php echo $leader->name;?></a>
  <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>