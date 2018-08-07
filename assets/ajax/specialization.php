<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 6/25/18
 * Time: 1:11 AM
 */

include_once '../../includes/login_database.php';
include_once '../../includes/functions.php';

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("select id,name from specialization where course_id=$id");
    echo populate_array($result);
}