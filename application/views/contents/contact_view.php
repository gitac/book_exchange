<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<body>
	<!-- Main -->
	<div id="main" class="shell">
            <div id="modal">
                    <header><h1>Contact us</h1></header>
                    <section>
                       <form action="<?php echo base_url() ?>index.php/contact/contact_us" class="form-horizontal" id="contact-form" method="post">
                            <fieldset style="padding-top: .5cm">
                                <label style="margin-left: 30%; padding-bottom: .5cm; color: red; font-weight: bold"><?php echo $contact_error; ?><br/></label>
                        
                                <div class="control-group" style="padding-top: .5cm">
                                    <label class="control-label" for="fullName"><b>Full name</b></label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" id="fullName" placeholder="Full Name" name="fn" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="email"><b>Your Email Address</b></label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" id="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="email"><b>Subject</b></label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" id="subject" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="msg"><b>Message</b></label>
                                    <div class="controls">
                                        <textarea name="msg" class="xxlarge" rows="3" style="width: 77%"></textarea>
                                    </div>
                                </div>
                               

                                <div class="control-group">
                                    <div class="controls">
                                        <button style="width: 200px" type="submit" class="button_style">Send</button>
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