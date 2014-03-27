<?php
if($customer != NULL){
    foreach ($customer as $r){
        $customer_ids[] = $r['customer_id'];
        $customer_genders[] = $r['customer_gender'];
        $customer_usernames[] = $r['customer_username'];
        $customer_emails[] = $r['customer_email'];
        $customer_addresses[] = $r['customer_address'];
        $customer_first_names[] = $r['customer_first_name'];
        $customer_last_names[] = $r['customer_last_name'];
        $customer_near_area_ids[] = $r['customer_near_area_id'];
        $customer_ins_ids[] = $r['customer_ins_id'];
        $customer_phn_nos[] = $r['customer_phn_no'];
        $customer_photos[] = $r['customer_photo'];
        $customer_about_mes[] = $r['customer_about_me'];
        $customer_interests[] = $r['customer_interest'];
    }
}
$n_count = 0;
$dis_count = 0;
$d_count = 0;
$v_count = 0;
$s_count = 0;
$clg_count = 0;
foreach ($near_area as $r) {
    $n_ids[] = $r['near_area_id'];
    $n_names[] = $r['near_area_name'];
    $n_count++;
}

foreach ($school as $r) {
    $s_ids[] = $r['institute_id'];
    $s_names[] = $r['institute_name'];
    $s_count++;
}

