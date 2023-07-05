<?php
    include "include/db.php";
    if(isset($_POST['submit'])){
        $post_id = $_POST['comment_post_id'];
        $email = mysqli_real_escape_string($connection, $_POST['user_mail']);
        $password = mysqli_real_escape_string($connection, $_POST['user_password']);
        $query = "SELECT * FROM users WHERE user_email='{$email}'";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("QUERY FAILED");
        }
        $is_etered = 0;
        while($row = mysqli_fetch_array($result)){
            $user_email = $row['user_email'];
            $user_id = $row['user_id'];
            $user_password = $row['user_pass'];
            $user_fname = $row['user_fname'];
            $user_lname = $row['user_lname'];
            $username = $user_fname.' '.$user_lname;
            $is_admin = $row['is_admin'];
            $is_etered = 1;
        }
        if($is_etered==0){
            echo "<script>";
            echo "alert('Userid or Password is wrong!');";
            echo "window.location='post.php?post_id=$post_id';";
            echo "</script>";
        }
        else if($user_email==$email && $user_password==md5($password)){
            // $_SESSION['user_fname'] = $user_fname;
            // $_SESSION['user_lname'] = $user_lname;
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_fname'] = $user_fname;
            $_SESSION['user_id'] = $user_id;
            header("Location:post.php?post_id=$post_id");
        }
        else{
            echo "<script>";
            echo "alert('Userid or Password is wrong!');";
            echo "window.location='post.php?post_id=$post_id';";
            echo "</script>";
        }
    }

?>