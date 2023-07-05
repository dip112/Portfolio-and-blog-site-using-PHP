<?php
    include "include/db.php";
    session_start();
    if(isset($_POST['submit'])){
        $comment_post_id = $_POST['comment_post_id'];
        $commenter_id = $_SESSION['user_id'];
        $comment_author = $_SESSION['username'];
        $comment = mysqli_real_escape_string($connection, $_POST['comment']);
    }
    $query = "INSERT INTO comments(comment_post_id, commenter_id, comment_date, comment_author, comment_content) VALUES($comment_post_id, $commenter_id, now(), '{$comment_author}', '{$comment}')";
    $result = mysqli_query($connection, $query);
    $count_query = "UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$comment_post_id";
    $count_result = mysqli_query($connection, $count_query);
    if($result){
        echo "<script>";
        echo "alert('submitted');";
        echo "window.location='post.php?post_id=$comment_post_id';";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Submission failed!');";
        echo "window.location='post.php?post_id=$comment_post_id';";
        echo "</script>";
    }
?>