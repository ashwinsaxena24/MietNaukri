<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 8/4/18
 * Time: 12:40 AM
 */

require_once 'header.php';
require_once 'company.php';
?>

<div class="container-fluid decor_bg" id="middle">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary" >
                <div class="panel-heading">
                    <h4>Company</h4>
                </div>
                <div class="panel-body">
                    <p class="text-warning"><i>Add a Company</i><p>
                    <form action="addcompany.php" method="POST">
                        <?php
                        if($error_msg != '') {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">$error_msg</div>";
                        }
                        ?>
                        <?php
                        if($success_msg != '') {
                            echo "<div class=\"alert alert-success\" role=\"alert\">$success_msg</div>";
                        }
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Name *" name="name" value="<?php
                                if(!empty($_POST['name'])) echo $_POST['name'];
                            ?>" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Description"><?php
                                    if(!empty($_POST['description'])) echo $_POST['description'];
                                ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Website" name="website" value="<?php
                                if(!empty($_POST['website'])) echo $_POST['website'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" placeholder="Address"><?php
                                    if(!empty($_POST['address'])) echo $_POST['address'];
                                ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control"  placeholder="Number" name="number" value="<?php
                                if(!empty($_POST['number'])) echo $_POST['number'];
                            ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Email" name="email" value="<?php
                                if(!empty($_POST['email'])) echo $_POST['email'];
                            ?>">
                        </div>
                        <div class="form-group"> <select class="form-control simple-select" name="location">
                                <option></option>
                                <?php
                                $json = json_decode(file_get_contents('../assets/json_data/locations.json'), true);
                                //          print_r($json);
                                foreach ($json as $item) {
                                    $id = $item['id'];
                                    $text = $item['text'];
                                    if (!empty($_POST['location']) && $_POST['location'] == $id)
                                        echo "<option selected value='$id'>$text</option>";
                                    else
                                        echo "<option value='$id'>$text</option>";
                                }
                                //          ?>
                            </select></div>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button><br><br>
                    </form><br/>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.simple-select').select2({placeholder: 'Location'})
</script>
