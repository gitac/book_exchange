<?php
$count = 0;
$d_count = 0;
$a_count = 0;
$b_count = 0;
$s_count = 0;
$clg_count = 0;
$v_count = 0;
$dis_count = 0;
$n_count = 0;
foreach ($near_area as $r) {
    $n_ids[] = $r['near_area_id'];
    $n_names[] = $r['near_area_name'];
    $n_count++;
}

foreach ($district as $r) {
    $dis_ids[] = $r['district_id'];
    $dis_names[] = $r['district_name'];
    $dis_count++;
}

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
    function check_book_name(){
        var book_name = document.getElementById("book_name").value;
        if(book_name == "" || book_name == null){
            document.getElementById('b_error').innerHTML = "Fill the book name field";
        }
    }
    
    function check_author_name(){
        var a_name = document.getElementById("author_name1").value;
        if(a_name == "" || a_name == null){
            document.getElementById('a_error').innerHTML = "Fill the author name field";
        }
    }
    
    function check_u_name(){
        var n_name = document.getElementById("u_name").value;
        if(n_name == "" || n_name == null){
            document.getElementById('n_error').innerHTML = "Fill the name field";
        }
    }
    
    function check_email(){
        var e_name = document.getElementById("email").value;
        if(e_name == "" || e_name == null){
            document.getElementById('e_error').innerHTML = "Fill the email field";
        }
    }
    
    function check_book_des(){
        var a_name = document.getElementById("book_des").value;
        if(a_name == "" || a_name == null){
            document.getElementById('d_error').innerHTML = "Fill the book description field";
        }
        
    }
    
    function check_file(){
        check_book_name();
        check_author_name();
        document.getElementById('f_error').innerHTML = "";
    }
    function check_file_img(){
        var fileName = $("#file").val();
        if(fileName.lastIndexOf("PNG")===fileName.length-3 
            || fileName.lastIndexOf("GIF")===fileName.length-3
            || fileName.lastIndexOf("JPEG")===fileName.length-3
            || fileName.lastIndexOf("JPG")===fileName.length-3
            || fileName.lastIndexOf("png")===fileName.length-3 
            || fileName.lastIndexOf("gif")===fileName.length-3
            || fileName.lastIndexOf("jpeg")===fileName.length-3
            || fileName.lastIndexOf("jpg")===fileName.length-3)
        //alert("OK");;
            ;
        else
            document.getElementById('f_error').innerHTML = "Please select a image of valid format";
    }
    function check_error(error){
        if(error == "a_error"){
            check_book_name();
        } else if(error == "edi_error"){
            check_book_name();
            check_author_name();
        } else if(error == "d_error"){
            check_file_img();
            check_book_name();
            check_author_name();
        } else if(error == "p_error" || error == "n_error"){
            check_file_img();
            check_book_name();
            check_author_name();
            check_book_des();
        } else if(error == "e_error"){
            check_file_img();
            check_book_name();
            check_author_name();
            check_book_des();
            check_u_name();
        } else if(error == "m_error"){
            check_file_img();
            check_book_name();
            check_author_name();
            check_book_des();
            check_u_name();
            check_email();  
        } else if(error == "add_error"){
            check_file_img();
            check_book_name();
            check_author_name();
            check_book_des();
            check_u_name();
            check_email();  
            checkMblNo();
        }
        document.getElementById(error).innerHTML = "";
    }
    
    function post(){
        check_file_img();
        check_book_name();
        check_author_name();
        check_book_des();
        check_u_name();
        check_email();  
        checkMblNo();
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
               
                    <form action="<?php echo base_url()?>index.php/post_free_ad/ad_verify" class="form-horizontal" id="contact-form" method="post"
                  enctype="multipart/form-data">
                    <fieldset style="padding-top: .5cm">
                        <label style="margin-left: 30%; padding-bottom: .5cm; color: red; font-weight: bold"><?php echo $book_error; ?></label>
                        <div class="control-group" style="padding-top: .5cm">
                            <label class="control-label" ><b>Chosen category</b></label>
                            <div class="controls">
                                <div class="input">
                                    <select  style="text-align: center !important" id="selected_category" name="selected_category">

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
                            <label class="control-label"><b>Book name</b></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" placeholder="Book name" id="book_name" name="book_name" list="suggests_book" onfocus="check_error('b_error')" onblur="check_book_name()"/>
                                <label style="color: red; font-weight: bold" id="b_error"></label>
                                <datalist id="suggests_book">
                                    <?php for ($i = 0; $i < $b_count; $i++) { ?>
                                        <option value="<?php echo $book_names[$i]; ?>">
                                        <?php } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><b>Author name</b></label>
                            <div class="controls">
                                <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" id="author_name1" name="author_name1" list="suggests_author" onfocus="check_error('a_error')" onblur="check_author_name()"/>
                                <label style="color: red; font-weight: bold" id="a_error"></label>
                                <datalist id="suggests_author">
                                    <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                        <option value="<?php echo $a_names[$i]; ?>">
                                        <?php } ?>
                                </datalist>
                                <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(2)"/>
                                <div id="add_author2" style="display: none">
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name2" list="suggests_author"/>
                                    <datalist id="suggests_author">
                                        <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                            <option value="<?php echo $a_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist>
                                    <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(3)"/>
                                </div>
                                <div id="add_author3" style="display: none">
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name3" list="suggests_author"/>
                                    <datalist id="suggests_author">
                                        <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                            <option value="<?php echo $a_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist>
                                    <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(4)"/>
                                </div>
                                <div id="add_author4" style="display: none">
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name4" list="suggests_author"/>
                                    <datalist id="suggests_author">
                                        <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                            <option value="<?php echo $a_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist>
                                    <input style="float:left; margin-left: 15px; margin-top: 5px; clear:none;" type="button" id="add_Button" onclick="add_author(5)"/>
                                </div>
                                <div id="add_author5" style="display: none">
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" placeholder="Author name" name="author_name5" list="suggests_author"/>
                                    <datalist id="suggests_author">
                                        <?php for ($i = 0; $i < $a_count; $i++) { ?>
                                            <option value="<?php echo $a_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><b>Edition</b> (Optional)</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" placeholder="Edition" name="edition" onfocus="check_error('edi_error')"/>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label"><b>Photo</b></label>
                            <div class="controls">
                                <input type="file" name="img_file" id="file" onclick="check_file()"/>
                                <label style="color: red; font-weight: bold" id="f_error"></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" ><b>Describe what makes your ad unique within 1000 characters</b></label>
                            <div class="controls">

                                <textarea style="width: 50%" class="xxlarge" rows="3" id="book_des" onfocus="check_error('d_error')" onblur="check_book_des()" name="book_des"></textarea>
                                <label style="color: red; font-weight: bold" id="d_error"></label>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><b>Price</b> (Optional)</label>
                            <div class="controls">
                                <input type="text" name="price" class="input-xlarge" placeholder="Bangladeshi Taka" onfocus="check_error('p_error')"/>
                            </div>
                        </div>



                        <header><h1>Seller information</h1></header>
                        <div class="control-group" style="padding-top: .5cm">
                            <label class="control-label" for="name"><b>Name</b></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" placeholder="Name" name="name" id="u_name" onfocus="check_error('n_error')" onblur="check_u_name()"/>
                                <label style="color: red; font-weight: bold" id="n_error"></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail"><b>Email</b></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" placeholder="Email" name="email" id="email" onfocus="check_error('e_error')" onblur="check_email()"/>
                                <label style="color: red; font-weight: bold" id="e_error"></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail"><b>Phone number</b></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" id="inputPhone" placeholder="Phone number" name="phone" onfocus="check_error('m_error')" onblur="checkMblNo()"/>
                                <label style="color: red; font-weight: bold" id="m_error"></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" ><b>Location</b></label>
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
                                <div class="input" id="district">
                                    <select  style="text-align: center" id="selected_district">
                                        <?php for ($i = 0; $i < $dis_count; $i++) {
                                            ?>
                                            <option value="<?php echo $dis_ids[$i]; ?>"><?php echo $dis_names[$i]; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
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
                            <label class="control-label"><b>Add address</b></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" placeholder="Address" name="address" id="address" onfocus="check_error('add_error')"/>
                                <label style="color: red; font-weight: bold" id="add_error"></label>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><b>Occupation</b></label>
                            <div class="controls">
                                <div style="float:left; clear:none;">
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="occupation" value="student" id="student" onclick="radioFunction('student')"/>
                                    <label for="student" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Student</label>
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="occupation" value="service_holder" id="service_holder" onclick="radioFunction('service_holder')"/>
                                    <label for="service_holder" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Service Holder</label>
                                </div>
                            </div>
                        </div>
                        <div id="ins" style="display: none">
                            <div class="control-group">
                                <label class="control-label"><b>Institutes</b></label>
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="institute" value="school" id="school" onclick="radioFunction('school')"/>
                                        <label for="school" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">School</label>
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="institute" value="college" id="college" onclick="radioFunction('college')"/>
                                        <label for="college" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">College</label>
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="institute" value="varsity" id="varsity" onclick="radioFunction('varsity')"/>
                                        <label for="varsity" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Varsity</label>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group" id="scl" style="display: none">
                                <label class="control-label"><b>School</b></label>
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
                                <label class="control-label"><b>College</b></label>
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
                                <label class="control-label" ><b>Varsity</b></label>
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
                                <label class="control-label"><b>Office name</b></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Address" name="office_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b>Office address</b></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Address" name="office_address"/>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="button_style" style="width: 200px; margin-top: .2cm; margin-bottom: .2cm" onmouseover="post()">Post</button>
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