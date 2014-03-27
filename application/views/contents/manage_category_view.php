
<?php
if (isset($_POST['add'])) {
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <style>
        </style>


    </head>
    <body>
        <!-- Main -->
        <div id="main" class="shell" style="height: 600px !important">
            <div id="modal" style="width: 90% !important">
                <div class="navbar">
                    <div class="">
                        <ul class="nav">

                            <li><a href="<?php echo base_url() ?>index.php/admin_home">Approve Ads</a></li>
                            <li  class="active"><a href="<?php echo base_url() ?>index.php/manage_category">Manage Category</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/ban_user">Ban User</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div id="modal">

                <header><h1>Add/Delete Category</h1></header>
                <section>
                    <form action="<?php echo base_url() ?>index.php/manage_category" id="contact-form" class="form-horizontal" method="post">
                        <fieldset style="padding-top: .5cm">

                            <div class="control-group">
                                <label class="control-label" for="inputCategory"><b>Category </b></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputCategory" placeholder="" name="cn"/>
                                    <!-- <input type="submit" name="sbm" value="add" ></input>                               
                                     <input type="submit" name="sbm" value="delete"></input>   -->
                                </div>
                            </div>



                            <div class="control-group">
                                <div class="controls">
                                    <button name="sbm" type="submit" value="add" class="button_style" style=" width: 200px; margin-top: .5cm; margin-bottom: .2cm">Add</button>
                                    <button name="sbm" type="submit" value="delete" class="button_style" style="width: 200px; margin-top: .5cm; margin-bottom: .2cm">Delete</button>
                                  <!--  <input type="submit" value="Login" style="width: 200px"/> -->
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </section>
            </div>
            <!-- End Sidebar -->

            <!-- End Main -->
        </div>
    </body>
</html>