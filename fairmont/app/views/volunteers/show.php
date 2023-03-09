<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/volunteers" class="btn btn-light">Back</a>
<br>
<h1><?php echo $data['volunteer']->name; ?></h1>
<p>Email: <?php echo $data['volunteer']->email; ?></p>
<p>Phone Number: <?php echo $data['volunteer']->phoneNumber; ?></p>


<a href="<?php echo URLROOT; ?>/volunteers/edit/<?php echo $data['volunteer']->id; ?>" class="btn btn-dark">Edit</a>

  <div class="d-flex justify-content-end">
  <form class="ms-auto" action="<?php echo URLROOT; ?>/volunteers/delete/<?php echo $data['volunteer']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>