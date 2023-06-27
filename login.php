<?php 
    include "include/db.php";
    include "include/navigation.php";
    // session_start();
?>
<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

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
            echo "<h6 class='text-center font-weight-light my-4 text-danger'>userid or password is wrong</h6>";
        }

        else if($user_email==$email && $user_password==md5($password) && $is_admin==1){

            $_SESSION['admin_userfname'] = $user_fname;
            $_SESSION['admin_userlname'] = $user_lname;

            header("Location:admin/admin_index.php");
        }
        else if($user_email==$email && $user_password==md5($password)){
            // $_SESSION['user_fname'] = $user_fname;
            // $_SESSION['user_lname'] = $user_lname;
            $_SESSION['username'] = $username;
            $_SESSION['user_fname'] = $user_fname;
            $_SESSION['user_id'] = $user_id;
            header("Location:index.php");
        }
        else{
            echo "<h6 class='text-center font-weight-light my-4 text-danger'>userid or password is wrong</h6>";
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
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="login.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
                                                <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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