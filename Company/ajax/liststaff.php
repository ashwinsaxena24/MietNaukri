<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 8/5/18
 * Time: 1:10 PM
 */
require_once '../../includes/login_database.php';
$result = array();

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $r = $conn->query("select staff.* from staff where id=$id");
    $row = $r->fetch_array(MYSQLI_NUM);
    for($i=0;$i<count($row);$i++) {
        $result[$i] = $row[$i];
    }
    echo json_encode($result);
}