<?php
$count = 0;
$d_count = 0;
$a_count = 0;

foreach ($division as $r) {
    $d_ids[] = $r['division_id'];
    $d_names[] = $r['division_name'];
    $d_count++;
}

foreach ($author as $r) {
    $a_ids[] = $r['author_id'];
    $a_names[] = $r['author_name'];
    $a_count++;
}
if ($a_count > 5) {
    $a_count = 5;
}

foreach ($category as $r) {
    $ids[] = $r['category_id'];
    $names[] = $r['category_name'];
    $count++;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal" style="width: 90% !important">
                <header><h1>Post a free Ad</h1></header>
                <section>
                    <form action="<?php echo base_url() ?>index.php/ad_code_verify" class="form-horizontal" method="post">
                        <fieldset style="padding-top: .5cm">
                            <?php
                            if ($book_error == "Required") {
                                ?>
                                <p style="color: red; width: 100%; text-align: center; font-weight: bold;  padding-bottom: .2cm"><?php echo "You did not fill out the required fields."; ?></p>
                                <?php
                            }
                            ?>
                            <div class="control-group">
                                <label class="control-label">Book name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Book name" name="book_name"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Author name (Comma separated)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Example: Jacob Milman, Good Rich" name="author_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Edition (Optional)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Edition" name="edition"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >Chosen category</label>
                                <div class="controls">
                                    <div class="input">
                                        <select  style="text-align: center !important" name="selected_category">
                                            <option value="0">--Add category--</option>
                                            <?php for ($i = 0; $i < $count; $i++) {
                                                ?>
                                                <option value="<?php echo $ids[$i]; ?>"><?php echo $names[$i]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Photo</label>
                                <div class="controls">
                                    <input type="file" name="img_file" id="file" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >Describe what makes your ad unique within 1000 characters</label>
                                <div class="controls">
                                    <textarea style="width: 50%" class="xxlarge" rows="3" name="book_des"></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Price (Optional)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Bangladeshi Taka"/>
                                </div>
                            </div>



                            <header><h1>Seller information</h1></header>
                            <div class="control-group" style="padding-top: .5cm">
                                <label class="control-label" for="name">Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputName" placeholder="Name" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputEmail" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Phone number</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputEmail" placeholder="Phone number" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >Location</label>
                                <div class="controls">
                                    <div class="input">
                                        <select  style="text-align: center">
                                            <?php for ($i = 0; $i < $d_count; $i++) {
                                                ?>
                                                <option value="<?php echo $d_ids[$i]; ?>"><?php echo $d_names[$i]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input">
                                        <select  style="text-align: center">
                                            <option>--District--</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="input">
                                        <select  style="text-align: center">
                                            <option>--Neighborhood--</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Add address</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Address" name="address"/>
                                </div>
                            </div>
                            <!--
                            <div class="control-group">
                                <label class="control-label">Occupation</label>
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="student" value="student" id="student" checked />
                                        <label for="student" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Student</label>
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="service_holder" value="service_holder" id="service_holder" />
                                        <label for="service_holder" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Service Holder</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" >Institutes</label>
                                <div class="controls">
                                    <div class="input">
                                        <select  style="text-align: center">
                                            <option value="1">Varsities</option>
                                            <option value="2">Colleges</option>
                                            <option value="3">Schools</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="button_style" style="width: 200px; margin-top: .2cm; margin-bottom: .2cm">Post</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </section>
            </div>
        </div>
        <!-- End Main -->
    </body>
</html>