<?php
    include "../include/db.php";
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $query = "DELETE FROM posts WHERE post_id={$post_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location:admin_view_posts.php");
        }
    }
?>