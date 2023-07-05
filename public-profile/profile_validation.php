<?php
    include("../include/db.php");
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    $query = "SELECT * FROM resume WHERE user_id={$user_id}";
    $result = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($result)){
        $is_created = $row['is_created'];
    }
    if($is_created==0){
        echo "<script>";
        echo "window.location='404.php';";
        echo "</script>";
    }
    else{
        header("Location: profile_about.php?user_id=$user_id");
    }
?>