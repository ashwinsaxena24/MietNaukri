<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 6/22/18
 * Time: 10:49 AM
 */

include_once '../includes/login_database.php';

$json_data = array();

$query = "select id,name from highest_qualification";

$result = $conn->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC)) {

    $name = $row['name'];
    $id = $row['id'];
    $current['id'] = $id;
    $current['text'] = $name;
    array_push($json_data,$current);

}

$file = fopen('../json_data/qualifications.json','w');
fputs($file,json_encode($json_data));
echo "Done!";