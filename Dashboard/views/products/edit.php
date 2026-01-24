<?php require "functions/connection.php"; 

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$query = "select * from product where id = $id";
$result = mysqli_query($connection, $query);
$product = mysqli_fetch_assoc($result);
?>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Product</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="functions/products/edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input value="<?= @$product['name'] ?>" type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                      </div>
                     
                        <?php if (isset($_SESSION['errors']['name'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['name']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputprice">Price</label>
                        <input value="<?= @$product['price'] ?>" type="text" class="form-control" id="exampleInputprice" placeholder="price" name="price">
                      </div>
                      <?php if (isset($_SESSION['errors']['price'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['price']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputsale">sale</label>
                        <input value="<?= @$product['sale'] ?>" type="text" class="form-control" id="exampleInputsale" placeholder="sale" name="sale">
                      </div>
                      <?php if (isset($_SESSION['errors']['sale'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['sale']; ?></div>
                        <?php } ?>

                        <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="cat" id="exampleSelectGender">

                        <?php 
                           $query = "select * from categories";
                           $result = mysqli_query($connection, $query);
                           $categories = mysqli_fetch_all($result , MYSQLI_ASSOC);

                           $select = "select * from categories where id = $id";
                           $run = mysqli_query($connection, $select);
                           $cat = mysqli_fetch_assoc($run );
                           $cat_name = $cat["name"];
                         foreach ($categories as $key => $value) {
                           
                          
                        ?>
                          <option <?= $value['name'] == $cat_name ? "selected" : "" ?>  value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>

                    
                    
                     
                       <div class="form-group">
                        <label for="exampleInputImage">Select  image</label>
                        <input type="file" class="form-control" id="exampleInputImage"  name="img[]" multiple>
                      </div>
                      
                      <?php if (isset($_SESSION['errors']['img'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['img']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputcount">count</label>
                        <input value="<?= @$product['count'] ?>" type="text" class="form-control" id="exampleInputcount" placeholder="count" name="count">
                      </div>
                     <?php if (isset($_SESSION['errors']['count'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['count'] ?></div>
                        <?php } ?>

                        <?php unset($_SESSION['errors']); ?>
                      <button type="submit" class="btn btn-gradient-primary me-2">Update PRODUCT</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>