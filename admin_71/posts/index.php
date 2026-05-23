<?php 
$link="../";
include('../layouts/a_header.php');

require("../db/connection.php");

$sql="SELECT * FROM news ";
$stmt=$conn->prepare($sql) ;
$stmt->execute();
$posts=$stmt->fetchAll();


?>



            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                              <a class="btn btn-sm btn-info" href="create.php">create</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">mavzu</th>
                                            <th scope="col">rasm</th>
                                            <th scope="col">view</th>
                                            <th scope="col">amallar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $i=0;
                                        foreach($posts as $post) :
                                        $i++;
                                        ?>
                                         <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $post["subject"] ?></td>
                                            <td>
                                                <img style="width: 40px;" src=<?="../assets/post_img/".$post["img"]?> alt="">
                                            </td>
                                            <td><?= $post["view"] ?></td>
                                          
                                            <td>
                                                <button class="btn btn-sm btn-info"><i class="bi bi-pen" ></i></button>
                                                 <button class="btn btn-sm btn-warning"><i class="bi bi-eye" ></i></button>
                                                  <button class="btn btn-sm btn-danger"><i class="bi bi-trash" ></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->




<?php 
include('../layouts/a_footer.php');

?>