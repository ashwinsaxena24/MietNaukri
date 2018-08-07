<?php

session_start();
if(!empty($_SESSION['id'])) {

    header("Location: dashboard.php");

}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/index.css">
    <title>
        Main
    </title>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#any">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Miet Job Portal</a>
        </div>

        <div class="collapse navbar-collapse" id="any">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"> <span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                <!--<li><a href="loginaa.html"> <span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
                <li class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span>
                        Login
                    </a>
                    <div class="dropdown-menu dropdown-content list-group-item list-group-item-dark" aria-labelledby="dropdownMenuLink">
                        <p>
                            <a class="dropdown-item list-group-item list-group-item-info" href="loginseek.php">Job Seeker</a>
                        </p>
                        <p>
                            <a class="dropdown-item list-group-item list-group-item-info" href="loginpro.php">Job Provider</a>
                        </p>
                    </div>
                </li>

        </div>
    </div>
    </li>
    </ul>
    </div>

    </div>
</nav>

<div class="background">
    <div class="row">
        <div class="col-sm-12">
            <div class="content">
                <br><br>
                <strong><h1>MIET JOB PORTAL</h1></strong>
                <b><p>Job Requirements</p></b><br>
                <a href="signup.php" class="btn btn-danger btn-lg">Create Profile</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row text-center" style="margin-bottom: 25px; ">
        <div class="col-sm-4">
            <div class="thumbnail">
                <div class="caption">
                    <h2>Save your favorite jobs and searches</h2>
                    <p>Receive email updates from jobs you're interested in. </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="thumbnail">
                <div class="caption">
                    <h2>Upload your resumes and documents </h2>
                    <p>Save and manage resumes and documents for your application.</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="thumbnail">
                <div class="caption">
                    <h2>Apply for jobs</h2>
                    <p>Your resume will be visible to recruiters searching our database.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <center>
            <b><p>
                    Copyright &copy Miet. All Rights Reserved | Contact Us: +91 8445052431
                </p></b>
        </center>
    </div>
</footer>

</body>
</html>