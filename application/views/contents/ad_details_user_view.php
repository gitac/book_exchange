<?php
$book_count = 0;
if ($book_info != NULL) {
    foreach ($book_info as $r) {
        $post_ids[] = $r['post_id'];
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
$req_count = 0;
if ($requested_user != NULL) {
    foreach ($requested_user as $r) {
        $customer_ids[] = $r['customer_id'];
        $customer_usernames[] = $r['customer_username'];
        $customer_emails[] = $r['customer_email'];
        $customer_addresses[] = $r['customer_address'];
        $customer_first_names[] = $r['customer_first_name'];
        $customer_last_names[] = $r['customer_last_name'];
        $customer_near_areas[] = $r['near_area_name'];
        $book_div[] = $r['division_name'];
        $book_dis[] = $r['district_name'];
        $book_near_area[] = $r['near_area_name'];
        $book_customer_ins_names[] = $r['institute_name'];
        $customer_phn_nos[] = $r['customer_phn_no'];
        $customer_photos[] = $r['customer_photo'];
        $req_count++;
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script>
            function request(){
                window.location.href = "<?php echo base_url() ?>index.php/ad_details/request/<?php echo $post_ids[0]; ?>";
            }
            function remove_request(){
                window.location.href = "<?php echo base_url() ?>index.php/ad_details/remove_request/<?php echo $post_ids[0]; ?>";
            }
            function at_first(){
                var c_id = <?php echo(json_encode($book_customer_ids[0])); ?>;
                var u_id = <?php echo(json_encode($id)); ?>;
                if(u_id == c_id){
                    document.getElementById("btn_request").disabled = true; 
                    document.getElementById("btn_remove_request").disabled = true; 
                    document.getElementById("btn_wishlist").disabled = true; 
                    document.getElementById("btn_msg").disabled = true; 
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
            <!--<p><a href="<?php echo $agent; ?>" style="font-size: 16px !important; float:left; clear:none; display:block; padding: 8px 1em 0 0;">< Back</a>
                <a href="#" style="font-size: 16px !important; float:left; clear:none; display:block; padding: 8px 1em 0 85%;">Next ></a></p> -->
            <div id="modal" style="margin-left: 0 !important; height: 100% !important; width: 100% !important">
                <table style="width: 100%;">

                    <tr>
                        <td><p style="font-size: 24px; font-weight: bold; color: #0252BC; padding-top: .5cm; padding-left: .5cm; padding-bottom: .5cm"><?php echo $book_names[0] ?></p>
                            <p style="padding-bottom: .5cm"><span style="font-size: 20px; font-weight: bold; font-style: italic; color: #0252BC; padding-left: .5cm;">
                                    <?php
                                    $book = $post_ids[0];
                                    $i = 0;
                                    while ($i < $book_count && $book == $post_ids[$i]) {
                                        echo $book_author_names[$i] . '<br> &nbsp; &nbsp;';
                                        $i++;
                                    }
                                    ?>
                                </span><span style="font-size: 16px;"><?php
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
                                    ?> edition</span></p></td>
                        <td style="width: 45%; text-align: center">
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
                    <?php
                    if ($req_count != 0) {
                        ?>
                        <tr>
                            <td colspan="3">
                                <p style="font-size: 20px; font-weight: bold;padding-left: .5cm; padding-bottom: .5cm; height: 10%">Requests</p>

                            </td>
                        </tr>
                        <?php for ($i = 0; $i < $req_count; $i++) {
                            ?>
                            <tr>
                                <td colspan="3">
                                    <hr></hr>
                                </td>
                            </tr>
                            <tr style="width: 100%; height: 300px">
                               
                                    <td style="width: 35%; height: 100%; text-align: center">

                                        <img style="width: 150px; height: 150px; margin-top: .2cm" src="<?php echo base_url() ?><?php echo $customer_photos[$i] ?>" alt="" />   
                                        <!--<button id="btn_msg" class="button_style" style="height: 40px !important; margin-left: 20%; margin-top: .2cm; margin-bottom: .2cm">Send Message</button>-->


                                    </td>
                                    <td style="width: 60%; height: 100%" colspan="2">
                                        <p style="font-size: 20px; padding: .5cm .5cm .5cm .5cm;"><a href="#"><?php echo $customer_first_names[$i] ?> <?php echo $customer_last_names[$i] ?></a></p>
                                        <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $customer_addresses[$i] ?>,</p>
                                        <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $customer_near_areas[$i] ?>,</p>
                                        <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_div[$i] ?>, <?php echo $book_dis[$i] ?></p>
                                        <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_customer_ins_names[$i] ?></p>
                                        <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .2cm; font-weight: bold"><?php echo $customer_emails[$i] ?></p>
                                        <p style="font-size: 14px; font-weight: bold; padding-left: .5cm; padding-right: .5cm; padding-bottom: .3cm"><?php echo $customer_phn_nos[$i]; ?></p>

                                    </td>
                              
        <!--                        <td style="width: 35%; height: 100%">
                                <div id="modal" style="width: 100% !important; height: 100% !important">
                                     <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-top: .5cm;"><b>Message</b></p>
                                <textarea class="xxlarge" rows="4" style="width: 82% !important ;margin-left: .5cm; padding-bottom: .3cm"></textarea>
                                
                                <button id="btn_msg" class="button_style" style="width: 80%; margin-left: 10%; margin-bottom: .2cm">Send</button>
                                
                                </div>
                                
                            </td>-->

                            </tr>


                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <!-- End Main -->	
    </body>
</html>
