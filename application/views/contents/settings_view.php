<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="my_profile" style="width: 100%">
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav">
                            <li><a href="<?php echo base_url() ?>index.php/my_profile">Active Ads</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/pending_ads">Pending Ads</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/removed_ads">Removed Ads</a></li>
                            <!--<li><a href="requested_ads">Requested Ads</a></li>-->
                            <li><a href="<?php echo base_url() ?>index.php/my_wishlist">My wishlist</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/my_messages">My Messages</a></li>
                            <li  class="active" ><a href="<?php echo base_url() ?>index.php/settings">Settings</a></li>
                        </ul>
                    </div>
                </div>
                <a href="edit_profile">Edit profile</a><br/>
                <a href="change_email_pw">Change password</a><br/>
                <br/>
                <hr></hr>
            </div>
        </div>
        <!-- End Main -->

    </body>
</html>