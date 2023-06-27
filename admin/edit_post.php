<!-- header -->
<?php 
    include "include/admin_header.php";
?>
        <div id="layoutSidenav">
            <?php
                include "include/admin_sidebar.php";
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Welcome to Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Post</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                Edit Post
                            </div>
                        </div>
                        <?php
                            if(isset($_GET['post_id'])){
                                $post_id = $_GET['post_id'];
                            }
                            $query = "SELECT * FROM posts WHERE post_id={$post_id}";
                            $result = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_id'];
                                $post_cat_id = $row['post_cat_id'];
                                $post_title = $row['post_title'];
                                $post_tags = $row['post_tags'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_status = $row['post_status'];
                            }
                        ?>
                        <form action="update_post.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="post_id">Post Id</label>
                                <input  class="form-control" value="<?php echo $post_id; ?>" type="text" name="post_id" readonly="readonly">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="post_title">Post Title</label>
                                <input  class="form-control" value="<?php echo $post_title; ?>" type="text" name="post_title">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Post Category</label>
                                <br>
                                <select class="form-control" name="post_cat_id" id="">
                                    <?php
                                        $query = "SELECT * FROM category";
                                        $result = mysqli_query($connection, $query);
                                        $temp_cat_title="";
                                        while($row = mysqli_fetch_assoc($result)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            if($cat_id==$post_cat_id){
                                                $temp_cat_title = $cat_title;
                                            }
                                            echo "<option hidden>Choose</option>";
                                            echo "<option value='$cat_id'>{$cat_title}</option>";
                                        }
                                    ?>
                                </select>
                                <input type="text" value="<?php echo $temp_cat_title; ?>" disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="post_tags">Post Tags</label>
                                <input  class="form-control" value="<?php echo $post_tags; ?>" type="text" name="post_tags">
                            </div>
                            <br>
                            <div class="form-group">
                                <img width="100" src="../images/post/<?php echo $post_image ?>" alt="">
                                <input type="file" name="image">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="post_content">Post Content</label>
                                <textarea  class="form-control" type="text" name="post_content" rows="10">
                                    <?php echo $post_content; ?>
                                </textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="post_status">Post Status</label>
                                <input  class="form-control" value="<?php echo $post_status; ?>" type="text" name="post_status">
                            </div>
                            <br>
                            <div class="form-group">
                                <!-- <button class="btn btn-primary" type="submit" name="submit">Update</button> -->
                                <input class="btn btn-primary" type="submit" name="update" value="Update">
                            </div>
                            <br>
                        </form>
                    </div>
                </main>
<?php 
    include "include/admin_footer.php";
?>