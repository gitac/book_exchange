<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script>
            function btn_enable(){
                if($("#agree").is(':checked')){
                    document.getElementById("reg_btn").disabled= false;
                } else {
                    document.getElementById("reg_btn").disabled= true;
                }
            }
        </script>
    </head>
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal">
                <header><h1>Registration</h1></header>
                <section>
                    
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'contact-form', 'method' => 'post');

                    echo form_open(base_url() . 'index.php/registration_confirm', $attributes);
                    ?>
                    <fieldset style="padding-top: .5cm">
                        <div class="control-group">
                            <label class="control-label" for="inputUsername"><b>Username</b></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" id="inputUsername" placeholder="Username" name="un"/>
                                <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('un'); ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail"><b>Email</b></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" id="inputEmail" placeholder="Email" name="email"/>
                                <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('email'); ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword"><b>Password</b></label>
                            <div class="controls">
                                <input type="password" class="input-xlarge" id="inputPassword" placeholder="Password" name="pw"/>
                                <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('pw'); ?></label>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPasswordConf"><b>Confirm Password</b></label>
                            <div class="controls">
                                <input type="password" class="input-xlarge" id="inputPasswordConf" placeholder="Password" name="cpw"/>
                                <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('cpw'); ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label class="checkbox">
                                    <input id="agree" name="agree" type="checkbox" onclick="btn_enable()"/>I agree to the <a href="#">Terms and Conditions</a> of BookExchange
                                </label>
                                <button id="reg_btn" class="button_style" style="width: 200px; margin-top: .5cm; margin-bottom: .2cm" disabled >Registration</button>
                            </div>
                        </div>
                    </fieldset>
                    </form>
                    <p style="text-align: center; margin-top: .5cm">In order to <a href="login">login</a> you must be registered</p>
                </section>
            </div>
        </div>
        <!-- End Main -->

    </body>
</html>