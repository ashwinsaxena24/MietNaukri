<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 6/21/18
 * Time: 3:37 PM
 */

include_once 'login_database.php';

function check_email($email) {

    return preg_match('/[a-zA-Z_][\w._]*\@[a-zA-Z]\w*((\.[\w]+)+)/',$email);

}


function verify_email($conn,$email) {

    $result = $conn->query("select * from student where email='$email'");
    if($result->num_rows > 0)
        return false;
    return true;

}


function check_name($name) {

    return preg_match('/[a-zA-Z]/',$name);

}

function check_password($password) {

    return !preg_match('/[a-z]/',$password) or !preg_match('/[A-Z]/',$password) or !preg_match('/[0-9]/',$password);

}

function check_url($url) {
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url);
}

function check_number($number) {

    return preg_match("/^[\d]{10}$/",$number);

}

function check_year($year) {

    return preg_match("/^[\d]{4}$/",$year);

}

function check_file($file) {

    $filetype = $file['type'];
    if ($file['size'] < 0) return false;

    if($filetype != 'application/msword' and $filetype != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' and $filetype != 'application/pdf' and $filetype != 'application/rtf') return false;

    return true;


}

function destroy_session() {

    $_SESSION = array();
    session_destroy();

}

function populate_array($result) {

    $json = array();

    if($result->num_rows == 0) {

        $current['id'] = 0;
        $current['name'] = 'No data found';
        array_push($json,$current);
        return json_encode($json);

    }

    $current['id'] = -1;
    $current['name'] = '<select>';
    array_push($json,$current);

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $id = $row['id'];
        $name = $row['name'];
        $current['id'] = $id;
        $current['name'] = $name;
        array_push($json,$current);

    }

    return json_encode($json);

}
