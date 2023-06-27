    <!-- header -->
    <?php 
        include "include/header.php"; 
        include "include/db.php";
    ?>


        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    

                        <?php
                            if(isset($_GET['cat_id'])){
                                $cat_id = $_GET['cat_id'];
                            }
                            $query = "SELECT * FROM posts WHERE post_cat_id={$cat_id} AND post_status=1";
                            $post_data = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($post_data)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_content = substr($row['post_content'], 0, 190);
                                $post_image = $row['post_image'];
                                ?>
                                <div class="card mb-4">
                                    <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="card-img-top" src="images/post/<?php echo $post_image; ?>" alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title">
                                            <a href="post.php?post_id=<?php echo $post_id; ?>" style="text-decoration:None"><?php echo $post_title ?></a>
                                        </h2>
                                        <div class="small text-muted">
                                            <p>
                                                <i class="fa fa-clock-o" aria-hidden="true"> <?php echo $post_date; ?></i>
                                                <i><?php echo "<br>";?>by <a href="#" style="text-decoration:None; color: #696969;"><?php echo $post_author; echo "<br>"; ?></a></i>
                                            </p>
                                        </div>
                                        <p class="card-text"><?php echo $post_content ?></p>
                                        <a class="btn btn-primary" href="#!">Read more →</a>
                                    </div>
                                </div>

                        <?php } ?>
                        
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <!-- <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li> -->
                        </ul>
                    </nav>
                </div>


                <!-- Side widgets-->
                <?php 
                    include "include/sidebar.php";
                ?>


            </div>
        </div>



    <!-- footer -->
    <?php
        include "include/footer.php";
    ?>