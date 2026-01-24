<?php 
 
 require "functions/connection.php";

 $query = "select * from users";
 $run = mysqli_query($connection, $query);

 $num = mysqli_num_rows($run);

?>


<a href="?user=add" class="btn btn-primary text-uppercase my-4">Go To Add user</a>

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p>
                    <table class="table table-striped text-center">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> User </th>
                          <th> Name </th>
                          <th> Email </th>
                          <th> Gender </th>
                          <th> Role </th>
                          <th> Phone </th>
                          <th> Edit </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($num != 0){ 
                                $users = mysqli_fetch_all($run , MYSQLI_ASSOC);
                                foreach ($users as $key => $value) {
                        ?>
                            <tr>
                        <td> <?= ++$key ?> </td>
                            <td class="py-1">
                                <img src= "images/<?= $value['img']; ?>" alt="image" />
                            </td>
                            <td> <?= $value['name']; ?> </td>
                            <td> <?= $value['email']; ?> </td>
                            <td> <?= $value['gender']; ?> </td>
                            <td> <?= $value['role']; ?> </td>
                            <td> <?= $value['phone']; ?> </td>
                            <td> <a href="?user=update&id=<?= $value['id'] ?>" class="btn btn-success">Edit</a> </td>
                            <td> <?php include "views/users/modal.php"; ?> </td>
                            </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
    </div>