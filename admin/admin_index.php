<!-- header -->
<?php 
    include "include/admin_header.php";
?>
        <div id="layoutSidenav">
            <?php
                include "include/admin_sidebar.php";
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Welcome to Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home</li>
                        </ol> -->
                        <div class="container shadow-lg p-3 mb-5 bg-gray rounded" style="margin-top: 3%; background-color:#f0f3f7;">
                            <h2 class="" style="text-align:center; color:dimgray;"><b>Welcome to Blogfolio Hub Dashboard</b></h2>
                            <p class="text-muted text-center" style="margin-top:3%;">Unleash your creativity with BlogfolioHub - Blogs and Portfolio Combined!</p>
                        </div>
                        <?php
                            $query1 = "SELECT COUNT(user_id) AS user_count FROM users";
                            $result1 = mysqli_query($connection, $query1);
                            while($row1 = mysqli_fetch_array($result1)){
                                $user_count = $row1['user_count'];
                            }
                            $query2 = "SELECT COUNT(post_id) AS post_count FROM posts";
                            $result2 = mysqli_query($connection, $query2);
                            while($row2 = mysqli_fetch_array($result2)){
                                $post_count = $row2['post_count'];
                            }
                            $query3 = "SELECT COUNT(post_id) AS post_count_today FROM posts WHERE DATE(post_date)=DATE(now())";
                            $result3 = mysqli_query($connection, $query3);
                            while($row3 = mysqli_fetch_array($result3)){
                                $post_count_today = $row3['post_count_today'];
                            }
                        ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 container shadow-lg p-5 mb-5 col-3 rounded text-center" style="background-color:#bbcff0;"><h3><b>Total Users</b></h3><h3 class="text-muted text-center"><?php echo $user_count; ?></h3></div>
                                <div class="col-md-3 ml-auto container shadow-lg p-5 mb-5 col-3 rounded text-center" style="background-color:#e8aaf0;"><h3><b>Total Posts</b></h3><h3 class="text-muted text-center"><?php echo $post_count; ?></h3></div>
                                <div class="col-md-3 ml-auto container shadow-lg p-5 mb-5 col-3 rounded text-center" style="background-color:#d1b49f;"><h3><b>Today Posts</b></h3><h3 class="text-muted text-center"><?php echo $post_count_today; ?></h3></div>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include "include/admin_footer.php";
?>