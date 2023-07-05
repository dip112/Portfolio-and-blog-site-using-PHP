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
                            if(isset($_POST['submit'])){
                                $search_query = $_POST['search'];
                                $search_query = strtolower($search_query);
                                $query = "SELECT * FROM posts WHERE post_tags OR post_title LIKE '%$search_query%' AND post_status=1 ORDER BY post_id DESC";
                                $result = mysqli_query($connection, $query);

                                if(!$result){
                                    die("QUERY FAILED");
                                }

                                $count = mysqli_num_rows($result);

                                if($count==0){
                                    echo "<h2>NO RESULT FOUND</h2>";
                                }
                                else{
                                    echo "<h5> $count RESULT FOUND</h5>";
                                    while($row = mysqli_fetch_assoc($result)){
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_content = substr($row['post_content'], 0, 190);
                                        $post_image = $row['post_image'];
                                        ?>
                                        <div class="card mb-4">
                                            <a href="#!"><img class="card-img-top" src="images/post/<?php echo $post_image; ?>" alt="..." /></a>
                                            <div class="card-body">
                                                <h2 class="card-title"><?php echo $post_title ?></h2>
                                                <div class="small text-muted">
                                                    <p>
                                                        <i class="fa fa-clock-o" aria-hidden="true"> <?php echo $post_date; ?></i>
                                                        <i><?php echo "<br>";?>by <a href="#" style="text-decoration:None; color:#696969"><?php echo $post_author; ?></a></i>
                                                    </p>
                                                </div>
                                                <p class="card-text"><?php echo $post_content ?></p>
                                                <a class="btn btn-primary" href="#!">Read more →</a>
                                            </div>
                                        </div>

                        <?php 
                                    }
                                }
                    
                            } 
                        ?>
                            
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