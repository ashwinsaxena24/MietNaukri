<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 7/15/18
 * Time: 2:30 PM
 */
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
    <title>Post Jobs</title>
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
            <ul class="nav navbar-nav navbar-left">
                <li><a href="post.php"> <span class="glyphicon glyphicon-edit"></span> Post Jobs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="dashboard.php"> <span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                <li><a href="settings.html"> <span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
                <li><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>

    </div>
</nav>
</body>
</html>
