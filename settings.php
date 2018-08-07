<?php
session_start();
if(empty($_SESSION['id']))
    header("Location: index.php");

$type = $_SESSION['type'];
$url = '';
if($type == "Employer")
    $url = 'empdash.php';
else
    $url = 'dashboard.php';

require_once 'includes/login_database.php';
require_once 'includes/functions.php';

$error_msg = '';

if(!empty($_POST['old']) && !empty($_POST['new']) && !empty($_POST['conf'])) {

    $newpass = $_POST['new'];
    $conf = $_POST['conf'];
    if(strcmp($newpass,$conf) != 0) {
        $error_msg = 'Passwords do not match';
    }
    else {
        $id = $_SESSION['id'];
        $password = hash('sha512', $_POST['old']);
        $r = $conn->query("select password from student where id=$id and password='$password'");
        if($r->num_rows == 0) {
            $error_msg = 'Old password in incorrect';
        }
        else {
            if(!check_password($newpass)) {
                $newpass = hash('sha512', $newpass);
                $r = $conn->query("update student set password='$newpass' where  id=$id");
                if (!$r) die($conn->error);
            }
            else $error_msg = "Password in invalid";
        }
    }
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
		<title>Settings</title>

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
			<li><a href=<?php echo "\"$url\""; ?>> <span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<!--<li><a href="loginaa.html"> <span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
			<li><a href="settings.php"> <span class="glyphicon glyphicon-settings"></span> Settings</a></li>
				<li><a href="logout.php"> <span class="glyphicon glyphicon-user"></span> Logout</a></li>
			</ul>
		</div>

		</div>
	</nav>

	<div class="container-fluid" id="middle" style="padding-bottom: 120px;">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <h4>Change Password</h4>
                    <form action="settings.php" method="POST">
                        <?php
                        if($error_msg != '') {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">$error_msg</div><br>";
                        }
                        ?>
                        <div class="form-group">
                            <input type="password" class="form-control" name="old"  placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="conf"  placeholder="Re-type New Password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Change</button>
                    </form><br>
                    <?php
                    if(isset($_POST['submit'])) {
                        if($error_msg == '') {
                            echo "<div class=\"alert alert-success\" role=\"alert\">Password Change Successfully</div><br>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <center>
                    <p>Copyright &copy; Miet. All Rights Reserved  |  Contact Us: +91 90000 00000</p>	
                </center>
            </div>
        </footer>
        
</body>
</html>