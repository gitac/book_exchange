<?php
$book_count = 0;
if ($book_info != NULL) {
    foreach ($book_info as $r) {
        $book_ids[] = $r['post_id'];
        $book_names[] = $r['book_name'];
        $book_edition[] = $r['post_book_edition'];
        $book_prices[] = $r['post_book_price'];
        $book_images[] = $r['post_image'];
        $book_des[] = $r['post_description'];
        $book_div[] = $r['division_name'];
        $book_dis[] = $r['district_name'];
        $book_author_names[] = $r['author_name'];
        $book_near_area[] = $r['near_area_name'];
        $book_post_time[] = $r['date_time'];
        $book_customer_ids[] = $r['customer_id'];
        $book_customer_ins_names[] = $r['institute_name'];
        $book_customer_first_names[] = $r['customer_first_name'];
        $book_customer_last_names[] = $r['customer_last_name'];
        $book_customer_emails[] = $r['customer_email'];
        $book_customer_phn_nos[] = $r['customer_phn_no'];
        $book_customer_addresses[] = $r['customer_address'];
        $book_count++;
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>

        <script>
    
            function msg_send(){
                var msg = document.getElementById('msg_detail').value;
                if(msg == null || msg == '' || msg == "Please write your message here."){
                    document.getElementById("msg_detail").innerHTML="Please write your message here.";
                }else {
                    var c_id = <?php echo(json_encode($book_customer_ids[0])); ?>;
                    window.location.href = "<?php echo base_url() ?>index.php/my_messages/msg/"+c_id+"/"+msg;
                }
                
            }
            function request(post_id){
                window.location.href = "<?php echo base_url() ?>index.php/ad_details/request/"+post_id;
            }
            function remove_request(post_id){
                
                window.location.href = "<?php echo base_url() ?>index.php/ad_details/remove_request/"+post_id;
            }
            function at_first(){
                var c_id = <?php echo(json_encode($book_customer_ids[0])); ?>;
                var u_id = <?php echo(json_encode($id)); ?>;
                if(u_id == c_id){
                    document.getElementById("btn_request").disabled = true; 
                    document.getElementById("btn_remove_request").disabled = true; 
                    document.getElementById("btn_wishlist").disabled = true; 
                    document.getElementById("btn_msg").disabled = true; 
                }else if(u_id == null){
                    document.getElementById("btn_remove_request").style.display="none";
                }
                var req = <?php echo(json_encode($request)); ?>;
                if(req != null){
                    document.getElementById("btn_request").style.display="none";
                } else {
                    document.getElementById("btn_remove_request").style.display="none";
                }
            }
            
        </script>
    </head> 
    <body onload="at_first()">
        <!-- Main -->
        <div id="main" class="shell">
            <table style="width: 100%; height: 900px">
                <tr style="height: 100%">
                    <td style="width: 65%; height: 100%">            <div id="modal" style="margin-left: 0 !important; height: 100% !important">
                            <table style="width: 100%; height: 100%">
                                <tr style="width: 100%"><td><p style="font-size: 24px; font-weight: bold; color: #0252BC; padding-top: .5cm; padding-left: .5cm; padding-bottom: .5cm"><?php echo $book_names[0] ?></p>
                                        <p style="padding-bottom: .5cm"><span style="font-size: 20px; font-weight: bold; font-style: italic; color: #0252BC; padding-left: .5cm;">
                                                <?php
                                                $book = $book_ids[0];
                                                $i = 0;
                                                while ($i < $book_count && $book == $book_ids[$i]) {
                                                    echo $book_author_names[$i] . '<br> &nbsp; &nbsp;';
                                                    $i++;
                                                }
                                                ?>
                                            </span><?php if ($book_edition[0] != 0 && $book_edition[0] != NULL) { ?>
                                                <span style="font-size: 16px;"><?php
                                                    echo $book_edition[0];
                                                    if ($book_edition[0] == 1)
                                                        echo "st";
                                                    else if ($book_edition[0] == 2)
                                                        echo "nd";
                                                    else if ($book_edition[0] == 3)
                                                        echo "rd";
                                                    else {
                                                        echo 'th';
                                                    }
                                                    ?> edition</span><?php } ?></p></td>
                                </tr>
                                <tr>
                                    <td style="width: 60%; text-align: center">
                                        <div id="modal" style="width: 100%; margin-left: .5cm; height: 300px; padding-top: 5%"><img style="width: 200px; height: 280px" src="<?php echo base_url() ?><?php echo $book_images[0] ?>" alt="" /></div>
                                    </td>
                                    <td style="width: 30%; text-align: center; padding-left: 5%; padding-right: 2%">
                                        <div id="modal" style="width: 100%; padding-bottom: .5cm"><p style="font-size: 20px; font-weight: bold; padding-top: .5cm;">
                                                <?php
                                                if ($num_request == NULL || $num_request == 0) {
                                                    echo 'No';
                                                } else {
                                                    ?><?php
                                                echo $num_request;
                                            }
                                                ?> </p>Request</div>
                                        <div id="modal" style="width: 100%; padding-bottom: .5cm"><p style="font-size: 20px; font-weight: bold; padding-top: .5cm;">
                                                <?php
                                                if ($book_prices[0] == NULL) {
                                                    echo 'No';
                                                } else {
                                                    ?>
                                                    ৳ <?php
                                                    echo $book_prices[0];
                                                }
                                                ?> </p>Price</div>
                                        <div id="modal" style="width: 100%; padding-bottom: .5cm"><p style="font-size: 16px; font-weight: bold; padding-top: .5cm;"><?php echo $book_post_time[0] ?></p>Time posted</div>
                                    </td>
                                </tr>
                                <tr style="height: 40%">
                                    <td colspan="2">
                                        <p style="font-size: 20px; font-weight: bold;padding-left: .5cm; padding-bottom: .5cm; height: 10%">Ad details</p>
                                        <hr></hr>
                                        <p style="font-size: 14px; padding: .5cm .5cm .5cm .5cm; height: 90%"><?php echo $book_des[0] ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div></td>
                    <td style="width: 35%; height: 80%"><div id="modal" style="width: 100% !important; height: 55% !important">
                            <div>
                                <a href="<?php echo base_url() ?>index.php/user_profile/user/<?php echo $book_customer_ids[0] ?>"><p style="font-size: 20px; padding: .5cm .5cm .5cm .5cm;"><?php echo $book_customer_first_names[0] ?> <?php echo $book_customer_last_names[0] ?></p></a>
                                <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_customer_addresses[0] ?>,</p>
                                <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_near_area[0] ?>,</p>
                                <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_dis[0] ?>, <?php echo $book_div[0] ?></p>
                                <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_customer_ins_names[0] ?></p>
                                <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .2cm; font-weight: bold"><?php echo $book_customer_emails[0] ?></p>
                                <p style="font-size: 14px; font-weight: bold; padding-left: .5cm; padding-right: .5cm; padding-bottom: .3cm"><?php echo $book_customer_phn_nos[0]; ?></p>
                            </div>
                            <!--<p style="font-size: 20px; font-weight: bold; padding-left: .5cm; padding-right: .5cm; padding-bottom: .3cm">Send an Email</p>-->
                            
<!--                            <form action="<?php echo base_url() ?>index.php/my_messages/msg/<?php echo $book_customer_ids[0]?>" method="post">
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-top: .5cm;"><b>Message</b></p>
                            <textarea id="msg_detail" class="xxlarge" rows="8" style="width: 82% !important ;margin-left: .5cm; padding-bottom: .3cm" name="msg"></textarea>
                            <label style="margin-left: .5cm;"><?php echo $msg;?></label>
                            <input type="hidden" name="book" value="<?php echo $book_ids[0]?>"></input>
                            <button class="button_style" type="button" onclick="msg_send(<?php echo $book_customer_ids[0] ?>)"id="btn_msg" style="width: 80%; margin-left: 10%; margin-top: .5cm" >Send</button>
                            </form>-->
                        </div>
                        <div id="modal" style="width: 100% !important; height: 42% !important">
                            <button id="btn_wishlist"class="button_style" style="width: 250px; margin-top: 1cm; margin-left: .3cm">Add to wishlist</button>
                            <button id="btn_request_exchange"class="button_style" style="width: 250px; margin-top: 1cm; margin-left: .3cm">Request for Exchange</button>
                            <button id="btn_request" class="button_style" style="width: 250px; margin-top: 1cm; margin-left: .3cm" onclick="request(<?php echo $book_ids[0] ?>)">Request for this book</button>
                            <button id="btn_remove_request" class="button_style" style="width: 250px; margin-top: 1cm; margin-left: .3cm" onclick="remove_request(<?php echo $book_ids[0] ?>)">Remove Request</button>
                            <button id="btn_ad" class="button_style" style="width: 250px; margin-top: 1cm; margin-left: .3cm">Ad for this book</button>
                        </div>
                    </td>
                </tr>
            </table>         
        </div>
        <!-- End Main -->	
    </body>
</html>
