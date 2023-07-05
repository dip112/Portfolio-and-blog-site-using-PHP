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
                        <h1 class="mt-4">Welcome to Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">All Users</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Users
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Post Count</th>
                                            <th>DP</th>
                                            <th>Is Admin</th>
                                            <th>Admin Approval</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Post Count</th>
                                            <th>DP</th>
                                            <th>Is Admin</th>
                                            <th>Admin Approval</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM users ORDER BY user_id DESC";
                                            $result = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                $user_id = $row['user_id'];
                                                echo "<td>{$user_id}</td>";
                                                $name = $row['user_fname'].' '.$row['user_lname'];
                                                echo "<td>{$name}</td>";
                                                echo "<td>{$row['user_email']}</td>";

                                                $post_query = "SELECT COUNT(user_id) AS post_count FROM posts WHERE user_id={$user_id}";
                                                $post_result = mysqli_query($connection, $post_query);
                                                while($post_row = mysqli_fetch_assoc($post_result)){
                                                    $post_count = $post_row['post_count'];
                                                }
                                                echo "<td>{$post_count}</td>";

                                                $dp_query = "SELECT * FROM resume WHERE user_id={$user_id}";
                                                $dp_result = mysqli_query($connection, $dp_query);
                                                while($dp_row = mysqli_fetch_assoc($dp_result)){
                                                    $user_dp = $dp_row['dp'];
                                                }
                                                if(!empty($user_dp)){
                                                    echo "<td><img width='100' height='100' src='../images/profile/{$user_dp}' alt='image'></td>";
                                                }
                                                else{
                                                    echo "<td><img width='100' height='100' src='../images/profile/user.png' alt='image'></td>";
                                                }
                                                echo "<td>{$row['is_admin']}</td>";
                                                echo "<td><a class='btn btn-success' href='admin_grant.php?user_id=$user_id' style='text-decoration:none'><b>Grant</b></a><a class='btn btn-warning' href='admin_revoke.php?user_id=$user_id' style='text-decoration:none; margin-left: 5px;'><b>Revoke</b></a></td>";
                                                echo "<td><a class='btn btn-danger' href='delete_user.php?user_id=$user_id' style='text-decoration:none'><b>Delete</b></a></td>";
                                                echo "<td><a class='btn btn-primary' href='#' style='text-decoration:none'><b>Edit</b></a></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include "include/admin_footer.php";
?>