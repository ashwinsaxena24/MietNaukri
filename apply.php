<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 7/15/18
 * Time: 2:49 PM
 */

include_once 'includes/login_database.php';
session_start();
if (empty($_SESSION['id'])) header("Location: index.php");

$id = $_SESSION['id'];

if(!empty($_POST['jobid'])) {
    $jid = $_POST['jobid'];
    $result = $conn->query("select college_name,email,last_phone,resume_id from colleges,student,resume where colleges.Student_id=$id order by college_id desc limit 1");
    $row = $result->fetch_array(MYSQLI_NUM);
    $r = $conn->query("insert into jobs_applied values ($jid ,$id,'applied','{$row[3]}','{$row[2]}','{$row[1]}','{$row[0]}')");
    if(!$r) echo $conn->error;
    $r = $conn->query("update student set no_of_jobs_applied = no_of_jobs_applied+1 where id=$id");
    $r = $conn->query("update jobs set no_of_applications = no_of_applications+1 where id=$jid");
}

$result = $conn->query("select colleges.specialization_id from colleges where Student_id = $id");
$branch = $result->fetch_array(MYSQLI_NUM)[0];
$result = $conn->query("select jobs.*,specialization.name from jobs,specialization where jobs.branch=$branch and specialization.id=jobs.branch");
$i = 1;
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/index.css">
    <title>Find Jobs</title>

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
            <th scope="col">Apply</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $company = $row['company_name'];
            $title = $row['job_title'];
            $branch = $row['name'];
            $last_date = $row['last_date_for_apply'];
            echo <<<_END
        <tr>
      <th scope="row">$i</th>
      <td>$company</td>
      <td>$title</td>
      <td>$branch</td>
      <td>$last_date</td>
_END;
            $jid = $row['id'];
           $q = $conn->query("select * from jobs_applied where student_id=$id and jobs_id=$jid");
           if($q->num_rows == 0)
                echo "<form action='apply.php' method='post'><input type='hidden' name='jobid' value='$jid'><td><button type='submit' class=\"btn btn-primary btn-sm\" style='width: 62.03px'>Apply</button></td></form>";
            else
                echo "<td><button  class=\"btn btn-primary btn-sm\" disabled>Applied</button></td>";
    echo "</tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>

</div>

<footer>
    <div class="container">
        <center>
            <p>Copyright &copy; Miet. All Rights Reserved | Contact Us: +91 90000 00000</p>
        </center>
    </div>
</footer>

</body>
</html>

