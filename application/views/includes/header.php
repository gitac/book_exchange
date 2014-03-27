<?php
$c_count = 0;
$dis_count = 0;
$a_count = 0;
$i_count = 0;
$b_count = 0;
foreach ($district as $r) {
    $dis_ids[] = $r['district_id'];
    $dis_names[] = $r['district_name'];
    $dis_count++;
}

foreach ($author as $r) {
    $a_ids[] = $r['author_id'];
    $a_names[] = $r['author_name'];
    $a_count++;
}

foreach ($category as $r) {
    $c_ids[] = $r['category_id'];
    $c_names[] = $r['category_name'];
    $c_count++;
}
foreach ($institute as $r) {
    $i_ids[] = $r['institute_id'];
    $i_names[] = $r['institute_name'];
    $i_count++;
}
foreach ($book as $r) {
    $b_ids[] = $r['book_id'];
    $b_names[] = $r['book_name'];
    $b_count++;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title>Book Exchange</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style_temp.css" type="text/css" media="all" />
        
        <!--[if IE 6]>
                <script type="text/javascript" src="js/png-fix.js"></script>
        <![endif]-->
        
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
                    <?php if ($option == "my_profile") { ?>
                    Welcome <label style="font-weight: bold; color: #485174;"><?php echo $username;?></label>&nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/my_profile" id="login"><img style="width: 35px; height: 35px" src="<?php echo base_url() ?><?php echo $pro_pic;?>"  </a> <a href="<?php echo base_url() ?>index.php/log_out" id="reg"> Log out</a> </p>
                <?php } else { ?>
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
                        <td><input type="text" placeholder="Search" name="search" list="suggests_book"/>
                                    <datalist id="suggests_book">
                                        <?php for ($i = 0; $i < $b_count; $i++) { ?>
                                            <option value="<?php echo $b_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist></td>
                        <td><select style="width: 150px !important; height: 100% !important">
                                <option value="0">--All category--</option>
                                <?php for($i = 0; $i < $c_count; $i++){?>
                                <option value="<?php echo $c_ids[$i]; ?>"><?php echo $c_names[$i]?></option>
                                <?php }?>
                            </select></td>
                        <td><select style="width: 150px !important">
                                <option>--All Authors--</option>
                                <?php for($i = 0; $i < $a_count; $i++){?>
                                <option value="<?php echo $a_ids[$i]; ?>"><?php echo $a_names[$i]?></option>
                                <?php }?>
                            </select></td>
                        <td><select style="width: 130px !important">
                                <option>--All Campus--</option>
                                <?php for($i = 0; $i < $i_count; $i++){?>
                                <option value="<?php echo $i_ids[$i]; ?>"><?php echo $i_names[$i]?></option>
                                <?php }?>
                            </select></td>
                        <td><select style="width: 170px !important">
                                <option>--All of Bangladesh--</option>
                               <?php for($i = 0; $i < $dis_count; $i++){?>
                                <option value="<?php echo $dis_ids[$i]; ?>"><?php echo $dis_names[$i]?></option>
                                <?php }?>
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