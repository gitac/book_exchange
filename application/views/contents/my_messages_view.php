<?php
$inbox_count = 0;
$outbox_count = 0;
if ($inbox != NULL) {
    foreach ($inbox as $r) {
        $msg_ids[] = $r['msg_id'];
        $msg_times[] = $r['msg_time'];
        $msg_details[] = word_limiter($r['msg_details'], 5);
        $sender_ids[] = $r['sender_id'];
        $customer_first_names[] = $r['customer_first_name'];
        $customer_last_names[] = $r['customer_last_name'];
        $customer_photos[] = $r['customer_photo'];
        $inbox_count++;
    }
}

if ($outbox != NULL) {
    foreach ($outbox as $r) {
        $outbox_msg_ids[] = $r['msg_id'];
        $outbox_msg_times[] = $r['msg_time'];
        $outbox_msg_details[] = word_limiter($r['msg_details'], 5);
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
        <script>
            function radioFunction(name)
            {
                if(name == "inbox"){
                    document.getElementById('div_inbox').style.display = "block";
                    document.getElementById('div_outbox').style.display = "none";
                    document.getElementById('outbox').checked = false;
                }else if(name == "outbox"){
                    document.getElementById('div_outbox').style.display = "block";
                    document.getElementById('div_inbox').style.display = "none";
                    document.getElementById('inbox').checked = false;
                }
            }
        </script>
    </head>
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
                            <li class="active" ><a href="my_messages">My Messages</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/settings">Settings</a></li>
                        </ul>
                    </div>
                </div>

                <div style="margin-left: 40%; padding-bottom: .5cm">
                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="msg" value="inbox" id="inbox" onclick="radioFunction('inbox')" checked/>
                    <label for="inbox" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Inbox</label>
                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="msg" value="outbox" id="outbox" onclick="radioFunction('outbox')"/>
                    <label for="outbox" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Outbox</label>
                </div>

                <table style="width: 100%">
                    <tr style="width: 100%">
                        <td>
                            <div id="div_inbox">
                                <div id="modal" style="width: 100% !important" >
                                    <header><h1>Inbox</h1></header>
                                    <div>
                                        <?php
                                        if ($inbox_count == 0) {
                                            ?>
                                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                                <tr>
                                                    <td style="width: 100%"><p style="text-align: center; font-size: 20px">You have no new messages</p></td>
                                                </tr>
                                            </table>
                                            <hr></hr>
                                        <?php } else {
                                            ?>
                                            <?php
                                            for ($i = 0; $i < $inbox_count; $i++) {
                                                ?>
                                                <a href="<?php echo base_url() ?>index.php/my_messages/inbox_msg_ddetails/<?php echo $sender_ids[$i] ?>"> 
                                                    <table style="height: 100px">
                                                        <tr style="height: 100%">
                                                            <td style="width: 30%">
                                                                <img style="width: 100px; height: 100px" src="<?php echo base_url() ?><?php echo $customer_photos[$i] ?>" alt="" />
                                                            </td>
                                                            <td style="height: 100%">
                                                                <h2 style="height: 25%"><?php echo $customer_first_names[$i] . " " . $customer_last_names[$i] ?></h2><br/>
                                                                <p><?php echo $msg_details[$i] ?></p>
                                                            </td>
                                                        </tr>
                                                    </table></a>
                                                <hr></hr>


                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </td>





                        <td>
                            <div id="div_outbox" style="display: none">
                                <div id="modal" style="width: 100% !important" >
                                    <header><h1>Outbox</h1></header>
<!--                                    <p><br/> No  messages</p><br/>-->


                                    <div>
                                        <?php
                                        if ($outbox_count == 0) {
                                            ?>
                                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                                <tr>
                                                    <td style="width: 100%"><p style="text-align: center; font-size: 20px">No  messages</p></td>
                                                </tr>
                                            </table>
                                            <hr></hr>
                                        <?php } else {
                                            ?>

                                            <?php
                                            for ($i = 0; $i < $outbox_count; $i++) {
                                                ?>
                                                <a href="<?php echo base_url() ?>index.php/my_messages/outbox_msg_ddetails/<?php echo $receiver_ids[$i] ?>"> 
                                                    <table style="height: 100px">
                                                        <tr style="height: 100%">
                                                            <td style="width: 30%">
                                                                <img style="width: 100px; height: 100px" src="<?php echo base_url() ?><?php echo $outbox_customer_photos[$i] ?>" alt="" />
                                                            </td>
                                                            <td style="height: 100%">
                                                                <h2 style="height: 25%"><?php echo $outbox_customer_first_names[$i] . " " . $outbox_customer_last_names[$i] ?></h2><br/>
                                                                <p><?php echo $outbox_msg_details[$i] ?></p>
                                                            </td>
                                                        </tr>
                                                    </table></a>
                                                <hr></hr>

                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                            </div>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- End Main -->

    </body>
</html>