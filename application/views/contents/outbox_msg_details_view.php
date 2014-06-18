<?php
$outbox_count = 0;

if ($outbox_msg_details != NULL) {
    foreach ($outbox_msg_details as $r) {
        $outbox_msg_ids[] = $r['msg_id'];
        $outbox_msg_times[] = $r['msg_time'];
        $outbox_msg[] = $r['msg_details'];
        $receiver_ids[] = $r['receiver_id'];
        $outbox_customer_first_names[] = $r['customer_first_name'];
        $outbox_customer_last_names[] = $r['customer_last_name'];
        $outbox_customer_photos[] = $r['customer_photo'];
        $outbox_count++;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
    </head>
    <body>
        <!-- Main -->
        <form action="<?php echo base_url() ?>index.php/my_messages/outbox_msg/<?php echo $receiver_ids[0] ?>" method="post">
        <div id="main" class="shell">
            <div id="my_profile" style="width: 100%">
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav">
                            <li><a href="my_profile">Active Ads</a></li>
                            <li><a href="pending_ads">Pending Ads</a></li>
                            <li><a href="removed_ads">Removed Ads</a></li>
                            <!--<li><a href="requested_ads">Requested Ads</a></li>-->
                            <li><a href="my_wishlist">My wishlist</a></li>
                            <li class="active" ><a href="my_messages">My Messages</a></li>
                            <li><a href="settings">Settings</a></li>
                        </ul>
                    </div>
                </div>



                <table style="width: 100%">
                    <tr style="width: 100%">

                        <td>
                            <div id="div_outbox">
                                <div id="modal" style="width: 100% !important" >
                                    <header><h1>Outbox</h1></header>
                                    <div>


                                        <?php
                                        for ($i = 0; $i < $outbox_count; $i++) {
                                            ?>

                                            <table style="height: 100px">
                                                <tr style="height: 100%">
                                                    <td>
                                                        <img style="width: 100px; height: 100px" src="<?php echo base_url() ?><?php echo $outbox_customer_photos[$i] ?>" alt="" />
                                                    </td>
                                                    <td style="height: 100%; width: 70%">
                                                        <table style="width: 100%;">
                                                            <tr style="width: 100%; height: 25%;">
                                                                <h2><?php echo $outbox_customer_first_names[$i] . " " . $outbox_customer_last_names[$i] ?></h2>

                                                            </tr>
                                                            <tr style="width: 100%; height: 75%; margin-left: .1cm; margin-top: 25%; position: absolute">
                                                                <p><?php echo $outbox_msg[$i] ?></p>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <hr></hr>


                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br></br>
                                    <form action="<?php echo base_url() ?>index.php/my_messages/outbox_msg/<?php echo $receiver_ids[0]?>" method="post">
                            <textarea id="msg_detail" class="xxlarge" rows="6" style="width: 95% !important ;margin-left: .2cm; padding-bottom: .3cm" name="msg"></textarea>
                          
                            <button class="button_style" type="submit" id="btn_msg" style="width: 20%; margin-left: 40%; margin-top: .5cm"  >Send</button>
                            
                                </form>
                                       
                                </div>

                            </div>


                        </td>

                    </tr>
                </table>
            </div>
        </div>
        <!-- End Main -->
</form>
    </body>
</html>