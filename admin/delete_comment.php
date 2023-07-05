<?php
    include "../include/db.php";
    if(isset($_GET['comment_id'])){
        $comment_id = $_GET['comment_id'];
    }
    $delete_query = "DELETE FROM comments WHERE comment_id={$comment_id}";
    $delete_result = mysqli_query($connection, $delete_query);
    if($delete_query){
        echo "<script>";
        echo "alert('Deleted!');";
        echo "window.location='admin_view_comments.php'";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Query failed!');";
        echo "window.location='admin_view_comments.php'";
        echo "</script>";
    }
?>