<?php
    include "../include/db.php";
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    $query = "UPDATE users SET is_admin=1 WHERE user_id={$user_id}";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "<script>";
        echo "alert('Updated!');";
        echo "window.location='admin_view_users.php'";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('Not Updated!');";
        echo "window.location='admin_view_users.php'";
        echo "</script>";
    }
?>