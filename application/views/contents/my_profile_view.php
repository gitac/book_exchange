<?php
$book_count = 0;
if ($post != NULL) {
    foreach ($post as $r) {
        $book_ids[] = $r['post_id'];
        $book_names[] = $r['book_name'];
        $book_prices[] = $r['post_book_price'];
        $book_images[] = $r['post_image'];
        $book_des[] = $r['post_description'];
        $book_authors[] = $r['author_name'];
        $book_author_ids[] = $r['author_id'];
        $book_post_time[] = $r['date_time'];
        $book_count++;
    }
}
$post_count = 0;
if ($post_request != NULL) {
    foreach ($post_request as $r) {
        $post_req_ids[] = $r['post_id'];
        $post_count++;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script>
            function remove_ad(post_id){
                window.location.href = "<?php echo base_url() ?>index.php/my_profile/remove_ad/"+post_id;
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
                            <li class="active" ><a href="my_profile">Active Ads</a></li>
                            <li><a href="pending_ads">Pending Ads</a></li>
                            <li><a href="removed_ads">Removed Ads</a></li>
                            <li><a href="requested_ads">Requested Ads</a></li>
                            <li><a href="my_wishlist">My wishlist</a></li>
                            <li><a href="my_messages">My Messages</a></li>
                            <li><a href="settings">Settings</a></li>
                        </ul>
                    </div>
                </div>
<!--                <p><br/>You currently have no active ad</p><br/>-->

                <div>
                    <?php
                    if ($book_count == 0) {
                        ?>
                        <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                            <tr>
                                <td style="width: 100%"><p style="text-align: center; font-size: 20px">You currently have no active ad</p></td>
                            </tr>
                        </table>
                        <hr></hr>
                    <?php }
                    ?>
                    <?php
                    for ($i = 0, $j = 0; $i < $book_count; $i++) {
                        $book = $book_ids[$i];
                        //if ($i == $book_count)
                        //  break;
                        ?>
                        
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                <tr>
                                    
                                    <td style="width: 15%"><a href="<?php echo base_url() ?>index.php/ad_details/user_post_details/<?php echo $book_ids[$i] ?>" target="_blank"><img style="width: 120px; height: 200px" src="<?php echo base_url() ?><?php echo $book_images[$i] ?>" alt="" /></a></td>
                                    <td style="width: 35%; text-align: center">
                                        <h2 style="font-size: 24px"><a href="<?php echo base_url() ?>index.php/category_books/bookname/<?php echo $book_ids[$i] ?>"><?php echo $book_names[$i] ?></a></h2>
                                        <h3 style="font-size: 16px !important;"><?php
                    while ($i < $book_count && $book == $book_ids[$i]) {
                            ?>
                                                <a href="<?php echo base_url() ?>index.php/category_books/authorname/<?php echo $book_author_ids[$i] ?>"><?php echo $book_authors[$i] ?></a><br/>
                                                <?php
                                                $i++;
                                            }
                                            $i--;
                                            ?></h3>
                                    <!--<p style="font-size: 16px"><a href="#">Dhaka - Buet</a></p> -->
                                    </td>
    <!--                                    <td style="width: 15%"><p style="font-size: 16px"><b>৳ <?php echo $book_prices[$i] ?><br/> price</b></p></td>-->
                                    <td style="width: 15%"><p style="font-size: 16px; text-align: center"><b><?php
                                        $count = 0;
                                        while ($j < $post_count && $book_ids[$i] == $post_req_ids[$j]) {
                                            $j++;
                                            $count++;
                                        }
                                        if ($count == 0)
                                            echo "NO";
                                        else
                                            echo $count;
                                            ?><br/> Request </b></p></td>
                                    <td style="width: 15%"><p style="font-size: 12px"><?php echo $book_post_time[$i] ?><br/>Time posted</p></td>
                                    <td style="width: 20%"><button class="button_style" style="width: 150px">Edit</button><br/>
                                        <button class="button_style" style="width: 150px" onclick="remove_ad(<?php echo $book_ids[$i] ?>)">Remove</button></td>
                                </tr>
                            </table>
                        <hr style="margin-bottom: .5cm"></hr>
                    <?php } ?>

                </div>

            </div>
        </div>
        <!-- End Main -->

    </body>
</html>