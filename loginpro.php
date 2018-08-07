<?php
require_once 'login.php';
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
	<title>Login</title>
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
            </ul>
        </div>

        </div>
    </nav>

<div class="container-fluid decor_bg" id="middle">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Login to the job portal as Job Provider.</i><p>
                                <form action="loginpro.php" method="POST">
                                    <?php
                                    if($error_msg != '') {
                                        echo "<div class=\"alert alert-danger\" role=\"alert\">$error_msg</div><br>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Unique-id" name="unique-id" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                </form><br/>

                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>

<footer>
            <div class="container">
                <center>
                    <p>Copyright &copy; Lifestyle Store. All Rights Reserved  |  Contact Us: +91 90000 00000</p>	
                </center>
            </div>
</footer>

	

</body>
</html>