<?php require "functions/connection.php";


  $query = 'select * from categories';
  $run = mysqli_query($connection, $query);
  $num = mysqli_num_rows($run);


?>

<div class="row">
  <!-- الجدول -->
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Categories</h4>
        <p class="card-description"> Add class <code>.table-bordered</code> </p>
        <table class="table table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>#</th>
              <th>Category Name</th>
            </tr>
          </thead>
          <tbody>
          
          <?php if($num != 0){ 
            
            $cat = mysqli_fetch_all($run , MYSQLI_ASSOC);
            foreach ($cat as $key => $value) {

            ?>

            <tr>
              <td><?= ++$key ?></td>
              <td><?= $value['name'] ?></td>
            </tr>

            <?php } } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- الفورم -->
  <div class="col-md-6 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Category</h4>
        <form class="forms-sample" action="functions/products/addCategory.php" method="post">
          <div class="form-group">
            <label for="exampleInputUsername1">Category Name : </label>
            <input type="text" name="category" class="form-control" id="exampleInputUsername1" placeholder="Category">
          </div>

          <?php if (isset($_SESSION['error'])) { ?>
             <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['error']; ?></div>
          <?php } unset( $_SESSION['error'] ); ?>

          <button type="submit" class="btn btn-gradient-primary me-2">ADD CATEGORY</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
