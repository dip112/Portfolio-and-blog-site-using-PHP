<?php
    include "include/navigation.php";
    include "include/db.php";
?>

<?php
    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //to prevent sql injection
        $fname = mysqli_real_escape_string($connection, $fname);
        $lname = mysqli_real_escape_string($connection, $lname);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = md5($password);

        $query = "INSERT INTO users(user_fname, user_lname, user_email, user_pass) VALUES ('$fname', '$lname', '$email', '$password')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            echo "<script>alert('QUERY FAILED');</script>";
        }
        else{
            echo "<script>";
            echo "alert('Registration successful!');";
            echo "window.location= 'create_resume.php'";
            echo "</script>";
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
        <title>Register - BlogFolio Hub</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- validate password -->
                                        <script>
                                            function validatePassword(){
                                                var inputPassword = document.getElementById("inputPassword").value;
                                                var inputPasswordConfirm = document.getElementById("inputPasswordConfirm").value;
                                                if(inputPassword != inputPasswordConfirm) {
                                                    document.getElementById("warning").innerHTML = "*Password don't match!";
                                                    // alert("Password do't match")
                                                    return false;
                                                } 
                                                else if(inputPassword.length<8 && inputPassword.length>0){
                                                    document.getElementById("warning").innerHTML = "*Password length should be more than 7 characters!";
                                                    return false;
                                                }
                                                else{
                                                    return true;
                                                }
                                            }
                                        </script>
                                        <form action="register.php" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="firstname" id="inputFirstName" type="text" placeholder="Enter your first name" required />
                                                        <label for="inputFirstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="lastname" id="inputLastName" type="text" placeholder="Enter your last name" required />
                                                        <label for="inputLastName">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail">Email Address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" required />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="cpassword" id="inputPasswordConfirm" type="password" placeholder="Confirm password" required />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <p id="warning" style="color:red; text-align:center"></p>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <!-- <a class="btn btn-primary btn-block" type="submit" href="login.html">Create Account</a> -->
                                                    <input class="btn btn-primary btn-block" name="submit" type="submit" onclick="return validatePassword()">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php" style="text-decoration: none;">Have an account? Go to login</a></div>
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
            <?php
                include "include/footer.php";
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
