<?php
$count = 0;
$d_count = 0;
$a_count = 0;
$b_count = 0;
$s_count = 0;
$clg_count = 0;
$v_count = 0;
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

foreach ($category as $r) {
    $ids[] = $r['category_id'];
    $names[] = $r['category_name'];
    $count++;
}

foreach ($book as $r) {
    $book_ids[] = $r['book_id'];
    $book_names[] = $r['book_name'];
    $b_count++;
}
?>
<script> 
    function add_category_name(){
        var v= document.getElementById("selected_category").value;
        if(v == 0){
            document.getElementById('c_name').style.display = "block";
        } else {
            document.getElementById('c_name').style.display = "none";
        }
    }
    function add_author(num){
        if(num == 2){
            document.getElementById("add_author2").style.display = "block";
        } else if(num == 3){
            document.getElementById("add_author3").style.display = "block";
        } else if(num == 4){
            document.getElementById("add_author4").style.display = "block";
        } else if(num == 5){
            document.getElementById("add_author5").style.display = "block";
        }
    }
    function checkMblNo(){
        var phone= document.getElementById("inputPhone").value;
        var c = /^01(6|5|7|9|1|8)\d{8}$/.test(phone);  
        if(c == false){
            document.getElementById('m_error').innerHTML = "Invalid phone number";
        }
    }
    function checkMblNo2(){
        document.getElementById('m_error').innerHTML = "";
    }
    function select_div(){
        var l= document.getElementById("division").value;
       // alert(l);
    }
    function radioFunction(name)
    {
        if(name == "student"){
            document.getElementById('service_holder').checked = false;
            document.getElementById('srv').style.display = "none";
            document.getElementById('ins').style.display = "block";
        } else if(name == "service_holder"){
            document.getElementById('student').checked = false;
            document.getElementById('ins').style.display = "none";
            document.getElementById('srv').style.display = "block";
        } else if(name == "school"){
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
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal" style="width: 90% !important">
                <header><h1>Post a free Ad</h1></header>
                <section>
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'contact-form', 'method' => 'post');

                    echo form_open(base_url().'index.php/ad_code_verify', $attributes);
                    ?>
                    
                        <fieldset style="padding-top: .5cm">
                            
                            <div class="control-group">
                                <label class="control-label" >Chosen category</label>
                                <div class="controls">
                                    <div class="input">
                                        <select  style="text-align: center !important" id="selected_category" onchange="add_category_name()">

                                            <?php for ($i = 0; $i < $count; $i++) {
                                                ?>
                                                <option value="<?php echo $ids[$i]; ?>"><?php echo $names[$i]; ?></option>
                                            <?php }
                                            ?>
<!--                                            <option value="0">Others</option> -->
                                        </select>
<!--                                        <input id="c_name" style="display: none" type="text" class="input-xlarge" placeholder="Category name" name="category_name"/>-->
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Book name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Book name" name="book_name" list="suggests_book"/>
                                    <datalist id="suggests_book">
                                        <?php for ($i = 0; $i < $b_count; $i++) { ?>
                                            <option value="<?php echo $book_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Author name</label>
                                <div class="controls">
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name1" list="suggests_author"/>
                                    <datalist id="suggests_author">
                                        <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                            <option value="<?php echo $a_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist>
                                    <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(2)"/>
                                    <div id="add_author2" style="display: none">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name" list="suggests_author"/>
                                        <datalist id="suggests_author">
                                            <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                                <option value="<?php echo $a_names[$i]; ?>">
                                                <?php } ?>
                                        </datalist>
                                        <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(3)"/>
                                    </div>
                                    <div id="add_author3" style="display: none">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name" list="suggests_author"/>
                                        <datalist id="suggests_author">
                                            <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                                <option value="<?php echo $a_names[$i]; ?>">
                                                <?php } ?>
                                        </datalist>
                                        <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(4)"/>
                                    </div>
                                    <div id="add_author4" style="display: none">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name" list="suggests_author"/>
                                        <datalist id="suggests_author">
                                            <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                                <option value="<?php echo $a_names[$i]; ?>">
                                                <?php } ?>
                                        </datalist>
                                        <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(5)"/>
                                    </div>
                                    <div id="add_author5" style="display: none">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name" list="suggests_author"/>
                                        <datalist id="suggests_author">
                                            <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                                <option value="<?php echo $a_names[$i]; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Edition (Optional)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Edition" name="edition"/>
                                    
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
                                    <input type="text" class="input-xlarge" id="inputPhone" placeholder="Phone number" name="phone" onfocus="checkMblNo2()" onblur="checkMblNo()"/>
                                    <label style="color: red; font-weight: bold" id="m_error"></label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >Location</label>
                                <div class="controls">
                                    <div class="input">
                                        <select style="text-align: center" id="division" onchange="select_div()">
                                            <?php for ($i = 0; $i < $d_count; $i++) {
                                                ?>
                                                <option value="<?php echo $d_ids[$i]; ?>"><?php echo $d_names[$i]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input" id="district" style="display: none">
                                        <select  style="text-align: center">
                                            <?php for ($i = 0; $i < $d_count; $i++) {
                                                ?>
                                                <option value="<?php echo $d_ids[$i]; ?>"><?php echo $d_names[$i]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input" id="neighborhood" style="display: none">
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

                            <div class="control-group">
                                <label class="control-label">Occupation</label>
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="student" value="student" id="student" onclick="radioFunction('student')"/>
                                        <label for="student" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Student</label>
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="service_holder" value="service_holder" id="service_holder" onclick="radioFunction('service_holder')"/>
                                        <label for="service_holder" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Service Holder</label>
                                    </div>
                                </div>
                            </div>
                            <div id="ins" style="display: none">
                                <div class="control-group">
                                    <label class="control-label">Institutes</label>
                                    <div class="controls">
                                        <div style="float:left; clear:none;">
                                            <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="school" value="school" id="school" onclick="radioFunction('school')"/>
                                            <label for="school" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">School</label>
                                            <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="college" value="college" id="college" onclick="radioFunction('college')"/>
                                            <label for="college" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">College</label>
                                            <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="varsity" value="varsity" id="varsity" onclick="radioFunction('varsity')"/>
                                            <label for="varsity" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Varsity</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" id="scl" style="display: none">
                                    <label class="control-label" >School</label>
                                    <div class="controls">
                                        <div class="input">
                                            <input type="text" class="input-xlarge" placeholder="School name" name="school_name" list="suggests_school"/>
                                            <datalist id="suggests_school">
                                                <?php for ($i = 0; $i < $s_count; $i++) { ?>
                                                    <option value="<?php echo $s_names[$i]; ?>">
                                                    <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" id="clg" style="display: none">
                                    <label class="control-label" >College</label>
                                    <div class="controls">
                                        <div class="input">
                                            <input type="text" class="input-xlarge" placeholder="College name" name="college_name" list="suggests_college"/>
                                            <datalist id="suggests_college">
                                                <?php for ($i = 0; $i < $clg_count; $i++) { ?>
                                                    <option value="<?php echo $clg_names[$i]; ?>">
                                                    <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" id="vrsty" style="display: none">
                                    <label class="control-label" >Varsity</label>
                                    <div class="controls">
                                        <div class="input">
                                            <input type="text" class="input-xlarge" placeholder="Varsity name" name="varsity_name" list="suggests_varsity"/>
                                            <datalist id="suggests_varsity">
                                                <?php for ($i = 0; $i < $v_count; $i++) { ?>
                                                    <option value="<?php echo $v_names[$i]; ?>">
                                                    <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="srv" style="display: none">

                                <div class="control-group">
                                    <label class="control-label">Office name</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" placeholder="Address" name="address"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Office address</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" placeholder="Address" name="address"/>
                                    </div>
                                </div>
                            </div>
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