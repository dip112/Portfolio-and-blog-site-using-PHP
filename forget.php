<?php 
    include "include/db.php";
    include "include/navigation.php";
    // session_start();
?>
<?php
    if(isset($_POST['update'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        $password = md5($password);

        $query = "UPDATE users SET user_pass='{$password}' WHERE user_email='{$email}'";
        $result = mysqli_query($connection, $query);

        if($result){
            echo "<script>";
            echo "alert('Updated!');";
            echo "window.location='login.php';";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('Not Updated!');";
            echo "window.location='forget.php';";
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
        <title>Forget Password - Blogfolio Hub</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Forget Password</h3></div>
                                    <div class="card-body">
                                        <script>
                                            function validation(){
                                                var newPass = document.getElementById("newPassword").value;
                                                var confirmPass = document.getElementById("confirmPassword").value;
                                                if(newPass!=confirmPass){
                                                    document.getElementById("warning").innerHTML = "*Password don't matched!";
                                                    return false;
                                                }
                                                return true;
                                            }
                                        </script>
                                        <form action="forget.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="newPassword" type="password" placeholder="New Password" required />
                                                <label for="inputPassword">New Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="c_password" id="confirmPassword" type="password" placeholder="Confirm Password" required />
                                                <label for="inputPassword">Confirm Password</label>
                                            </div>
                                            <div><p id="warning" style="color:red;"></p></div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <button class="btn btn-primary btn-block" type="submit" name="submit">Update</button> -->
                                                <input class="btn btn-primary form-control" type="submit" name="update" value="Update" onclick="return validation()">
                                            </div>
                                        </form>
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