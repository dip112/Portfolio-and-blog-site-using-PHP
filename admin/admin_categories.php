<!-- header -->
<?php 
    include "include/admin_header.php";
?>

<?php
    if(isset($_POST['submit'])){
        $category = $_POST['category'];
        $query = "INSERT INTO category(cat_title) VALUES ('$category')";
        $result = mysqli_query($connection, $query);
        if($result){ ?>
            <script>
                alert("Added Succesfully");
                // header("location:admin_categories.php");
            </script>
        <?php }
        else{ ?>
            <script>
                alert("Query Failed");
            </script>
        <?php }
    } ?>
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
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        <div class="col-xl-4">
                            <form class="form-inline" action="admin_categories.php" method="post">
                                <div class="form-group mb-2">
                                    <label for="category"><h5>Add Category</h5></label>
                                    <input type="text" name="category" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table of Categories
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM category";
                                            $result = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['cat_id']}</td>";
                                                echo "<td>{$row['cat_title']}</td>";
                                                $cat_id = $row['cat_id'];
                                                echo "<td><a href='admin_categories.php?delete={$cat_id}'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                        <?php
                                            if(isset($_GET['delete'])){
                                                $delete_cat_id = $_GET['delete'];
                                                $query = "DELETE FROM category WHERE cat_id=$delete_cat_id";
                                                $result = mysqli_query($connection, $query);
                                                header("Location: admin_categories.php");
                                            }
                                        ?>
                                        <!-- <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
    include "include/admin_footer.php";
?>