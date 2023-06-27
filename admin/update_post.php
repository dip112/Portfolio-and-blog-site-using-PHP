<?php
    include "../include/db.php";
    if(isset($_POST['update'])){
        $post_id = $_POST['post_id'];
        $post_cat_id = $_POST['post_cat_id'];
        $post_title = mysqli_real_escape_string($connection, $_POST['post_title']);
        $post_tags = mysqli_real_escape_string($connection, $_POST['post_tags']);
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../images/post/$post_image");
        if(empty($post_image)){
            $image_query = "SELECT * FROM posts WHERE post_id={$post_id}";
            $image_result = mysqli_query($connection, $image_query);
            while($row = mysqli_fetch_assoc($image_result)){
                $post_image = $row['post_image'];
            }
        }
        $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
        $post_status = $_POST['post_status'];
    }
    if($post_cat_id!='Choose'){
        $query = "UPDATE posts SET post_cat_id={$post_cat_id}, post_title='{$post_title}', post_image='{$post_image}', post_content='{$post_content}', post_tags='{$post_tags}', post_status={$post_status} WHERE post_id={$post_id}";
    }
    else{
        $query = "UPDATE posts SET post_title='{$post_title}', post_image='{$post_image}', post_content='{$post_content}', post_tags='{$post_tags}', post_status={$post_status} WHERE post_id={$post_id}";
    }
    $result = mysqli_query($connection, $query);
    if($result){
        echo "<script>";
        echo "alert('Updated successfully');";
        echo "window:location= 'admin_view_posts.php'";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Not updated');";
        echo "</script>";
        die("Error".mysqli_error($connection));
    }
?>