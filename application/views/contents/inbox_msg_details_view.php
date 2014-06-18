<?php
$inbox_count = 0;

if ($inbox_msg_details != NULL) {
    foreach ($inbox_msg_details as $r) {
        $msg_ids[] = $r['msg_id'];
        $msg_times[] = $r['msg_time'];
        $msg_details[] = $r['msg_details'];
        $sender_ids[] = $r['sender_id'];
        $customer_first_names[] = $r['customer_first_name'];
        $customer_last_names[] = $r['customer_last_name'];
        $customer_photos[] = $r['customer_photo'];
        $inbox_count++;
    }
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
<!--        <script>
            function msg_send(){
                var msg = document.getElementById('msg_detail').value;
                    var r_id = <?php echo(json_encode($receiver_ids[0])); ?>;
                    window.location.href = "<?php echo base_url() ?>index.php/my_messages/outbox_msg/"+r_id+"/"+msg;
                
                
            }
        </script>-->
    </head>
    <body>
        <!-- Main -->
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
                                <header><h1>Inbox</h1></header>
                                <div>
                                    
                                    
                                    <?php
                                    for ($i = 0; $i < $inbox_count; $i++) {
                                        ?>
                                      
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
                                            </table>
                                            <hr></hr>

                                   
                                    <?php
                                } 
                                ?>
                                 </div>
                                <br></br>
                                <form action="<?php echo base_url() ?>index.php/my_messages/inbox_msg/<?php echo $sender_ids[0]?>" method="post">
                            <textarea id="msg_detail" class="xxlarge" rows="6" style="width: 95% !important ;margin-left: .2cm; padding-bottom: .3cm" name="msg"></textarea>
<!--                            <label style="margin-left: .5cm;"><?php echo $msg;?></label>-->
                            <input name="sender" type="hidden" value="<?php echo $sender_ids[0]?>"></input>
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

    </body>
</html>