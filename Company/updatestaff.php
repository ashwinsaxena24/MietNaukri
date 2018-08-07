<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 8/4/18
 * Time: 12:40 AM
 */

require_once 'header.php';
?>

<div class="container-fluid decor_bg" id="middle">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary" >
                <div class="panel-heading">
                    <h4>Update Staff</h4>
                </div>
                <div class="panel-body">
                    <p class="text-warning"><i>Update Staff</i><p>
                    <form action="updatestaff.php" method="POST">
                        <?php
                        if($error_msg != '') {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">$error_msg</div><br>";
                        }
                        ?>
                        <div class="form-group">
                            <select name="origname" class="form-control name"><option></option></select>
                        </div>
                        <div class="form-group">
                            <select name="company" class="form-control simple-select"><option></option></select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control"  placeholder="Number" name="number">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control"  placeholder="Whatsapp" name="whatsapp">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Facebook" name="facebook">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Twitter" name="twitter">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Linkedin" name="linkedin">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" onfocus="(this.type='date')" class="form-control"  placeholder="Start" name="start">
                        </div>
                        <div class="form-group">
                            <input type="text" onfocus="(this.type='date')" class="form-control"  placeholder="End" name="end">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Designation" name="designation">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Email" name="email" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button><br><br>
                    </form><br/>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.simple-select').select2({placeholder: 'Company'})
    $('.name').select2({placeholder: 'Name'})
</script>
