<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 8/5/18
 * Time: 12:56 PM
 */
require_once '../../includes/login_database.php';

$result = array();

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $r = $conn->query("select name,id from staff,company_staff where company_id=$id and staff_id = id");
    while($row = $r->fetch_array(MYSQLI_NUM)) {
        $current['name'] = $row[0];
        $current['id'] = $row[1];
        array_push($result,$current);
    }
    echo json_encode($result);
}