<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal">
                <header><h1>Edit my personal information</h1></header>
                <section>
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'contact-form', 'method' => 'post');

                    echo form_open(base_url().'index.php/verify_change', $attributes);
                    ?>
                        <fieldset style="overflow:hidden; padding-top: .5cm">
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="email" placeholder="Email"/>
                                    <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('email'); ?></label>
                                </div>
                            </div>
                            <div class="control-group">
                                    <label class="control-label" for="currentPassword">Current Password</label>
                                    <div class="controls">
                                        <input type="password" class="input-xlarge" id="currentPassword" placeholder="Password" name="pw"/>
                                        <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('pw'); ?></label>
                                    </div>
                                </div>
                            <div class="control-group">
                                    <label class="control-label" for="currentPassword">New Password</label>
                                    <div class="controls">
                                        <input type="password" class="input-xlarge" id="newPassword" placeholder="Password" name="npw"/>
                                        <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('npw'); ?></label>
                                    </div>
                                </div>
                            <div class="control-group">
                                    <label class="control-label" for="currentPassword">New Password Confirm</label>
                                    <div class="controls">
                                        <input type="password" class="input-xlarge" id="newPassword" placeholder="Password" name="c_npw"/>
                                        <label style="color: red; font-weight: bold; margin-bottom: .5cm"><?php echo form_error('c_npw'); ?></label>
                                    </div>
                                </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                        <button class="button_style" style="float:left; clear:none; margin: 2px 0 0 2px; width: 200px;">Save</button>
                                    
                                   </div>
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