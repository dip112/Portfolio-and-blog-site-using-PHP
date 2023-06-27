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
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
        <?php
          include "../include/db.php";
          session_start();
          if(isset($_SESSION['username'])){?>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
	  			    <div class="user-logo">
	  				    <div class="img" style="background-image: url(../images/2.jpeg);"></div>
	  				    <h3><?php echo $_SESSION['username']; ?></h3>

                <?php
                  $user_id = $_SESSION['user_id'];
                  $query = "SELECT * FROM resume WHERE user_id={$user_id}";
                  $result = mysqli_query($connection, $query);
                  while($row = mysqli_fetch_assoc($result)){
                    $fb_link = $row['fb_link'];
                    $insta_link = $row['insta_link'];
                    $twt_link = $row['twt_link'];
                    $linkdn_link = $row['linkdn_link'];
                    $is_created = $row['is_created'];
                  }
                  if($is_created==1){
                    echo "<a href='$fb_link'><i class='fa fa-facebook mr-3'></i></a>";
                    echo "<a href='$insta_link'><i class='fa fa-instagram mr-3'></i></a>";
                    echo "<a href='$twt_link'><i class='fa fa-twitter mr-3'></i></a>";
                    echo "<a href='$linkdn_link'><i class='fa fa-linkedin mr-3'></i></a>";
                  }
                  else{
                    echo "<a href='#'><i class='fa fa-facebook mr-3'></i></a>";
                    echo "<a href='#'><i class='fa fa-instagram mr-3'></i></a>";
                    echo "<a href='#'><i class='fa fa-twitter mr-3'></i></a>";
                    echo "<a href='#'><i class='fa fa-linkedin mr-3'></i></a>";
                  }
                ?>
	  			    </div>
	  		    </div>
          <?php }?>

        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="../index.php"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
            <a href="profile_about.php"><span class="fa fa-info-circle mr-3"></span> About</a>
          </li>
          <li>
            <a href="profile_resume.php"><span class="fa fa-file mr-3"></span> Resume</a>
          </li>
          <li>
            <a href="profile_blogs.php"><span class="fa fa-pencil mr-3"></span> Blogs</a>
          </li>
        </ul>
        <br>
        <br>
        <br>
    	</nav>