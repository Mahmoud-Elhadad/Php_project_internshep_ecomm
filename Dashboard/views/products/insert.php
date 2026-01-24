<?php require "functions/connection.php"; ?>


<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="functions/products/add.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                      </div>
                     
                        <?php if (isset($_SESSION['errors']['name'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['name']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputprice">Price</label>
                        <input type="text" class="form-control" id="exampleInputprice" placeholder="price" name="price">
                      </div>
                      <?php if (isset($_SESSION['errors']['price'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['price']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputsale">sale</label>
                        <input type="text" class="form-control" id="exampleInputsale" placeholder="sale" name="sale">
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
                         foreach ($categories as $key => $value) {
                           
                          
                        ?>
                          <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
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
                        <input type="text" class="form-control" id="exampleInputcount" placeholder="count" name="count">
                      </div>
                     <?php if (isset($_SESSION['errors']['count'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['count'] ?></div>
                        <?php } ?>

                        <?php unset($_SESSION['errors']); ?>
                      <button type="submit" class="btn btn-gradient-primary me-2">ADD PRODUCT</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>