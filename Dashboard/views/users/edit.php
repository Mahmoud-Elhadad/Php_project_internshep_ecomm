 <?php
  
  require 'functions/connection.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select * from users where id = $id";
    $run = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($run);
  }

 
 ?>
 
 
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update User</h4>
                    <p class="card-description"> Basic form elements </p>

                    <form class="forms-sample" action="functions/users/update.php?id=<?= @$id ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="<?= @$user['name'] ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                        <?php if (isset($_SESSION['errors']['name'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['name']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" value="<?= @$user['email'] ?>" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                     
                        <?php if (isset($_SESSION['errors']['email'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['email']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control" id="exampleSelectGender">
                          <option value="male" <?= @$user['gender'] == 'male' ? "selected" : "";  ?>>Male</option>
                          <option value="female" <?= @$user['gender'] == 'female' ? "selected" : "";  ?>>Female</option>
                        </select>
                      </div>
                        <?php if (isset($_SESSION['errors']['gender'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['gender']; ?></div>
                        <?php } ?>
                       <div class="form-group">
                        <label for="exampleSelectRole">Role</label>
                        <select name="role" class="form-control" name="role" id="exampleSelectRole">
                          <option value="user" <?= @$user['role'] == 'user' ? "selected" : "";  ?>>User</option>
                          <option value="admin" <?= @$user['role'] == 'admin' ? "selected" : "";  ?>>Admin</option>
                        </select>
                      </div>
                        <?php if (isset($_SESSION['errors']['role'])) { ?> 
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['role']; ?></div>
                        <?php } ?>
                        <div class="form-group">
                        <label for="exampleInputImage">Select  image</label>
                        <input type="file" class="form-control"  id="exampleInputImage"  name="img">
                      </div>
                        <?php if (isset($_SESSION['errors']['img'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['name']; ?></div>
                        <?php } ?>
                       <div class="form-group">
                        <label for="exampleInputPhone">Phone</label>
                        <input type="text" value="<?= @$user['phone'] ?>" class="form-control" id="exampleInputPhone" placeholder="Phone" name="phone">
                      </div>
                        <?php if (isset($_SESSION['errors']['phone'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['phone']; ?></div>
                        <?php } ?>

                        <?php unset($_SESSION['errors']); ?>
                     
                      <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>