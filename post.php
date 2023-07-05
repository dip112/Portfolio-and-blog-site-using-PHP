<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Page - Blogfolio Hub</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php 
            include "include/navigation.php";
            include "include/db.php";
        ?>
        <!-- Page content-->
        <?php
            if(isset($_GET['post_id'])){
                $post_id_ = $_GET['post_id'];
            }
            $query = "SELECT * FROM posts WHERE post_id={$post_id_}";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){
                $post_cat_id = $row['post_cat_id'];
                $user_id = $row['user_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
            }
            $cat_query = "SELECT * FROM category WHERE cat_id=$post_cat_id";
            $cat_result = mysqli_query($connection, $cat_query);
            while($row_ = mysqli_fetch_assoc($cat_result)){
                $cat_id = $row_['cat_id'];
                $cat_title = $row_['cat_title'];
            }
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $post_title; ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?php echo $post_date." by "."<a target='_blank' href='public-profile/profile_validation.php?user_id=$user_id' style='text-decoration:None;color:#696969'>$post_author</a>"; ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="category.php?cat_id=<?php echo $cat_id ?>"><?php echo $cat_title?></a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="images/post/<?php echo $post_image; ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo $post_content; ?></p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <?php
                        if(isset($_SESSION['username'])){ ?>
                            <section class="mb-5">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <!-- Comment form-->
                                        <div class="well">
                                            <h4>Leave a comment:</h4>
                                            <form role="form" class="mb-4" action="add_comment.php" method="post">
                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="comment_post_id" value=<?php echo $post_id_; ?>>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="comment_author">Name</label>
                                                    <input class="form-control" type="text" name="comment_author" id="comment_author" placeholder="Abc De" required>
                                                </div> -->
                                                <!-- <div class="form-group" style="margin-top:1%">
                                                    <label for="commenter_mail">Email</label>
                                                    <input class="form-control" type="text" name="commenter_mail" id="commenter_mail" placeholder="abc@gmail.com" required>
                                                </div> -->
                                                <div class="form-group" style="margin-top:1%">
                                                    <!-- <label for="comment">Comment</label> -->
                                                    <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Join the discussion and leave a comment!" required></textarea>
                                                </div>
                                                <!-- <br> -->
                                                <input type="submit" class="btn btn-dark" name="submit" value="Submit" style="margin-top:1%">
                                            </form>
                                        </div>
                                        <!-- Comment with nested comments-->
                                        <!-- <div class="d-flex mb-4"> -->
                                            <!-- Parent comment-->
                                            <!-- <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks. -->
                                                <!-- Child comment 1-->
                                                <!-- <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold">Commenter Name</div>
                                                        And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                    </div>
                                                </div> -->
                                                <!-- Child comment 2-->
                                                <!-- <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold">Commenter Name</div>
                                                        When you put money directly to a problem, it makes a good headline.
                                                    </div>
                                                </div> -->
                                            <!-- </div>
                                        </div> -->
                                        <!-- Single comment-->
                                        <?php
                                            $comment_query = "SELECT * FROM comments WHERE comment_post_id={$post_id_} AND comment_status=1 ORDER BY comment_id DESC";
                                            $comment_result = mysqli_query($connection, $comment_query);
                                            if(!$comment_result){
                                                die("QUERY FAILED");
                                            }
                                            while($comment_row = mysqli_fetch_assoc($comment_result)){
                                                $commenter_id = $comment_row['commenter_id'];
                                                $comment_author = $comment_row['comment_author'];
                                                $comment_date = $comment_row['comment_date'];
                                                $comment_content = $comment_row['comment_content']; 
                                                $dp_query = "SELECT * FROM resume WHERE user_id=$commenter_id";
                                                $dp_result = mysqli_query($connection, $dp_query);
                                                while($dp_row = mysqli_fetch_assoc($dp_result)){
                                                    $commenter_dp = $dp_row['dp'];
                                                }?>
        
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <?php
                                                            if(!empty($commenter_dp)){
                                                                echo "<img width='40' height='40' class='rounded-circle' src='images/profile/$commenter_dp' alt='...' />";
                                                            }
                                                            else{
                                                                echo "<img width='40' height='40' class='rounded-circle' src='images/profile/user.png' alt='...' />";
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="ms-3">
                                                        <div class=""><b><?php echo $comment_author; ?></b> <small class="text-muted"><?php echo $comment_date; ?></small></div>
                                                        <?php echo $comment_content; ?>
                                                    </div>
                                                </div>
                                                <br>
                                            <?php }?>
                                    </div>
                                </div>
                            </section>
                        <?php }
                        else{ ?>
                            <section class="mb-5">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <!-- Comment form-->
                                        <div class="well">
                                            <h4>Leave a comment:</h4>
                                            <form role="form" class="mb-4" action="login_comment.php" method="post">
                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="comment_post_id" value=<?php echo $post_id_; ?>>
                                                </div>
                                                <div class="form-group col-sm-5" style="margin-top:1%">
                                                    <label for="commenter_mail">Email</label>
                                                    <input class="form-control" type="text" name="user_mail" id="user_mail" placeholder="abc@gmail.com" required>
                                                </div>
                                                <div class="form-group col-sm-5" style="margin-top:1%">
                                                    <label for="comment">Password</label>
                                                    <input class="form-control" type="password" name="user_password" id="user_password" required>
                                                </div>
                                                <!-- <br> -->
                                                <input type="submit" class="btn btn-dark" name="submit" value="Login to comment" style="margin-top:1%">
                                            </form>
                                        </div>
                                        <?php
                                            $comment_query = "SELECT * FROM comments WHERE comment_post_id={$post_id_} AND comment_status=1 ORDER BY comment_id DESC";
                                            $comment_result = mysqli_query($connection, $comment_query);
                                            if(!$comment_result){
                                                die("QUERY FAILED");
                                            }
                                            while($comment_row = mysqli_fetch_assoc($comment_result)){
                                                $commenter_id = $comment_row['commenter_id'];
                                                $comment_author = $comment_row['comment_author'];
                                                $comment_date = $comment_row['comment_date'];
                                                $comment_content = $comment_row['comment_content']; 
                                                $dp_query = "SELECT * FROM resume WHERE user_id=$commenter_id";
                                                $dp_result = mysqli_query($connection, $dp_query);
                                                while($dp_row = mysqli_fetch_assoc($dp_result)){
                                                    $commenter_dp = $dp_row['dp'];
                                                }?>
        
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <?php 
                                                            if(empty($commenter_dp)){
                                                                echo "<img width='40' height='40' class='rounded-circle' src='images/profile/user.png' alt='...' />";
                                                            }
                                                            else{
                                                                echo "<img width='40' height='40' class='rounded-circle' src='images/profile/$commenter_dp' alt='...' />";
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="ms-3">
                                                        <div class=""><b><?php echo $comment_author; ?></b> <small class="text-muted"><?php echo $comment_date; ?></small></div>
                                                        <?php echo $comment_content; ?>
                                                    </div>
                                                </div>
                                                <br>
                                        <?php }?>
                                    </div>
                                </div>
                            </section>
                       <?php } ?>

                </div>
                <!-- Side widgets-->
                <?php 
                    include "include/sidebar.php";
                ?>
            </div>
        </div>
        <!-- Footer-->
        <?php
            include "include/footer.php";
        ?>
