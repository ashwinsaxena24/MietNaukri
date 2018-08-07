<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 8/4/18
 * Time: 12:40 AM
 */

require_once 'header.php';

if(isset($_POST['submit'])) {

    if(!empty($_POST['company']) and !empty($_POST['name']) and !empty($_POST['number']) and !empty($_POST['designation']) and !empty($_POST['email'])) {
        $company = $_POST['company'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $number = $_POST['number'];
        if(check_number($number)) {
            $email = $_POST['email'];
            if(check_email($email)) {

                if(!empty($_POST['whatsapp'])) {
                    $whatsapp = $_POST['whatsapp'];
                    if (!check_number($whatsapp)) {
                        $error_msg = 'Whatsapp number in invalid';
                    }
                }
                else $whatsapp = null;

                if(!empty($_POST['facebook']))
                    $facebook = $_POST['facebook'];
                else $facebook = null;

                if(!empty($_POST['twitter']))
                    $twitter = $_POST['twitter'];
                else $twitter = null;

                if(!empty($_POST['linkedin']))
                    $linkedin = $_POST['linkedin'];
                else $linkedin = null;

                if(!empty($_POST['address']))
                    $address = $_POST['address'];
                else $address = null;

                if(!empty($_POST['start']))
                    $start = $_POST['start'];
                else $start = null;

                if(!empty($_POST['end']))
                    $end = $_POST['end'];
                else $end = null;

                if($error_msg == '') {

                    $stmt = $conn->prepare("insert into staff values (null,?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param('sssssssssss',$name,$number,$whatsapp,$facebook,$twitter,$linkedin,$address,$start,$end,$designation,$email);
                    $r = $stmt->execute();
                    if(!$r) {
                        $error_msg = $conn->error;
                    }
                    else {
                        $id = $conn->insert_id;
                        $r = $conn->query("insert into company_staff values ($id,$company)");
                        if(!$r) {
                            $error_msg = $conn->error;
                        }
                        else $success_msg = "Added Successfully";
                    }
                }
            }
            else $error_msg = 'Email in invalid';
        }
        else $error_msg = 'Number is invalid';
    }
    else
        $error_msg = 'Some Fields are empty';

}

?>

<div class="container-fluid decor_bg" id="middle">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary" >
                <div class="panel-heading">
                    <h4>Staff</h4>
                </div>
                <div class="panel-body">
                    <p class="text-warning"><i>Add a Staff</i><p>
                    <form action="addstaff.php" method="POST">
                        <?php
                        if($error_msg != '') {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">$error_msg</div><br>";
                        }
                        ?>
                        <?php
                        if($success_msg != '') {
                            echo "<div class=\"alert alert-success\" role=\"alert\">$success_msg</div>";
                        }
                        ?>
                        <div class="form-group">
                            <select name="company" id="company" class="form-control simple-select"><option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Name *" name="name" value="<?php
                            if(!empty($_POST['name'])) echo $_POST['name'];
                            ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control"  placeholder="Number *" name="number" value="<?php
                            if(!empty($_POST['number'])) echo $_POST['number'];
                            ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control"  placeholder="Whatsapp" value="<?php
                            if(!empty($_POST['whatsapp'])) echo $_POST['whatsapp'];
                            ?>" name="whatsapp">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Facebook" value="<?php
                            if(!empty($_POST['facebook'])) echo $_POST['facebook'];
                            ?>" name="facebook">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Twitter" name="twitter" value="<?php
                            if(!empty($_POST['twitter'])) echo $_POST['twitter'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Linkedin" name="linkedin" value="<?php
                            if(!empty($_POST['linkedin'])) echo $_POST['linkedin'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" placeholder="Address"><?php
                                if(!empty($_POST['address'])) echo $_POST['address'];
                                ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" onfocus="(this.type='date')" class="form-control" value="<?php
                            if(!empty($_POST['start'])) echo $_POST['start'];
                            ?>" placeholder="Start" name="start">
                        </div>
                        <div class="form-group">
                            <input type="text" onfocus="(this.type='date')" class="form-control" value="<?php
                            if(!empty($_POST['end'])) echo $_POST['end'];
                            ?>" placeholder="End" name="end">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Designation *" value="<?php
                            if(!empty($_POST['designation'])) echo $_POST['designation'];
                            ?>" name="designation" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Email *" name="email" value="<?php
                            if(!empty($_POST['email'])) echo $_POST['email'];
                            ?>" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button><br><br>
                    </form><br/>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#company').ready(function () {
        datalist = document.getElementById('company')
        $.ajax({
            url: 'ajax/company.php',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                json = JSON.parse(JSON.stringify(data));
                json.forEach(function (item) {
                    option = document.createElement('option');
                    option.text = item['name'];
                    option.value = item['id'];
                    datalist.add(option);
                })
            },
            error: function (jqXHR,textStatus,errorThrown) {
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }
        })
    })
    $('.simple-select').select2({placeholder: 'Company *'})
</script>
