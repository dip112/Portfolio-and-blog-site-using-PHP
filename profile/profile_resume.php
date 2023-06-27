<?php
    include "profile_sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/resume_style.css" rel="stylesheet">
  </head>
  <body>
    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <i class="bi bi-list mobile-nav-toggle d-xl-none"></i> -->
    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container col-md-11">
        <div class="section-title">
          <h2>Resume</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <?php
          if(!isset($_SESSION['user_id'])){
            die("Not available");
          }
          $user_id = $_SESSION['user_id'];
          $query = "SELECT * FROM resume WHERE user_id={$user_id}";
          $result = mysqli_query($connection, $query);
          while($row = mysqli_fetch_assoc($result)){
            $proffesion = $row['profession'];
            $ten_school = $row['ten_school'];
            $ten_year = $row['ten_year'];
            $ten_percentage = $row['ten_percent'];
            $twl_school = $row['twelve_school'];
            $twl_year = $row['twelve_year'];
            $twl_percentage = $row['twelve_percent'];
            $g_name = $row['g_dname'];
            $g_college = $row['g_college'];
            $g_year = $row['g_year'];
            $g_percent = $row['g_percent'];
            $pg_name = $row['pg_dname'];
            $pg_college = $row['pg_college'];
            $pg_year = $row['pg_year'];
            $pg_percent = $row['pg_percent'];
            $skills = $row['skills'];
            $p1 = $row['project1'];
            $p2 = $row['project2'];
            $p3 = $row['project3'];
            $about = $row['about'];
            $phn = $row['ph_n'];
            $address = $row['address'];
            $p1_des = $row['p1_des'];
            $p2_des = $row['p2_des'];
            $p3_des = $row['p3_des'];
          }
        ?>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Sumary</h3>
            <div class="resume-item pb-0">
              <h4><?php echo $_SESSION['username'] ?></h4>
              <p><?php echo $proffesion; ?></p>
              <p><em><?php echo $about; ?></em></p>
              <ul>
                <li><?php echo $address; ?></li>
                <li><?php echo $phn; ?></li>
                <!-- <li>alice.barkley@example.com</li> -->
              </ul>
            </div>

            <h3 class="resume-title">Education</h3>
            <?php
              function grade($percentage){
                if($percentage>=90){
                  return "O";
                }
                else if($percentage>=80 && $percentage<90){
                  return "A+";
                }
                else if($percentage>=70 && $percentage<80){
                  return "A";
                }
                else if($percentage>=60 && $percentage<70){
                  return "B+";
                }
                else if($percentage>=50 && $percentage<60){
                  return "B";
                }
                else if($percentage>=40 && $percentage<50){
                  return "C";
                }
                else{
                  return "F";
                }
              }
            ?>
            <?php 
              if($pg_college!=""){ ?>
                <div class="resume-item">
                  <h4><?php echo $pg_name; ?></h4>
                  <h5><?php echo $pg_year; ?></h5>
                  <p><em><?php echo $pg_college; ?></em></p>
                  <!-- <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p> -->
                  <ul>
                    <li>Percentage: <?php echo $pg_percent; ?>%</li>
                    <?php
                      if($pg_percent!=""){ ?>
                        <li>Grade: <?php echo grade($pg_percent); ?></li>
                    <?php } ?>
                  </ul>
                </div>
            <?php }?>
            <!-- Graduation -->
            <?php 
              if($g_college!=""){ ?>
                <div class="resume-item">
                  <h4><?php echo $g_name; ?></h4>
                  <h5><?php echo $g_year; ?></h5>
                  <p><em><?php echo $g_college; ?></em></p>
                  <!-- <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p> -->
                  <ul>
                    <li>Percentage: <?php echo $g_percent; ?>%</li>
                    <?php 
                      if($g_percent!=""){ ?>
                        <li>Grade: <?php echo grade($g_percent); ?></li>
                      <?php } ?>
                  </ul>
                </div>
            <?php } ?>
            <!-- Higher secondary -->
            <div class="resume-item">
              <h4>Higher Secondary (10+2)</h4>
              <h5><?php echo $twl_year; ?></h5>
              <p><em><?php echo $twl_school; ?></em></p>
              <!-- <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p> -->
              <ul>
                <li>Percentage: <?php echo $twl_percentage; ?>%</li>
                <li>Grade: <?php echo grade($twl_percentage); ?></li>
              </ul>
            </div>
            <!-- Secondary -->
            <div class="resume-item">
              <h4>Secondary</h4>
              <h5><?php echo $ten_year; ?></h5>
              <p><em><?php echo $ten_school; ?></em></p>
              <!-- <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p> -->
              <ul>
                <li>Percentage: <?php echo $ten_percentage; ?>%</li>
                <li>Grade: <?php echo grade($ten_percentage); ?></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Skills & Projects</h3>
            <div class="resume-item">
              <h4>Skills</h4>
              <!-- <h5>2019 - Present</h5> -->
              <!-- <p><em>Experion, New York, NY </em></p> -->
              <ul>
                <!-- <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
                <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
                <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li> -->
                <li><?php echo $skills; ?></li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Projects</h4>
              <!-- <h5>2017 - 2018</h5> -->
              <!-- <p><em>Stepping Stone Advertising, New York, NY</em></p> -->
              <ul>
                <!-- <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li> -->
                <?php if($p1!=""){?>
                  <li><?php echo "<h5>$p1</h5>"; ?></li>
                  <p><?php echo $p1_des; ?></p>
                <?php }?>
                <?php if($p2!=""){?>
                  <li><?php echo "<h5>$p2</h5>"; ?></li>
                  <p><?php echo $p2_des; ?></p>
                <?php }?>
                <?php if($p3!=""){?>
                  <li><?php echo "<h5>$p3</h5>"; ?></li>
                  <p><?php echo $p3_des; ?></p>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Resume Section -->
  
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>