foreach ($college as $r) {
    $clg_ids[] = $r['institute_id'];
    $clg_names[] = $r['institute_name'];
    $clg_count++;
}
foreach ($varsity as $r) {
    $v_ids[] = $r['institute_id'];
    $v_names[] = $r['institute_name'];
    $v_count++;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script>
            function radioFunction(name)
            {
                if(name == "school"){
                    document.getElementById('scl').style.display = "block";
                    document.getElementById('clg').style.display = "none";
                    document.getElementById('vrsty').style.display = "none";
                    document.getElementById('college').checked = false;
                    document.getElementById('varsity').checked = false;
                }else if(name == "college"){
                    document.getElementById('scl').style.display = "none";
                    document.getElementById('clg').style.display = "block";
                    document.getElementById('vrsty').style.display = "none";
                    document.getElementById('school').checked = false;
                    document.getElementById('varsity').checked = false;
                }else if(name == "varsity"){
                    document.getElementById('scl').style.display = "none";
                    document.getElementById('clg').style.display = "none";
                    document.getElementById('vrsty').style.display = "block";
                    document.getElementById('school').checked = false;
                    document.getElementById('college').checked = false;
                }
            }
            
            function checkMblNo(){
        var phone= document.getElementById("inputPhone").value;
        if(phone == "" || phone == null){
            document.getElementById('m_error').innerHTML = "Fill the phone number field";
        } else {
            var c = /^01(6|5|7|9|1|8)\d{8}$/.test(phone);  
            if(c == false){
                document.getElementById('m_error').innerHTML = "Invalid phone number";
            }
        }
    }
    function at_first(){
        document.getElementById('selected_neighborhood').value = <?php echo(json_encode($customer_near_area_ids[0])); ?>;
    }
    function check_error(error){
        document.getElementById(error).innerHTML = "";
    }
        </script>
    </head>
    <body onload="at_first()">
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal" style="width: 90% !important">
                <header><h1>Edit Profile</h1></header>
                <section>
                    <form action="<?php echo base_url() ?>index.php/my_profile/create_profile/edit" class="form-horizontal" id="contact-form" method="post"
                  enctype="multipart/form-data">
                        <fieldset style="overflow:hidden; padding-top: .5cm">
                            <label style="margin-left: 30%; padding-bottom: .5cm; color: red; font-weight: bold"><?php echo $edit_pro_error; ?><br/></label>
                        
                            <span style="margin-left: 40%; font-weight: bold; font-size: 16px; color: red">* Required fields</span>
                            <div class="control-group" style="margin-top: .5cm">
                                <label class="control-label"><b><span style="color: red">*</span>First name</b></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="First name" value="<?php echo $customer_first_names[0]?>" name="f_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b><span style="color: red">*</span>Last name</b></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?php echo $customer_last_names[0]?>" placeholder="Last name" name="l_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b>Gender</b></label>
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="gender" value="male" id="male" <?php if($customer_genders[0] == "male")?> checked />
                                        <label for="male" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Male</label>
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="gender" value="female" id="female" <?php if($customer_genders[0] == "female")?> checked/>
                                        <label for="female" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPhn"><b><span style="color: red">*</span>Phone number</b></label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $customer_phn_nos[0]?>" class="input-xlarge" id="inputPhone" placeholder="Phone number" name="phone" onfocus="check_error('m_error')" onblur="checkMblNo()"/>
                                    <label style="color: red; font-weight: bold" id="m_error"></label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" ><b><span style="color: red">*</span>Location</b></label>
                                <div class="controls">
                                    
                                    <div class="input" id="neighborhood">
                                        <select  style="text-align: center" id="selected_neighborhood">
                                            <?php for ($i = 0; $i < $n_count; $i++) {
                                                ?>
                                                <option value="<?php echo $n_ids[$i]; ?>"><?php echo $n_names[$i]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b><span style="color: red">*</span>Add address</b></label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $customer_addresses[0]?>" class="input-xlarge" placeholder="Address" name="address" id="address" onfocus="check_error('add_error')"/>
                                    <label style="color: red; font-weight: bold" id="add_error"></label>
                                </div>
                            </div>
                            <div id="ins">
                                <div class="control-group">
                                    <label class="control-label"><b>Institutes</b></label>
                                    <div class="controls">
                                        <div style="float:left; clear:none;">
                                            <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="institute" value="school" id="school" onclick="radioFunction('school')"/>
                                            <label for="school" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">School</label>
                                            <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="institute" value="college" id="college" onclick="radioFunction('college')"/>
                                            <label for="college" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">College</label>
                                            <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="institute" value="varsity" id="varsity" checked onclick="radioFunction('varsity')"/>
                                            <label for="varsity" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Varsity</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" id="scl" style="display: none">
                                    <label class="control-label"><b>School</b></label>
                                    <div class="controls">
                                        <div class="input">
                                            <input type="text" value="<?php 
                                            for($i=0; $i < $s_count; $i++){
                                                if($s_ids[$i] == $customer_ins_ids[0]){
                                                    echo $i_names[$i];
                                                    break;
                                                }
                                            }
                                            ?>" class="input-xlarge" placeholder="School name" name="ins_name" list="suggests_school"/>
                                            <datalist id="suggests_school">
                                                <?php for ($i = 0; $i < $s_count; $i++) { ?>
                                                    <option value="<?php echo $s_names[$i]; ?>">
                                                    <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" id="clg" style="display: none">
                                    <label class="control-label"><b>College</b></label>
                                    <div class="controls">
                                        <div class="input">
                                            <input type="text" value="<?php 
                                            for($i=0; $i < $clg_count; $i++){
                                                if($clg_ids[$i] == $customer_ins_ids[0]){
                                                    echo $clg_names[$i];
                                                    break;
                                                }
                                            }
                                            ?>" class="input-xlarge" placeholder="College name" name="ins_name" list="suggests_college"/>
                                            <datalist id="suggests_college">
                                                <?php for ($i = 0; $i < $clg_count; $i++) { ?>
                                                    <option value="<?php echo $clg_names[$i]; ?>">
                                                    <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" id="vrsty">
                                    <label class="control-label" ><b>Varsity</b></label>
                                    <div class="controls">
                                        <div class="input">
                                            <input type="text" value="<?php 
                                            for($i=0; $i < $v_count; $i++){
                                                if($v_ids[$i] == $customer_ins_ids[0]){
                                                    echo $v_names[$i];
                                                    break;
                                                }
                                            }
                                            ?>" class="input-xlarge" placeholder="Varsity name" name="ins_name" list="suggests_varsity"/>
                                            <datalist id="suggests_varsity">
                                                <?php for ($i = 0; $i < $v_count; $i++) { ?>
                                                    <option value="<?php echo $v_names[$i]; ?>">
                                                    <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><b>Photo</b></label>
                                <div class="controls">
                                    <input type="file" name="img_file"></input>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" ><b>About me</b></label>
                                <div class="controls">
                                    <textarea  name="about_me" class="xxlarge" rows="3" style="width: 272px !important" ><?php echo $customer_about_mes[0]?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" ><b>Interests</b></label>
                                <div class="controls">
                                    <textarea name="interests" value="<?php echo $customer_interests[0]?>" class="xxlarge" rows="3" style="width: 272px !important"><?php echo $customer_interests[0]?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                        <button class="button_style" style="float:left; clear:none; margin: 2px 0 0 2px; width: 200px;">Submit</button>
                                    
                                    <label style="float:left; clear:none; display:block; padding: 8px 1em 0 0;">&nbsp; &nbsp; or</label>
                                    <a style="float:left; clear:none; margin: 8px 0 0 2px;" href="<?php echo base_url()?>index.php/settings">Cancel</a>
                                    </div>
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