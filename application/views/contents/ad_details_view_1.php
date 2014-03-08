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
        $book_ad_giver_ins_id = $r['ad_giver_ins_id'];
        $book_ad_giver_office_id = $r['ad_giver_office_id'];
        $book_ad_giver_names[] = $r['ad_giver_name'];
        $book_ad_giver_emails[] = $r['ad_giver_email'];
        $book_ad_giver_phn_nos[] = $r['ad_giver_phn_no'];
        $book_ad_giver_addresses[] = $r['ad_giver_address'];
        $book_count++;
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <!--<p><a href="<?php echo $agent;?>" style="font-size: 16px !important; float:left; clear:none; display:block; padding: 8px 1em 0 0;">< Back</a>
                <a href="#" style="font-size: 16px !important; float:left; clear:none; display:block; padding: 8px 1em 0 85%;">Next ></a></p> -->
            <table style="width: 100%; height: 800px">
                <tr>
                    <td style="width: 65%; height: 100%">            <div id="modal" style="margin-left: 0 !important; height: 100% !important">
                            <table style="width: 100%; height: 100%">
                                <tr><td colspan="2"><p style="font-size: 24px; font-weight: bold; color: #0252BC; padding-top: .5cm; padding-left: .5cm; padding-bottom: .5cm"><?php echo $book_names[0]?></p>
                                        <p style="padding-bottom: .5cm"><span style="font-size: 20px; font-weight: bold; font-style: italic; color: #0252BC; padding-left: .5cm;"><?php
                                            $con = mysqli_connect("localhost", "root", "", "book_exchange");
// Check connection
                                            if (mysqli_connect_errno()) {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }

                                            $result = mysqli_query($con, "SELECT * FROM post, book_info, author_book, author 
    WHERE post_book_id = book_id
    AND book_id = b_id
    AND a_id = author_id
    AND post_id = " . $book_ids[0]);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo $row['author_name'];
                                                echo "<br> &nbsp; &nbsp;";
                                            }

                                            mysqli_close($con);
                                            ?></span><span style="font-size: 16px;"><?php echo $book_edition[0]; 
                                            if($book_edition[0] == 1)
                                                echo "st";
                                            else if($book_edition[0] == 2)
                                                echo "nd";
                                            else if($book_edition[0] == 3)
                                                echo "rd";
                                            else {
                                                echo 'th';
                                            }
                                                ?> edition</span></p></td></tr>
                                <tr>
                                    <td style="width: 60%; text-align: center">
                                        <div id="modal" style="width: 100%; margin-left: .5cm; height: 300px; padding-top: 5%"><img style="width: 200px; height: 280px" src="<?php echo base_url() ?><?php echo $book_images[0]?>" alt="" /></div>
                                    </td>
                                    <td style="width: 30%; text-align: center; padding-left: 5%; padding-right: 2%">
                                        <div id="modal" style="width: 100%; padding-bottom: .5cm"><p style="font-size: 20px; font-weight: bold; padding-top: .5cm;">৳ <?php echo $book_prices[0]?> </p>Price</div>
                                        <div id="modal" style="width: 100%; padding-bottom: .5cm"><p style="font-size: 16px; font-weight: bold; padding-top: .5cm;"><?php echo $book_post_time[0]?></p>Time posted</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p style="font-size: 20px; font-weight: bold; padding-left: .5cm; padding-bottom: .5cm">Ad details</p>
                                        <hr></hr>
                                        <p style="font-size: 14px; padding: .5cm .5cm .5cm .5cm"><?php echo $book_des[0]?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: .5cm; padding-bottom: .5cm"> <button class="button_style" style="margin-left: 1%; margin-bottom: .2cm">Add to my wishlist</button></td>
                                    <td style="padding-left: .0cm; padding-bottom: .5cm"> <button class="button_style" style="margin-bottom: .2cm">Ad for this book</button></td>
                                </tr>
                            </table>
                        </div></td>
                    <td style="width: 35; height: 100%"><div id="modal" style="width: 100% !important; height: 100% !important">
                            <p style="font-size: 20px; padding: .5cm .5cm .5cm .5cm;"><?php echo $book_ad_giver_names[0]?></p>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_ad_giver_addresses[0]?>, <?php echo $book_near_area[0]?>,</p>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm"><?php echo $book_div[0]?>, <?php echo $book_dis[0]?></p>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .1cm">
                                <?php 
                                if($book_ad_giver_ins_id[0] != NULL){
                                    $con = mysqli_connect("localhost", "root", "", "book_exchange");
// Check connection
                                            if (mysqli_connect_errno()) {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }

                                            $result = mysqli_query($con, "SELECT * FROM ad_giver, institute 
    WHERE ad_giver_ins_id = institute_id
    AND ad_giver_ins_id = " . $book_ad_giver_ins_id[0]);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo $row['institute_name'];
                                                break;
                                                
                                            }

                                            mysqli_close($con);
                                } else if($book_ad_giver_office_id[0] != NULL){
                                    $con = mysqli_connect("localhost", "root", "", "book_exchange");
// Check connection
                                            if (mysqli_connect_errno()) {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }

                                            $result = mysqli_query($con, "SELECT * FROM ad_giver, office
    WHERE ad_giver_office_id = office_id
    AND ad_giver_office_id = " . $book_ad_giver_office_id[0]);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo $row['office_name'];
                                                break;
                                                
                                            }

                                            mysqli_close($con);
                                }
                                    ?></p>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-bottom: .2cm; font-weight: bold"><?php echo $book_ad_giver_emails[0]?></p>
                            <p style="font-size: 14px; font-weight: bold; padding-left: .5cm; padding-right: .5cm; padding-bottom: .3cm"><?php echo $book_ad_giver_phn_nos[0];?></p>
                            <p style="font-size: 20px; font-weight: bold; padding-left: .5cm; padding-right: .5cm; padding-bottom: .3cm">Send an Email</p>
                            <hr></hr>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm; padding-top: .5cm">Message</p>
                            <textarea class="xxlarge" rows="3" style="width: 82% !important ;margin-left: .5cm; padding-bottom: .3cm"></textarea>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm;">Name</p>
                            <input type="text" class="input-xlarge" style="width: 82% !important ;margin-left: .5cm; padding-bottom: .3cm"/>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm;">Email</p>
                            <input type="text" class="input-xlarge" style="width: 82% !important ;margin-left: .5cm; padding-bottom: .3cm"/>
                            <p style="font-size: 14px; padding-left: .5cm; padding-right: .5cm;">Mobile no (optional)</p>
                            <input type="text" class="input-xlarge" style="width: 82% !important ;margin-left: .5cm; padding-bottom: .5cm"/>
                            <button class="button_style" style="width: 80%; margin-left: 10%;">Send</button>
                        </div></td>
                </tr>
            </table>         
        </div>
        <!-- End Main -->	
    </body>
</html>