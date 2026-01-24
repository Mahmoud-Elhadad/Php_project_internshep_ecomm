<?php require "functions/connection.php"; ?>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add User</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="functions/users/add.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                      </div>
                     
                        <?php if (isset($_SESSION['errors']['name'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['name']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email">
                      </div>
                      <?php if (isset($_SESSION['errors']['email'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['email']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="password">
                      </div>
                      <?php if (isset($_SESSION['errors']['password'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['password']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" name="gender" id="exampleSelectGender">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>
                      <?php if (isset($_SESSION['errors']['gender'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['gender']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleSelectRole">Role</label>
                        <select class="form-control" name="role" id="exampleSelectRole">
                          <option value="user">user</option>
                          <option value="admin">admin</option>
                        </select>
                      </div>
                      <?php if (isset($_SESSION['errors']['role'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['role']; ?></div>
                        <?php } ?>
                     
                       <div class="form-group">
                        <label for="exampleInputImage">Select  image</label>
                        <input type="file" class="form-control" id="exampleInputImage"  name="img">
                      </div>
                      
                      <?php if (isset($_SESSION['errors']['img'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['img']; ?></div>
                        <?php } ?>

                      <div class="form-group">
                        <label for="exampleInputPhone">Phone</label>
                        <input type="text" class="form-control" id="exampleInputPhone" placeholder="Phone" name="phone">
                      </div>
                     <?php if (isset($_SESSION['errors']['phone'])) { ?>
                           <div class="alert alert-danger text-capitalize"><?php echo @$_SESSION['errors']['phone'] ?></div>
                        <?php } ?>

                        <?php unset($_SESSION['errors']); ?>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>