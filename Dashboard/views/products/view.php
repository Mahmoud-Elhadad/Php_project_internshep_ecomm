<?php 

require "functions/connection.php";

$query = "select * from product";
$run = mysqli_query($connection, $query);

$num = mysqli_num_rows($run);

?>


<a href="?product=add" class="btn btn-primary text-uppercase my-4">Go To Add Product</a>


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
                          <th> Product Name </th>
                          <th> Price </th>
                          <th> Sale </th>
                          <th> Count </th>
                          <th> Category </th>
                          <th> Image </th>
                          <th> Edit </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                   
                      <?php 
                      if($num != 0) {

                       $products = mysqli_fetch_all($run , MYSQLI_ASSOC);
                       

                         foreach ($products as $key => $value) {
                            $all_images = json_decode($value["images"]);
                            
                            
                           
                       ?>
                        <tr>
                              <td><?= ++$key ?></td>
                                <td> <?= $value['name'] ?> </td>
                                <td> <?= $value['price'] ?> </td>
                                <td> <?= $value['sale'] ?> </td>
                                <td> <?= $value['count'] ?> </td>
                                <td> <?= $value['category'] ?> </td>
                                <td>
                                  <?php foreach ($all_images as $img) { ?>
                                   <img src="images/products/<?= $img  ?>" alt=""> 
                                   <?php } ?>
                                </td>
                                <td> <a href="?product=update&id=<?= $value['id'] ?>" class="btn btn-success">Edit</a> </td>
                                <td> <?php include "views/products/modal.php" ?>  </td>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>