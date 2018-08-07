<?php
session_start();
if(empty($_SESSION['id']))
    header("Location: index.php");
require_once 'includes/login_database.php';
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
			<a class="navbar-brand" href="index.php">Miet Job Portal</a>
		</div>

		<div class="collapse navbar-collapse" id="any">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="apply.php"> <span class="glyphicon glyphicon-search"></span> Find jobs</a></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="dashboard.php"> <span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<li><a href="settings.php"> <span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
				<li><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>

		</div>
	</nav>

<div class="container" id="middle" style="padding-bottom: 190px;">
    <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Company Name</th>
      <th scope="col">Title</th>
      <th scope="col">Branch</th>
      <th scope="col">Last Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $id = $_SESSION['id'];
  $result = $conn->query("select * from jobs_applied,jobs,specialization where student_id=$id and jobs_id=jobs.id and specialization.id = jobs.branch");
  $i=1;
  while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $company = $row['company_name'];
      $title = $row['job_title'];
      $branch = $row['name'];
      $last_date = $row['last_date_for_apply'];
      $status = ucfirst($row['status']);
      echo <<<_END
        <tr>
      <th scope="row">$i</th>
      <td>$company</td>
      <td>$title</td>
      <td>$branch</td>
      <td>$last_date</td>
      <td>$status</td>
    </tr>
_END;
      $i++;
  }
  ?>
<!--    <tr>-->
<!--      <th scope="row">1</th>-->
<!--      <td>Goggle</td>-->
<!--      <td>Mobile App</td>-->
<!--      <td>Computer Science</td>-->
<!--      <td>2018-08-15</td>-->
<!--      <td class="btn btn-primary btn-sm">Apply</td>-->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--      <th scope="row">2</th>-->
<!--      <td>Microsoft</td>-->
<!--      <td>Windows</td>-->
<!--      <td>Computer Science</td>-->
<!--      <td>2018-07-21</td>-->
<!--      <td class="btn btn-primary btn-sm">Apply</td>-->
<!--    </tr>-->
<!--    -->
<!--    <tr>-->
<!--      <th scope="row">3</th>-->
<!--      <td>Amazon</td>-->
<!--      <td>Cloud</td>-->
<!--      <td>Computer Science</td>-->
<!--      <td>2018-09-25</td>-->
<!--      <td class="btn btn-primary btn-sm">Apply</td>-->
<!--    </tr>-->
  </tbody>
</table>

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