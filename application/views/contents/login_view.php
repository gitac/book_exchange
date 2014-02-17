<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<body>
	<!-- Main -->
	<div id="main" class="shell">
            <div id="modal">
                    <header><h1>Log in</h1></header>
                    <section>
                        <form action="my_profile" id="contact-form" class="form-horizontal" method="post">
                            <fieldset style="padding-top: .5cm">

                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" id="inputUsername" placeholder="Username" name="un">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="password" class="input-xlarge" id="inputPassword" placeholder="Password" name="pw">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox"/>Remember me
                                        </label>
                                      <!--  <input type="submit" value="Login"/> -->
                                        <input type="submit" value="Login" style="width: 200px"/>
                                    </div>
                                    </div>
                            </fieldset>
                        </form>
                        <p  class="text-center"><a href="#">Forget password</a>
                            </br>In order to login you must be <a href="register">register</a>ed</p>
                    </section>
                </div>
	</div>
	<!-- End Main -->
	
</body>
</html>