<?php
    include "profile_sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>About - Blogflio Hub</title>
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
    <?php
      if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
      }
      $query = "SELECT * FROM resume JOIN users ON resume.user_id=users.user_id WHERE resume.user_id={$user_id}";
      $result = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($result)){
        $user_name = $row['user_fname'].' '.$row['user_lname'];
        $profession = $row['profession'];
        $about = $row['about'];
        $phn = $row['ph_n'];
        $address = $row['address'];
        $g_name = $row['g_dname'];
        $pg_name = $row['pg_dname'];
        $g_year = $row['g_year'];
        $pg_year = $row['pg_year'];
        $dp = $row['dp'];
      }
    ?>
    <!-- ======= About Section ======= -->
    <section id="resume" class="resume">
      <div class="container col-md-11">

        <div class="section-title">
          <h2>About</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
          <div class="shadow-none p-5 mb-5 bg-light rounded">
            <?php echo "<h1>Hello, I'm ".$user_name."</h1>"; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="../images/profile/<?php echo $dp; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <!-- <h3><?php echo $user_name; ?></h3> -->
            <h2><?php echo $profession; ?></h2>
            <!-- <p class="fst-italic"></p> -->
            <p><?php echo $about; ?></p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $phn; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Addres:</strong> <span><?php echo $address; ?></span></li>
                  <!-- <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York, USA</span></li> -->
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <!-- <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li> -->
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php if($pg_name!=""){ echo "Post Graduatade"; } else{ echo "Graduatade"; } ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Passing Year:</strong> <span><?php if($pg_name!=""){ echo $pg_year; } else{ echo $g_year; } ?></span></li>
                  <!-- <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li> -->
                </ul>
              </div>
            </div>
            <!-- <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p> -->
          </div>
        </div>
      </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>