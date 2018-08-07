<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 8/5/18
 * Time: 10:41 AM
 */

if(isset($_POST['submit']) or isset($_POST['update'])) {
    if(!empty($_POST['name'])) {
        $name = $_POST['name'];

        if(!empty($_POST['location']))
            $location = $_POST['location'];
        else $location = null;

        if(!empty($_POST['description']))
            $description = $_POST['description'];
        else $description = null;

        if(!empty($_POST['website'])) {
            $website = $_POST['website'];
            if(!check_url($website)) {
                $error_msg = "Website is invalid";
            }
        }
        else $website = null;

        if(!empty($_POST['number'])) {
            $number = $_POST['number'];
            if(!check_number($number)) {
                $error_msg = "Number is invalid";
            }
        }
        else $number = null;

        if(!empty($_POST['email'])) {
            $email = $_POST['email'];
            if(!check_email($email)) {
                $error_msg = "Email in invalid";
            }
        }
        else $email = null;

        if(!empty($_POST['address']))
            $address = $_POST['address'];
        else $address = null;

        if($error_msg == '') {
            if(isset($_POST['submit'])) {
                $stmt = $conn->prepare("insert into company values (null,?,?,?,?,?,?,?)");
                $stmt->bind_param('ssssssi', $name, $description, $website, $address, $number, $email, $location);
                $r = $stmt->execute();
                if (!$r) $error_msg = $conn->error;
                else $success_msg = 'Added successfully';
            }
            elseif(isset($_POST['update'])) {
                if(!empty($_POST['company'])) {

                    $id = $_POST['company'];
                    $stmt = $conn->prepare("update company set description=?, website=?, address=?, contanct=?, email=?, location_id=? where id=$id");
                    $stmt->bind_param('sssssi',$description,$website,$address,$number,$email,$location);
                    $r = $stmt->execute();
                    if(!$r) $error_msg = $conn->error;
                    else $success_msg = 'Updated Successfully';
                }
                else $error_msg = "Select a Company";
            }
        }
    }
    else
        $error_msg = "Some Fields are empty";
}
