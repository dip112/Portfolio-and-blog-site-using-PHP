<?php
    include "include/navigation.php";
    include "include/db.php";
?>

<?php
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $phn = mysqli_real_escape_string($connection, $_POST['phn']);
        $profession = mysqli_real_escape_string($connection, $_POST['profession']);
        $ten_school = mysqli_real_escape_string($connection, $_POST['tenschoolname']);
        $ten_year = mysqli_real_escape_string($connection, $_POST['tenyear']);
        $ten_percent = mysqli_real_escape_string($connection, $_POST['tenpercent']);
        $twelve_school = mysqli_real_escape_string($connection, $_POST['twelveschoolname']);
        $twelve_year = mysqli_real_escape_string($connection, $_POST['twelveyear']);
        $twelve_percent = mysqli_real_escape_string($connection, $_POST['twelvepercent']);
        $g_d = mysqli_real_escape_string($connection, $_POST['gdegreename']);
        $g_college = mysqli_real_escape_string($connection, $_POST['gcollegename']);
        $g_year = mysqli_real_escape_string($connection, $_POST['gyear']);
        $g_percent = mysqli_real_escape_string($connection, $_POST['gpercent']);
        $pg_d = mysqli_real_escape_string($connection, $_POST['pgdegreename']);
        $pg_college = mysqli_real_escape_string($connection, $_POST['pgcollegename']);
        $pg_year = mysqli_real_escape_string($connection, $_POST['pgyear']);
        $pg_percent = mysqli_real_escape_string($connection, $_POST['pgpercent']);
        $skills = mysqli_real_escape_string($connection, $_POST['skills']);
        $p1 = mysqli_real_escape_string($connection, $_POST['project1']);
        $p1_des = mysqli_real_escape_string($connection, $_POST['p1_des']);
        $p2 = mysqli_real_escape_string($connection, $_POST['project2']);
        $p2_des = mysqli_real_escape_string($connection, $_POST['p2_des']);
        $p3 = mysqli_real_escape_string($connection, $_POST['project3']);
        $p3_des = mysqli_real_escape_string($connection, $_POST['p3_des']);
        $about = mysqli_real_escape_string($connection, $_POST['about']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $fb = mysqli_real_escape_string($connection, $_POST['fblink']);
        $insta = mysqli_real_escape_string($connection, $_POST['instalink']);
        $twt = mysqli_real_escape_string($connection, $_POST['twtlink']);
        $lnkdn = mysqli_real_escape_string($connection, $_POST['ldnlink']);
        $is_created = 1;
        $profile_image = $_FILES['image']['name'];
        $profile_image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($profile_image_temp, "images/$profile_image");

        $query1 = "SELECT * FROM users WHERE user_email='{$email}'";
        $result1 = mysqli_query($connection, $query1);
        // $user_id = 0;
        while($row = mysqli_fetch_assoc($result1)){
            $user_id = $row['user_id'];
        }
        $user_id = $user_id;

        $query2 = "INSERT INTO resume(user_id,profession,ten_school,ten_year,ten_percent,twelve_school,twelve_year,twelve_percent,g_college,g_year,g_percent,pg_college,pg_year,pg_percent,skills,project1,project2,project3,about,fb_link,insta_link,twt_link,linkdn_link,dp,is_created,ph_n,g_dname,pg_dname,address,p1_des, p2_des, p3_des) 
                   VALUES ({$user_id},'$profession','$ten_school','$ten_year','$ten_percent','$twelve_school','$twelve_year','$twelve_percent','$g_college','$g_year','$g_percent','$pg_college','$pg_year','$pg_percent','$skills','$p1','$p2','$p3','$about','$fb','$insta','$twt','$lnkdn','$profile_image','$is_created','$phn','$g_d','$pg_d','$address','$p1_des','$p2_des','$p3_des')";
        $result2 = mysqli_query($connection, $query2);
        if(!$result2){
            echo "<script>alert('QUERY FAILED');</script>";
            // die("Query_failed".mysqli_error($connection));
        }
        else{
            if(isset($_SESSION['username'])){
                echo "<script>";
                echo "window.location= 'index.php'";
                echo "</script>";
            }
            else{
                echo "<script>";
                echo "alert('Resume created successfully!');";
                echo "window.location= 'login.php'";
                echo "</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Resume</h3></div>
                                    <div class="card-body">
                                        <form action="create_resume.php" method="post" enctype="multipart/form-data">
                                            <div class="card-header">
                                                <div class="form-group">
                                                    <label for="firstName" class="col-sm-3 control-label">Email Address</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="email" name="email" placeholder="Username" class="form-control" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phn" class="col-sm-3 control-label">Phone Number</label>
                                                    <div class="col-sm-12">
                                                        <input type="tel" id="phn" name="phn" placeholder="Phone Number" class="form-control" autofocus required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-header">
                                                <div class="form-group">
                                                    <label for="firstName" class="col-sm-3 control-label">Profession</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="profession" name="profession" placeholder="E.g Developer" class="form-control" autofocus required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center text-muted">School Details</div>
                                            <div class="card-header">
                                            <!-- <div class="container"><p class="text-muted">_________________________Shool Details_________________________</p></div> -->
                                                <!-- <div><p class="text-center font-weight-bold">10th Class</p></div> -->
                                                <div class="text-center text-muted">10th Class</div>
                                                <div class="card-header">
                                                    <div class="form-group">
                                                        <label for="tenschoolname" class="col-sm-3 control-label">School Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="tenschoolname" name="tenschoolname" placeholder="School Name" class="form-control" autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tenyear" class="col-sm-3 control-label">Year</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="tenyear" placeholder="E.g 2023" class="form-control" name= "tenyear" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tenpercent" class="col-sm-3 control-label">Percentage</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" id="tenpercent" name="tenpercent" placeholder="10th Percentage" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div><p class="text-center font-weight-bold">12th Class</p></div> -->
                                                <div class="text-center text-muted">12th Class</div>
                                                <div class="card-header">
                                                    <div class="form-group">
                                                        <label for="twelveschoolname" class="col-sm-3 control-label">School Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="twelveschoolname" name="twelveschoolname" placeholder="School Name" class="form-control" autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twelveyear" class="col-sm-3 control-label">Year</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="twelveyear" placeholder="E.g 2023" class="form-control" name= "twelveyear" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twelvepercent" class="col-sm-3 control-label">Percentage</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" id="twelvepercent" name="twelvepercent" placeholder="12th Percentage" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="container"><p class="text-muted">_______________________Graduation Details_______________________</p></div> -->
                                            <div class="text-center text-muted">Graduation Details</div>
                                            <div class="card-header">
                                                <div class="form-group">
                                                    <label for="gdegreename" class="col-sm-3 control-label">Degree Name</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="gdegreename" name="gdegreename" placeholder="Degree Name" class="form-control" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gcollegename" class="col-sm-3 control-label">College Name</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="gcollegename" name="gcollegename" placeholder="College Name" class="form-control" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gyear" class="col-sm-3 control-label">Year</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="gyear" placeholder="E.g 2020-2023" class="form-control" name= "gyear">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gpercent" class="col-sm-3 control-label">Percentage</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" id="gpercent" name="gpercent" placeholder="Graduation Percentage" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="container"><p class="text-muted">_____________________Post Graduation Details_____________________</p></div> -->
                                            <div class="text-center text-muted">Post Graduation Details</div>
                                            <div class="card-header">
                                                <div class="form-group">
                                                    <label for="pgdegreename" class="col-sm-3 control-label">Degree Name</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="pgdegreename" name="pgdegreename" placeholder="Degree Name" class="form-control" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pgcollegename" class="col-sm-3 control-label">College Name</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="pgcollegename" name="pgcollegename" placeholder="College Name" class="form-control" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pgyear" class="col-sm-3 control-label">Year</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="pgyear" placeholder="E.g 2020-2023" class="form-control" name= "pgyear">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pgpercent" class="col-sm-3 control-label">Percentage</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" id="pgpercent" name="pgpercent" placeholder="Post Graduation Percentage" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="container"><p class="text-muted">_________________________Project & Skills_________________________</p></div> -->
                                            <div class="text-center text-muted">Project & Skills</div>
                                            <div class="card-header">
                                                <div class="form-group">
                                                    <label for="skills" class="col-sm-3 control-label">Skills</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="skills" name="skills" placeholder="E.g Web Development" class="form-control">
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="project1" class="col-sm-3 control-label">Project-1</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="project1" name="project1" placeholder="Tittle-1" class="form-control">
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="p1_des" class="col-sm-3 control-label">Description</label>
                                                    <div class="col-sm-12">
                                                        <!-- <input type="text" id="project3" name="project3" placeholder="Project-3" class="form-control"> -->
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                        <textarea class="form-control" name="p1_des" id="p1_des" rows="5" placeholder="  Project-1 Description (100 words)"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="project2" class="col-sm-3 control-label">Project-2</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="project2" name="project2" placeholder="Tittle-2" class="form-control">
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="p2_des" class="col-sm-3 control-label">Description</label>
                                                    <div class="col-sm-12">
                                                        <!-- <input type="text" id="project3" name="project3" placeholder="Project-3" class="form-control"> -->
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                        <textarea class="form-control" name="p2_des" id="p2_des" rows="5" placeholder="  Project-2 Description (100 words)"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="project3" class="col-sm-3 control-label">Project-3</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="project3" name="project3" placeholder="Tittle-3" class="form-control">
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="p3_des" class="col-sm-3 control-label">Description</label>
                                                    <div class="col-sm-12">
                                                        <!-- <input type="text" id="project3" name="project3" placeholder="Project-3" class="form-control"> -->
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                        <textarea class="form-control" name="p3_des" id="p3_des" rows="5" placeholder="  Project-3 Description (100 words)"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="container"><p class="text-muted">__________________________Basic Details__________________________</p></div> -->
                                            <div class="text-center text-muted">Basic Details</div>
                                            <div class="card-header">
                                                <div class="form-group">
                                                    <label for="about" class="col-sm-3 control-label">About</label>
                                                    <div class="col-sm-12">
                                                        <!-- <input type="text" id="project3" name="project3" placeholder="Project-3" class="form-control"> -->
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                        <textarea class="form-control" name="about" id="about" rows="5" placeholder="  Write about you" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="col-sm-3 control-label">Address</label>
                                                    <div class="col-sm-12">
                                                        <!-- <input type="text" id="project3" name="project3" placeholder="Project-3" class="form-control"> -->
                                                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                                        <textarea class="form-control" name="address" id="address" rows="5" placeholder="  Address" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fblink" class="col-sm-3 control-label">Facebook Link</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="fblink" name="fblink" placeholder="Facebook Link" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="instalink" class="col-sm-3 control-label">Instagram Link</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="instalink" name="instalink" placeholder="Instagram Link" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="twtlink" class="col-sm-3 control-label">Twitter Link</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="twtlink" name="twtlink" placeholder="Twitter Link" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ldnlink" class="col-sm-3 control-label">Linkedin Link</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="ldnlink" name="ldnlink" placeholder="Linkedin Link" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image" class="col-sm-3 control-label">Upload image (600x600)</label>
                                                    <div class="col-sm-12">
                                                        <input type="file" class="form-control-file" id="image" name="image" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <button type="submit" name="submit" class="btn btn-primary btn-block">Create</button> -->
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <!-- <a class="btn btn-primary btn-block" type="submit" href="login.html">Create Account</a> -->
                                                    <input class="btn btn-primary btn-block" name="submit" type="submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">
                                            <?php
                                                if(!isset($_SESSION['username'])){
                                                    echo "Want to skip? Go to login";
                                                }
                                            ?>
                                        </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> --> 
            <br>
            <br>
            <?php
                include "include/footer.php";
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>