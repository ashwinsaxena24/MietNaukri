<?php

session_start();
include_once 'includes/functions.php';
include_once 'includes/login_database.php';
$error_msg = '';

if (!empty($_SESSION['id'])) header("Location: dashboard.php");

if (isset($_POST['submit'])) {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['number']) && !empty($_POST['location']) && !empty($_FILES['resume'])) {

        $email = $_POST['email'];
        $query = "select id from student where email='$email'";
        $result = $conn->query($query);
        if ($result->num_rows == 0) {
//        echo $email;
            if (check_email($email)) {

                if (verify_email($conn, $email)) {
                    $name = $_POST['name'];
//            echo $name;
                    if (check_name($name)) {

                        $password = $_POST['password'];
//                echo $password;
                        if (!check_password($password)) {

                            $number = $_POST['number'];
//                    echo $number;
                            $password = hash('sha512', $password);
                            if (check_number($number)) {
                                $location_id = $_POST['location'];
//                            $result->close();
                                $resume = $_FILES['resume'];
                                if (check_file($resume)) {

                                    $file_name = $resume['name'];
//                            echo $file_name;
                                    $stmt = $conn->prepare("insert into student values (null,?,?,?,null,null,null,false ,false ,?,0,?)");
                                    $stmt->bind_param('ssiis', $email, $password, $number, $location_id, $name);
                                    $stmt->execute();
                                    $id = $conn->insert_id;
                                    mkdir("resume/$id/");
                                    $file_name = time() . $file_name;
                                    $stmt = $conn->prepare("update student set last_resume=? where id=?");
                                    $stmt->bind_param('si', $file_name, $id);
                                    $stmt->execute();
                                    $file_parts = pathinfo($file_name);
                                    $extension = $file_parts['extension'];
                                    $file_name = time() . '.' . $extension;
                                    move_uploaded_file($resume['tmp_name'], "resume/$id/$file_name");
                                    $result = $conn->query("insert into resume values ('$file_name',$id,null)");
                                    $conn->query("insert into locations values ($id,$location_id)");
                                    $_SESSION['id'] = $id;
                                    $_SESSION['type'] = 'Student';
                                    header("Location: education.php"); //register=1

                                } else
                                    $error_msg = "File can only be doc, docx, pdf or rtf";

                            } else
                                $error_msg = "Number is invalid";
                        } else
                            $error_msg = "Password should contain lower case, upper case and number";
                    } else
                        $error_msg = "Name is invalid";
                } else
                    $error_msg = "Email already in use";
            } else
                $error_msg = "Email is invalid";
        } else $error_msg = "Email already in use";

    } else
        $error_msg = "Some fields are empty";

}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css" />-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.js"></script>-->
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/index.css">
    <title>Signup</title>

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

<div class="container-fluid decor-bg" id="middle">
    <div class="row" style="padding-left: 8%;">
        <div class="container">
            <div class="col-lg-offset-1 col-lg-3 col-md-3">
                <h2>Sign up</h2>
                <form action="signup.php" method="post" enctype="multipart/form-data">
                    <?php
                    if($error_msg != '') {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">$error_msg</div><br>";
                    }
                    ?>
                    <div class="form-group">
                        <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name" required></div>
                        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                        <div class="form-group"><input class="form-control" type="text" name="number" maxlength="10" placeholder="Contact" required></div>
                        <!--<div class="form-group"><input class="form-control" type="text" name="city" placeholder="City" required></div>-->
                        <div class="form-group"> <select class="form-control simple-select" name="location">
                                <option></option>
                                <?php
                                $json = json_decode(file_get_contents('assets/json_data/locations.json'), true);
                                //          print_r($json);
                                foreach ($json as $item) {
                                    $id = $item['id'];
                                    $text = $item['text'];
                                    if (!empty($_POST['location']) && $_POST['location'] == $id)
                                        echo "<option selected value='$id'>$text</option>";
                                    else
                                        echo "<option value='$id'>$text</option>";
                                }
                                //          ?>
                            </select></div>
                        <div class="custom-file">
                            <input type="file" name="resume" class="custom-file-input" id="customFile">
                            <label class="custom-fileile-label" for="customFile">Upload Resume <br><br></label>
                        </div>

                        <button name="submit" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="col-lg-offset-1 col-lg-1 col-md-3" style="margin-left:4%; margin-right: 9%;">
				<div class="wrapper">
    				<div class="line"></div>
    				<div class="wordwrapper">
        			<div class="word">or</div>                                        
    				</div>
				</div>
			</div>
            <div class="col-lg-offset-1 col-lg-3 col-md-3" style="padding-top: 7%;">
                <h2>Upload Resume without Signin</h2>
                <form action="signup.html" method="post">
                    <div class="custom-file">
                        <input type="file" name="resume" class="custom-file-input" id="customFile">
                        <label class="custom-fileile-label" for="customFile">Upload Resume <br><br></label>
                    </div>

                    <button class="btn btn-primary">Submit</button>
                    <?php
                    echo $error_msg;
                    ?>
            </div>
            </form>
        </div>

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


<script>
    $('.simple-select').select2({placeholder: "Location"});
</script>

</body>
</html>
