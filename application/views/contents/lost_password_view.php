<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<body>
	<!-- Main -->
	<div id="main" class="shell">
            <div id="modal" style="width: 95% !important">
                <header><h1><b>Privacy Settings</b></h1></header>
                    <section>
                        <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'contact-form', 'method' => 'post');

                    echo form_open(base_url().'index.php/verify_lost_pw', $attributes);
                    ?>
                            <fieldset style="padding-top: .5cm">
                                <div class="control-group">
                                    <p style="text-align: center; margin-bottom: .5cm">Please enter the email address you used to register on <b><a href="home">BookExchange</a></b>.</p>
                                    <label class="control-label" for="email" style="margin-left: 120px"><b>Email address</b></label>
                                    <div class="controls">
                                        <input type="text" style="margin-left: 10px" class="input-xlarge" placeholder="Email" name="email"/>
                                        <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('email'); ?></label>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button class="button_style" style="width: 200px; margin-left: 100px; margin-top: .2cm; margin-bottom: .2cm">Send Password</button>
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