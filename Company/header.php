<?php
require_once '../includes/login_database.php';
require_once '../includes/functions.php';
$error_msg = '';
$success_msg = '';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/stylesheets/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <title>Dashboard</title>

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
            <a class="navbar-brand" href="#">Miet Job Portal</a>
        </div>

        <div class="collapse navbar-collapse" id="any">

            <ul class="nav navbar-nav navbar-left">
                <li><a href="addcompany.php"> <span class="glyphicon glyphicon-log-out"></span> Add Company</a></li>
                <li><a href="updatecomp.php"> <span class="glyphicon glyphicon-dashboard"></span> Update Company</a></li>
                <li><a href="addstaff.php"> <span class="glyphicon glyphicon-wrench"></span> Add Staff</a></li>
                <li><a href="updatestaff.php"> <span class="glyphicon glyphicon-log-out"></span> Update Staff</a></li>
            </ul>
        </div>

    </div>
</nav>