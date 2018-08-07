<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 6/24/18
 * Time: 11:06 PM
 */
session_start();

//if(empty($_SESSION['id'])) header("Location: index.php");

include_once 'includes/login_database.php';
include_once 'includes/functions.php';
$error_msg = '';

if(isset($_POST['submit'])) {

    if(!empty($_POST['qualification']) && !empty($_POST['course']) && !empty($_POST['specialization']) && !empty($_POST['college']) && !empty($_POST['year'])) {

        if($_POST['qualification'] != -1) {

            if($_POST['course'] != -1) {

                if($_POST['specialization'] != -1) {

                    $specialization_id = $_POST['specialization'];
                    if(check_name($_POST['college'])) {

                        $college = $_POST['college'];
                        if(check_year($_POST['year'])) {
                            $id = $_SESSION['id'];
                            $year = $_POST['year'];
                            $stmt = $conn->prepare("insert into colleges values (?,?,?,?,null)");
                            $stmt->bind_param('siii',$college,$id,$year,$specialization_id);
                            $stmt->execute();
                            header("Location: dashboard.php");

                        }
                        else
                            $error_msg = "Invalid Year";

                    }
                    else
                        $error_msg = "Invalid College Name";

                }
                else
                    $error_msg = "Select Specialization";

            }
            else
                $error_msg = "Select course";

        }
        else
            $error_msg = "Select Highest Qualification";

    }
    else
        $error_msg = "Some fields are empty";
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
			<li><a href="logout.php"> <span class="glyphicon glyphicon-user"></span> Logout</a></li>
			<!--<li><a href="loginaa.html"> <span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
			</ul>
		</div>
		</div>
	</nav>

			<div class="container-fluid decor_bg" id="middle">
                <div class="row">
                    <div class="col-md-5 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>Educational Details</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Enter your educational details.</i><p><br>
                                <form action="education.php" method="POST">
                                    <div class="form-group">

<div class="container">
	<div class="row decor-bg">
		<div class="col-md-4">
			<table class="table table-light">
				<tr>
					<td>
						<label for="qualification">
                                  		Highest Qualification   	
                        </label>
                    </td>
					<td>:</td>
					<td>
						<select class="custom-select form-control" style="width: 300px" id="qualification" name="qualification">

						</select>
					</td>
				</tr>
<!---->
<!--				<tr>-->
<!--					<td>-->
<!--						<label for="course_10_12_phd">-->
<!--                                    		Course  	-->
<!--                        </label>-->
<!--                    </td>-->
<!--					<td>:</td>-->
<!--					<td>-->
<!--						<select class="custom-select" id="course_10_12_phd" disabled>-->
<!--  											<option selected>Not Found</option>-->
<!--						</select>       -->
<!--					</td>-->
<!--				</tr>-->

				<tr>
					<td>
						<label for="course">
                                    		Course  	
                        </label>
                    </td>
					<td>:</td>
					<td>
						<select class="custom-select form-control" style="width: 300px" id="course" name="course">
						</select>       
					</td>
				</tr>

				<tr>
					<td>
						<label for="specialization">
                            Specialization
                        </label>
                    </td>
					<td>:</td>
					<td>
						<select class="custom-select form-control"  style="width: 300px" name="specialization" id="specialization">

						</select>       
					</td>
				</tr>

				<tr>
					<td colspan="3">
						<div class="form-group"><input class="form-control" type="text" name="college" placeholder="College" required></div>
                    </td>
				</tr>

				<tr>
					<td colspan="3">
						<div class="form-group"><input class="form-control" type="text" name="year" placeholder="Passing Year" required></div>
                    </td>
				</tr>

				<tr>
					<td>
						<br><button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </td>
				</tr>
                <tr><?php
                    if($error_msg != '') {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">$error_msg</div><br>";
                    }
                    ?></tr>
			</table>
		</div>
	</div>
</div>
</div>
                                    <br><br>
                                </form><br/>
                            </div>
                            <div class="panel-footer"></div>
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

    $(document).ready(function () {
        datalist = document.getElementById('qualification');
        $.ajax({
            url: 'assets/json_data/qualifications.json',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                json = JSON.parse(JSON.stringify(data));
                json.forEach(function (item) {
                    option = document.createElement('option');
                    option.text = item['text'];
                    option.value = item['id'];
                    datalist.add(option);
                })
            },
        })
    });

    $('#qualification').change(function () {
        datalist = document.getElementById('course');
        datalist.options.length = 0;
        e = document.getElementById("qualification");
        id = e.options[e.selectedIndex].value;
        $.ajax({
            url: 'assets/ajax/course.php',
            type: 'GET',
            // url: 'json_data/'+id+'.json',
            dataType:'JSON',
            data: 'id='+id,
            success: function (data) {
                json = JSON.parse(JSON.stringify(data));
                json.forEach(function (item) {
                    option = document.createElement('option');
                    option.text = item['name'];
                    option.value = item['id'];
                    datalist.add(option);
                })

            },
            error: function (jqXHR,textStatus,errorThrown) {
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }
        })
    });

    $('#course').change(function () {
        datalist = document.getElementById('specialization');
        datalist.options.length = 0;
        e = document.getElementById("course");
        id = e.options[e.selectedIndex].value;
        $.ajax({
            url: 'assets/ajax/specialization.php',
            type: 'GET',
            dataType: 'JSON',
            data: 'id='+id,
            success: function (data) {
                json = JSON.parse(JSON.stringify(data));
                json.forEach(function (item) {
                    option = document.createElement('option')
                    option.value = item['id']
                    option.text = item['name']
                    datalist.add(option);
                })
            },
            error: function (jqXHR,textStatus,errorThrown) {
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }
        })
    })


</script>


</body>
</html>