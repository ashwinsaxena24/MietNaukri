<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 6/20/18
 * Time: 3:00 PM
 */

//Only for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'variables.php';

$conn = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);

if($conn->connect_error) {

    echo $conn->connect_error;

}
