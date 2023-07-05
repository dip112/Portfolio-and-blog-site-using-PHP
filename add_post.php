<?php 
    include "include/db.php";
    include "include/navigation.php";
    // session_start();
?>

<?php
    if(isset($_POST['submit'])){
        $post_title = mysqli_real_escape_string($connection, $_POST['post_title']);
        $post_cat_id = $_POST['post_cat_id'];
        $post_tags = mysqli_real_escape_string($connection, $_POST['post_tag']);
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp, "images/post/$post_image");
        $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
        $post_date = date("d-m-y");
        $post_author = $_SESSION['username'];

        $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags)
                  VALUES({$post_cat_id},'{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}')";
        $result = mysqli_query($connection, $query);
        if($result){
            echo "<script>";
            echo "alert('Post is created sucessfully! Now it is verified by Admin');";
            echo "window:location = 'index.php'";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('QUERY FAILED');";
            echo "</script>";
        }
    }
    // else if(isset($_POST['cancel_button'])){
    //     header("Location: index.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <div id="layoutAuthentication">
           <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Post</h3></div>
                        <div class="card-body">
                            <form action="add_post.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="post_title">Post Title</label>
                                    <input class="form-control" type="text" name="post_title" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="post_tag">Post Category</label>
                                    <select class="form-control" name="post_cat_id" id="">
                                        <?php
                                            $cat_query = "SELECT * FROM category";
                                            $cat_result = mysqli_query($connection, $cat_query);
                                            while($cat_row = mysqli_fetch_assoc($cat_result)){
                                                $cat_id = $cat_row['cat_id'];
                                                $cat_title = $cat_row['cat_title'];
                                                echo "<option value='$cat_id'>{$cat_title}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="post_tag">Post Tags</label>
                                    <input class="form-control" type="text" name="post_tag" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="">Post Image</label>
                                    <input class="form-control" type="file" name="post_image" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="">Post Content</label>
                                    <textarea class="form-control" name="post_content" id="" rows="10" required></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        Create
                                    </button>
                                    <button class="btn btn-light"><a href="index.php" style="text-decoration:None; color:black;">Cancel</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           </div>
           <br>
           <br>
            <?php
                include "include/footer.php";
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>