<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<body>
	<!-- Main -->
	<div id="main" class="shell">
            <div id="modal">
                <header><h1><b>Login</b></h1></header>
                    <section>
                        <form action="<?php echo base_url() ?>index.php/admin_login/validate_credentials" id="contact-form" class="form-horizontal" method="post">
                            <fieldset style="padding-top: .5cm">

                                <div class="control-group">
                                    <label class="control-label" for="inputUsername"><b>Username</b></label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" id="inputUsername" placeholder="Username" name="un">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword"><b>Password</b></label>
                                    <div class="controls">
                                        <input type="password" class="input-xlarge" id="inputPassword" placeholder="Password" name="pw">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        
                                        <button class="button_style" style="width: 200px; margin-top: .5cm; margin-bottom: .2cm">Login</button>
                                        
                                      <!--  <input type="submit" value="Login"/> -->
                                      <!--  <input type="submit" value="Login" style="width: 200px"/> -->
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