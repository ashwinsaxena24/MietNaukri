<?php
session_start();
include_once 'includes/login_database.php';
include_once 'includes/functions.php';
$error_msg = '';

//destroy_session();

if(!empty($_SESSION['id'])) {
    if($_SESSION['type'] =='Student')
        header("Location: dashboard.php");
    else
        header("Location: post.php");

}
if(isset($_POST['submit'])) {

    if (!empty($_POST['unique-id']) && !empty($_POST['password'])) {

        $email = $_POST['unique-id'];
        $password = $_POST['password'];
        $password = hash('sha512', $password);
        $id = '';
        $stmt = $conn->prepare('select id from employer where unique_id=? and password=?');
        $stmt->bind_param('ss', $email,$password);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id);
        $stmt->fetch();

        if ($stmt->num_rows == 1) {

            $_SESSION['id'] = $id;
            $_SESSION['type'] = 'Employer';
            header("Location: empdash.php");

        } else {

            $error_msg = 'ID/Password is invalid';

        }

    }

    elseif (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = hash('sha512', $password);
        $id = '';
        $stmt = $conn->prepare('select id from student where email=? and password=?');
        $stmt->bind_param('ss', $email,$password);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id);
        $stmt->fetch();

        if ($stmt->num_rows == 1) {

            $_SESSION['id'] = $id;
            $_SESSION['type'] = 'Student';
            header("Location: dashboard.php");

        } else {

            $error_msg = 'Email/Password is invalid';

        }
    }else $error_msg = "Some fields are empty";
}
