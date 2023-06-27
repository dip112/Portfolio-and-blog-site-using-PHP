<?php
    include "include/db.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/create_resume_style.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body>
        <div class="container">
            <div class="card-body">
                <div class="form-group text-center">
                    <h2 class="text-center font-weight-light my-6">Create Resume</h2>
                </div>
                <form class="form-horizontal" role="form"> 
                    <div class="card-header">
                        <div class="form-group">
                            <label for="firstName" class="col-sm-3 control-label">Profession</label>
                            <div class="col-sm-9">
                                <input type="text" id="profession" name="profession" placeholder="E.g Developer" class="form-control" autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-muted">School Details</div>
                    <div class="card-header">
                    <!-- <div class="container"><p class="text-muted">_________________________Shool Details_________________________</p></div> -->
                        <div><p class="text-center font-weight-bold">10th Class</p></div>

                        <div class="form-group">
                            <label for="tenschoolname" class="col-sm-3 control-label">School Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="tenschoolname" name="tenschoolname" placeholder="School Name" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tenyear" class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" id="tenyear" placeholder="E.g 2023" class="form-control" name= "tenyear">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tenpercent" class="col-sm-3 control-label">Percentage</label>
                            <div class="col-sm-9">
                                <input type="number" id="tenpercent" name="tenpercent" placeholder="10th Percentage" class="form-control">
                            </div>
                        </div>

                        <div><p class="text-center font-weight-bold">12th Class</p></div>

                        <div class="form-group">
                            <label for="twelveschoolname" class="col-sm-3 control-label">School Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="twelveschoolname" name="twelveschoolname" placeholder="School Name" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="twelveyear" class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" id="twelveyear" placeholder="E.g 2023" class="form-control" name= "twelveyear">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="twelvepercent" class="col-sm-3 control-label">Percentage</label>
                            <div class="col-sm-9">
                                <input type="number" id="twelvepercent" name="twelvepercent" placeholder="12th Percentage" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="container"><p class="text-muted">_______________________Graduation Details_______________________</p></div> -->
                    <div class="text-center text-muted">Graduation Details</div>
                    <div class="card-header">
                        <div class="form-group">
                            <label for="gcollegename" class="col-sm-3 control-label">College Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="gcollegename" name="gcollegename" placeholder="College Name" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gyear" class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" id="gyear" placeholder="E.g 2023" class="form-control" name= "gyear">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gpercent" class="col-sm-3 control-label">Percentage</label>
                            <div class="col-sm-9">
                                <input type="number" id="gpercent" name="gpercent" placeholder="Graduation Percentage" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="container"><p class="text-muted">_____________________Post Graduation Details_____________________</p></div> -->
                    <div class="text-center text-muted">Post Graduation Details</div>
                    <div class="card-header">
                        <div class="form-group">
                            <label for="pgcollegename" class="col-sm-3 control-label">College Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="pgcollegename" name="pgcollegename" placeholder="College Name" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pdyear" class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-9">
                                <input type="text" id="pdyear" placeholder="E.g 2023" class="form-control" name= "pdyear">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pgpercent" class="col-sm-3 control-label">Percentage</label>
                            <div class="col-sm-9">
                                <input type="number" id="pgpercent" name="pgpercent" placeholder="Post Graduation Percentage" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="container"><p class="text-muted">_________________________Project & Skills_________________________</p></div> -->
                    <div class="text-center text-muted">Project & Skills</div>
                    <div class="card-header">
                        <div class="form-group">
                            <label for="skills" class="col-sm-3 control-label">Skills</label>
                            <div class="col-sm-9">
                                <input type="text" id="skills" name="skills" placeholder="E.g Web Development" class="form-control">
                                <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="project1" class="col-sm-3 control-label">Project-1</label>
                            <div class="col-sm-9">
                                <input type="text" id="project1" name="project1" placeholder="Tittle-1" class="form-control">
                                <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project2" class="col-sm-3 control-label">Project-2</label>
                            <div class="col-sm-9">
                                <input type="text" id="project2" name="project2" placeholder="Tittle-2" class="form-control">
                                <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project3" class="col-sm-3 control-label">Project-3</label>
                            <div class="col-sm-9">
                                <input type="text" id="project3" name="project3" placeholder="Tittle-3" class="form-control">
                                <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                            </div>
                        </div>
                    </div>

                    <!-- <div class="container"><p class="text-muted">__________________________Basic Details__________________________</p></div> -->
                    <div class="text-center text-muted">Basic Details</div>
                    <div class="card-header">
                        <div class="form-group">
                            <label for="about" class="col-sm-3 control-label">About</label>
                            <div class="col-sm-9">
                                <!-- <input type="text" id="project3" name="project3" placeholder="Project-3" class="form-control"> -->
                                <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->
                                <textarea name="about" id="about" cols="47" rows="5" placeholder=" Write about you"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fblink" class="col-sm-3 control-label">Facebook Link</label>
                            <div class="col-sm-9">
                                <input type="text" id="fblink" name="fblink" placeholder="Facebook Link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="instalink" class="col-sm-3 control-label">Instagram Link</label>
                            <div class="col-sm-9">
                                <input type="text" id="instalink" name="instalink" placeholder="Instagram Link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="twtlink" class="col-sm-3 control-label">Twitter Link</label>
                            <div class="col-sm-9">
                                <input type="text" id="twtlink" name="twtlink" placeholder="Twitter Link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ldnlink" class="col-sm-3 control-label">Linkedin Link</label>
                            <div class="col-sm-9">
                                <input type="text" id="ldnlink" name="ldnlink" placeholder="Linkedin Link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Upload image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                    </div>

                <!-- /.form-group -->
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create</button>

                    <div class="text-center py-3">
                        <div class="medium"><a href="login.php">Want to skip? Go to login</a></div>
                    </div>
                </form> <!-- /form -->
                
            </div> <!-- ./container -->
        </div>
    </body>
</html>
