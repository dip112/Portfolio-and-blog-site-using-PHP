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
                            <li class="breadcrumb-item active">All Comments</li>
                        </ol>
                       <?php
                            if(isset($_GET['comment_id'])){
                                $comment_id = $_GET['comment_id'];
                                $grant_query = "UPDATE comments SET comment_status=1 WHERE comment_id=$comment_id";
                                $grant_result = mysqli_query($connection, $grant_query);
                            }
                       ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Comments
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Comment Id</th>
                                            <th>Post Id</th>
                                            <th>Author Id</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Comment</th>
                                            <th>Post Title</th>
                                            <th>Status</th>
                                            <th>Grant</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Comment Id</th>
                                            <th>Post Id</th>
                                            <th>Author Id</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Comment</th>
                                            <th>Post Title</th>
                                            <th>Status</th>
                                            <th>Grant</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM comments";
                                            $result = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['comment_id']}</td>";
                                                $comment_id = $row['comment_id'];
                                                echo "<td>{$row['comment_post_id']}</td>";
                                                echo "<td>{$row['commenter_id']}</td>";
                                                echo "<td>{$row['comment_author']}</td>";
                                                echo "<td>{$row['comment_date']}</td>";
                                                echo "<td>{$row['comment_content']}</td>";

                                                $post_query = "SELECT * FROM posts WHERE post_id={$row['comment_post_id']}";
                                                $post_result = mysqli_query($connection, $post_query);
                                                while($row_ = mysqli_fetch_assoc($post_result)){
                                                    $post_id = $row_['post_id'];
                                                    $post_title = $row_['post_title'];
                                                    echo "<td><a href='../post.php?post_id=$post_id' target='_blank' style='text-decoration:none;'>$post_title</a></td>";
                                                }

                                                echo "<td>{$row['comment_status']}</td>";
                                                echo "<td><a class='btn btn-success' href='admin_view_comments.php?comment_id=$comment_id' style='text-decoration:none'><b>Approve</b></a></td>";
                                                echo "<td><a class='btn btn-danger' href='delete_comment.php?comment_id=$comment_id' style='text-decoration:none'><b>Delete<b></a></td>";
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