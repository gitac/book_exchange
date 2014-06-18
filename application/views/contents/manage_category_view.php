<?php
$count = 0;
//$a_count = 0;
//$b_count = 0;



foreach ($category as $r) {
    $ids[] = $r['category_id'];
    $names[] = $r['category_name'];
    $count++;
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script>
        
       function radioFunction(name)
            {
                if(name == "add"){
                    document.getElementById('a').style.display  = "block";
                    document.getElementById('d').style.display = "none";
                    document.getElementById('delete').checked = false;

                }else if(name == "delete"){
                    document.getElementById('d').style.display  = "block";
                    document.getElementById('a').style.display = "none";
                    document.getElementById('add').checked = false;
                }
            }
            
       
        </script>


    </head>
    <body>
        <!-- Main -->
        <div id="main" class="shell" style="height: 650px !important">
            <div id="modal" style="width: 90% !important">
                <div class="navbar">
                    <div class="">
                        <ul class="nav">
                            <li><a href="<?php echo base_url() ?>index.php/admin_home">Approve Ads</a></li>
                            <li  class="active"><a href="<?php echo base_url() ?>index.php/manage_category">Manage Category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div id="modal" style="height: 300px !important">

                <header><h1>Add/Delete Category</h1></header>
            
                    <form action="<?php echo base_url() ?>index.php/manage_category/add_del" id="contact-form" class="form-horizontal" method="post">
                        <label style="padding-top: .2cm;margin-left: 15%; padding-bottom: .5cm; font-weight: bold"><?php echo $manage; ?><br/></label>
                        
                    <br></br>
                    <br></br>
                        <div class="control-group">
<!--                                <label class="control-label"><b>Gender</b></label>-->
                                <div class="controls">
                                    <div style="float:left; clear:none">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="category" value="add" id="add" onclick="radioFunction('add')" checked />
                                        <label for="male" style="float:left; clear:none; display: block; padding: 2px 1em 0 0;">Add category</label>
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="category" value="delete" id="delete" onclick="radioFunction('delete')" />
                                        <label for="female" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Delete category</label>
                                    </div>
                                </div>
                            </div>
                        

                        
                        
                       <div id="a">

                            <div class="control-group">
                                
<!--                                <label class="control-label" ><b>Category name</b></label>-->
                                <div class="controls">
                                    <input type="text" style=" left: 360px; top: 300px; position: absolute; height: 30px; width: 250px" class="input-xlarge" placeholder="Category name" name="Category_name"/>
                                    <button name="sbm" type="submit" value="add" class="button_style" style="position: absolute; left: 650px; top:280px; width: 100px; margin-top: .5cm; margin-bottom: .2cm">Ok</button>
                                </div>
                            </div>
                                                    
                         </div>                      
                                  
                         
                            
                  <div id="d" style="display: none">

                      <div class="control-group" style="padding-top: .5cm">
<!--                            <label class="control-label" ><b>Chosen category</b></label>-->
                            <div class="controls">
                                <div class="input">
                                    <select  style="position: absolute ;left: 360px;top: 300px;height: 30px; width: 270px; text-align: center !important" id="selected_category" name="selected_category">

                                        <?php for ($i = 0; $i < $count; $i++) {
                                            ?>
                                            <option value="<?php echo $ids[$i]; ?>"><?php echo $names[$i]; ?></option>
                                        <?php }
                                        ?>
                                        <!--                                            <option value="0">Others</option> -->
                                    </select>
                                    
                                    <button name="sbm" type="submit" value="delete" class="button_style" style="position: absolute; left: 650px; top:280px; width: 100px; margin-top: .5cm; margin-bottom: .2cm">Ok</button>
                                    
<!--                                        <input id="c_name" style="display: none" type="text" class="input-xlarge" placeholder="Category name" name="category_name"/>-->
                                </div>
                            </div>
                        </div>
                                                    
                         </div>            


                                         <br>
                             <br>
                           
                      
                    </form>

               
            </div>
            <!-- End Sidebar -->

            <!-- End Main -->
        </div>
    </body>
</html>
