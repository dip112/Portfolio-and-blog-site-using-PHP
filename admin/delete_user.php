<?php
    include "../include/db.php";
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    $delete_query = "DELETE FROM users WHERE user_id={$user_id}";
    $delete_result = mysqli_query($connection, $delete_query);
    if($delete_result){
        echo "<script>";
        echo "alert('Deleted!');";
        echo "window:location='admin_view_users.php';";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Deletion Failed!');";
        echo "window:location='admin_view_users.php';";
        echo "</script>";
    }
?>