<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 7/15/18
 * Time: 2:38 PM
 */
include_once 'includes/functions.php';
session_start();
destroy_session();

header("Location: index.php");