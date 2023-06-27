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
                                            <th>Author</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Comment Id</th>
                                            <th>Post Id</th>
                                            <th>Author</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Comment</th>
                                            <th>Status</th>
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
                                                echo "<td>{$row['comment_post_id']}</td>";
                                                echo "<td>{$row['comment_author']}</td>";
                                                echo "<td>{$row['comment_email']}</td>";
                                                echo "<td>{$row['comment_date']}</td>";
                                                echo "<td>{$row['comment_content']}</td>";
                                                echo "<td>{$row['comment_status']}</td>";
                                                echo "<td><a href='#'>Delete</a></td>";
                                                echo "<td><a href='#'>Edit</a></td>";
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