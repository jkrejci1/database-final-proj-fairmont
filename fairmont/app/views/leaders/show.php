<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/leaders" class="btn btn-light">Back</a>
<br>
<h1><?php echo $data['leader']->name; ?></h1>
<p>Email: <?php echo $data['leader']->email; ?></p>
<p>Phone Number: <?php echo $data['leader']->phoneNumber; ?></p>


<a href="<?php echo URLROOT; ?>/leaders/edit/<?php echo $data['leader']->id; ?>" class="btn btn-dark">Edit</a>

  <div class="d-flex justify-content-end">
  <form class="ms-auto" action="<?php echo URLROOT; ?>/leaders/delete/<?php echo $data['leader']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>