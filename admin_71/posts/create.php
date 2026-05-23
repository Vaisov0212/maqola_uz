<?php 
$link="../";
include('../layouts/a_header.php');

?>



            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                                <form action="add.php" method="POST" enctype="multipart/form-data" >
                                    <div class="col-sm-12 col-xl-12">
                                        <div class="bg-light rounded h-100 p-4">
                                            <h6 class="mb-4">POST create</h6>
                                            <div class="form-floating mb-3">
                                                <input name="subject" type="text" class="form-control" id="floatingInput"
                                                    placeholder="yangilik mavzusi">
                                                <label for="floatingInput">Mavzu:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="photo" value="rasm yuklash" type="file" class="form-control" id="floatingPassword"
                                                    placeholder="rasm">
                                                <label for="floatingPassword">rasm</label>
                                            </div>
                                           
                                            <div class="form-floating">
                                                <textarea name="text" class="form-control" placeholder="Leave a comment here"
                                                    id="floatingTextarea" style="height: 150px;"></textarea>
                                                <label for="floatingTextarea">Umumiy matini</label>
                                            </div>
                                            <div class="form-floating mb-3 col-2 p-2 ">
                                                <button  class="btn btn-success ">Yaratish</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                 
                </div>
            </div>
            <!-- Table End -->




<?php 
include('../layouts/a_footer.php');

?>