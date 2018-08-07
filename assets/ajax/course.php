<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 6/25/18
 * Time: 2:42 PM
 */

error_reporting(E_ALL);
ini_set('display_errors',1);

include_once '../../includes/login_database.php';
include_once '../../includes/functions.php';

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("select id,name from course where highest_qualification_id=$id");
    echo populate_array($result);
}