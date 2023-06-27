<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <form action="search.php" method="post">
            <div class="card-body">
                <div class="input-group">
                    <input class="form-control" name="search" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                    <button class="btn btn-dark" name="submit" id="button-search" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <?php
                        $query = "SELECT * FROM category";
                        $data = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($data)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='category.php?cat_id=$cat_id' style='text-decoration:None; color:black'>{$cat_title}</a></li>";
                        }
                    ?>
                </div>
                <!-- <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!">JavaScript</a></li>
                        <li><a href="#!">CSS</a></li>
                        <li><a href="#!">Tutorials</a></li>
                    </ul>
                </div> -->
                
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">Stay inspired and explore our latest blog posts and creative portfolios!</div>
    </div>
</div>