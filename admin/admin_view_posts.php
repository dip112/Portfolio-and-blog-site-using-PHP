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
                            <li class="breadcrumb-item active">All Posts</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Posts
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Author</th>
                                            <th>Timestamp</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Tags</th>
                                            <th>Comments</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Author</th>
                                            <th>Timestamp</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Tags</th>
                                            <th>Comments</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM posts";
                                            $result = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['post_id']}</td>";
                                                echo "<td>{$row['post_author']}</td>";
                                                echo "<td>{$row['post_date']}</td>";
                                                echo "<td>{$row['post_title']}</td>";
                                                
                                                $cat_query = "SELECT * FROM category WHERE cat_id={$row['post_cat_id']}";
                                                $cat_result = mysqli_query($connection, $cat_query);
                                                while($cat_row = mysqli_fetch_assoc($cat_result)){
                                                    $cat_id = $cat_row['cat_id'];
                                                    $cat_title = $cat_row['cat_title'];
                                                }

                                                echo "<td>{$cat_title}</td>";
                                                echo "<td><img width='100' src='../images/post/{$row['post_image']}' alt='image'></td>";
                                                echo "<td>{$row['post_tags']}</td>";
                                                echo "<td>{$row['post_comment_count']}</td>";
                                                echo "<td>{$row['post_status']}</td>";
                                                $post_id = $row['post_id'];
                                                echo "<td><a href='delete_post.php?post_id={$post_id}'>Delete</a></td>";
                                                echo "<td><a href='edit_post.php?post_id={$post_id}'>Edit</a></td>";
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