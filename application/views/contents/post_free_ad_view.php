<?php
$count = 0;
$a_count = 0;
$b_count = 0;

foreach ($author as $r) {
    $a_ids[] = $r['author_id'];
    $a_names[] = $r['author_name'];
    $a_count++;
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
        } else if(error == "m_error"){
            check_file_img();
            check_book_name();
            check_author_name();
            check_book_des();
        } else if(error == "add_error"){
            check_file_img();
            check_book_name();
            check_author_name();
            check_book_des();
        }
        document.getElementById(error).innerHTML = "";
    }
    
    function post(){
        check_file_img();
        check_book_name();
        check_author_name();
        check_book_des();
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