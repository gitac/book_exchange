<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>Book Exchange</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"/>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style_temp.css" type="text/css" media="all" />
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.jcarousel.min.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="js/png-fix.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/functions.js"></script>
        <script src="<?php echo base_url() ?>assets/js/script.js"></script>
             <!-- bootstrap-->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/my_css.css"  media/>
           
            <!-- bootstrap-->
</head>
    <body>
        <!-- Header -->
        <div id="header" class="shell">
            <div id="logo"><h1><a href="<?php echo base_url() ?>index.php/home">Book Exchange</a></h1><span>Give books away. Get books you want.</span></div>
		<!-- Navigation -->
		<div id="navigation">
			<ul>
				<li>
                                                            <?php if ($page == "home") { ?><a href="<?php echo base_url() ?>index.php/home" class="active">Home</a>
                                                            <?php } else { ?> <a href="<?php echo base_url() ?>index.php/home">Home</a> <?php } ?>
                                                    </li>
				<li><a href="#">All ads</a></li>
				<li><a href="#">About Us</a></li>
				<li>
                                                            <?php if ($page == "contact") { ?><a href="<?php echo base_url() ?>index.php/contact" class="active">Contacts</a>
                                                            <?php } else { ?> <a href="<?php echo base_url() ?>index.php/contact">Contacts</a> <?php } ?>
                                    </li>
                                                   <li><a href="#">FAQ</a></li>
			</ul>
		</div>
		<!-- End Navigation -->
		<div class="cl">&nbsp;</div>
		<!-- Login-details -->
		<div id="login-details">
			<p>
                                                <?php if($option == "my_profile") { ?>
                                                Welcome <a href="<?php echo base_url() ?>index.php/my_profile" id="login">My Profile</a> </p> <p><a href="#" id="reg">Log out</a> </p>
                                                <?php } else {?>
                                                <a href="<?php echo base_url() ?>index.php/login" id="login">Log in</a> </p> <p><a href="<?php echo base_url() ?>index.php/register" id="reg">Registration</a> </p>
                                                <?php } ?>
		</div>
                          <div></div>
		<!-- End Login-details -->
	</div>

        <div id="header" class="ad">
            <div id="search" style="padding: 0; height: 25%">
                <table border="1" bgcolor="#dddddd">
                    <tr>
                        <td><input type="text" placeholder="search"></input></td>
                    <td><select style="width: 150px !important; height: 100% !important">
                            <option>--All category--</option>
                            <option>-----</option>
                        </select></td>
                        <td><select style="width: 150px !important">
                            <option>--All Authors--</option>
                            <option>----</option>
                        </select></td>
                        <td><select style="width: 170px !important">
                            <option>--All of Bangladesh--</option>
                            <option>----</option>
                        </select></td>
                        <td><select style="width: 130px !important">
                            <option>--All Campus--</option>
                            <option>----</option>
                        </select></td>
                        
                        <td><input type="button" value="" id="searchButton" /></td>
                    </tr>
                </table>
            </div>
         <!--   <div id="post-ad" style="padding: 0; height: 75%; margin-top: 10px">
                <h1 style="text-align: center; margin-bottom: .5cm;">Do you have any book to exchange ?</h1>
                       <h2 style="text-align: center; margin-bottom: .75cm;">Post your ad FOR FREE on BookExchange</h2>
                       <a href="post_free_ad" class="add-free-ad" style="margin-left: 350px">Post a free Ad</a>
                        </div>
                        -->
	</div>
	<!-- End Header -->
        
    </body>
</html>