<?php
    include "profile_sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blogs - Blogflio Hub</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="css/resume_style.css" rel="stylesheet">
</head>

  <body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <i class="bi bi-list mobile-nav-toggle d-xl-none"></i> -->
    
    <!-- ======= About Section ======= -->
    <section id="resume" class="resume">
      <div class="container col-md-11">

        <div class="section-title">
          <h2>Blogs</h2>
        </div>
        <?php
          if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
          }
          $query = "SELECT * FROM posts JOIN users ON posts.user_id=users.user_id WHERE posts.user_id={$user_id} AND post_status=1";
          $result = mysqli_query($connection, $query);
          while($row = mysqli_fetch_assoc($result)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_date = $row['post_date'];
            $post_thumbnil = $row['post_image'];
            $post_content = substr($row['post_content'], 100);
            $post_comment_count = $row['post_comment_count']; ?>

        <section class="blog-list px-3 py-5 p-md-5">
          <div class="container single-col-max-width">
            <div class="item mb-5">
              <div class="row g-3 g-xl-0">
                <div class="col-2 col-xl-3">
                    <img class="img-fluid post-thumb " src="../images/post/<?php echo $post_thumbnil; ?>" alt="image">
                </div>
                <div class="col">
                  <h3 class="title mb-1"><a class="text-link" href="../post.php?post_id=<?php echo $post_id; ?>" style="color:black;"><?php echo $post_title; ?></a></h3>
                  <div class="meta mb-1"><span class="date text-muted">Published on: <?php echo $post_date; ?>  &#x2022;  <?php echo $post_comment_count; ?> comments</span></div>
                  <!-- <div class="intro"><?php #echo $post_content; ?></div> -->
                  <a class="text-link" href="../post.php?post_id=<?php echo $post_id; ?>">Read more &rarr;</a>
                </div><!--//col-->
              </div><!--//row-->
            </div><!--//item-->
          </div>
        </section>
        <?php } ?>

      </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>