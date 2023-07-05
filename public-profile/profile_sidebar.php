<!doctype html>
<html lang="en">
  <head>
  	<title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
        </div>
        <?php
          include "../include/db.php";
          if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
            $query = "SELECT * FROM resume JOIN users ON users.user_id=resume.user_id WHERE resume.user_id={$user_id}";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){
              $user_name = $row['user_fname'].' '.$row['user_lname'];
              $fb_link = $row['fb_link'];
              $insta_link = $row['insta_link'];
              $twt_link = $row['twt_link'];
              $linkdn_link = $row['linkdn_link'];
              $dp = $row['dp'];
            }?>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
              <div class="user-logo">
                <div class="img" style="background-image: url(../images/<?php echo $dp;?>);"></div>
                  <h3><?php echo "$user_name"; ?></h3>
                  <?php
                      echo "<a href='$fb_link'><i class='fa fa-facebook mr-3'></i></a>";
                      echo "<a href='$insta_link'><i class='fa fa-instagram mr-3'></i></a>";
                      echo "<a href='$twt_link'><i class='fa fa-twitter mr-3'></i></a>";
                      echo "<a href='$linkdn_link'><i class='fa fa-linkedin mr-3'></i></a>";
                  ?>
              </div>
            </div>
          <?php }?>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="profile_about.php?user_id=<?php echo $user_id; ?>"><span class="fa fa-info-circle mr-3"></span> About</a>
          </li>
          <li>
            <a href="profile_resume.php?user_id=<?php echo $user_id; ?>"><span class="fa fa-file mr-3"></span> Resume</a>
          </li>
          <li>
            <a href="profile_blogs.php?user_id=<?php echo $user_id; ?>"><span class="fa fa-pencil mr-3"></span> Blogs</a>
          </li>
        </ul>
        <div class="text-muted text-center position-fixed" style="margin-left:50px;">Copyright &copy; <a class="text-muted" style="text-decoration:none;" href="../index.php">Blogfolio Hub</a> 2023</div>
      </nav>


      