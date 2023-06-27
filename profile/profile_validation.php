<?php
    session_start();
    include("../include/db.php");
    $is_created=0;
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM resume WHERE user_id={$user_id}";
    $result = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($result)){
        $is_created = $row['is_created'];
    }
    if($is_created==0){
        echo "<script>";
        echo "alert('Profile is not created');";
        echo "window.location= '../create_resume.php'";
        echo "</script>";
    }
    else{
        header("Location: profile_about.php");
    }
?>