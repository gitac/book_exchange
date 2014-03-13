<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal">
                <header><h1><b>Login</b></h1></header>
                <section>
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'contact-form', 'method' => 'post');

                    echo form_open(base_url().'index.php/verify_login', $attributes);
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
                                <label class="control-label" for="inputPassword"><b>Password</b></label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge" id="inputPassword" placeholder="Password" name="pw"/>
                                    <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('pw'); ?></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="checkbox">
                                        <input name="rememberme" type="checkbox"/>Remember me
                                    </label>
                                    <button class="button_style" style="width: 200px; margin-top: .5cm; margin-bottom: .2cm">Login</button>
                                    <a href="lost_password" style="margin-left: 30px">Forgot your password?</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <p style="text-align: center"><br/>In order to login you must be <a href="register">register</a>ed</p>
                </section>
            </div>
        </div>
        <!-- End Main -->

    </body>
</html>