<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 8/4/18
 * Time: 11:42 PM
 */
require_once '../../includes/login_database.php';

$result = array();
$r = $conn->query("select name,id from company");
while($row = $r->fetch_array(MYSQLI_NUM)) {
    $current['name'] = $row[0];
    $current['id'] = $row[1];
    array_push($result,$current);
}
echo json_encode($result);