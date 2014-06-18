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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script>
            function delete_ad(post_id){
                window.location.href = "<?php echo base_url() ?>index.php/my_profile/delete_ad/removed_ads/"+post_id;
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
                            <li  class="active" ><a href="<?php echo base_url() ?>index.php/removed_ads">Removed Ads</a></li>
                            <!--<li><a href="requested_ads">Requested Ads</a></li>-->
                            <li><a href="<?php echo base_url() ?>index.php/my_wishlist">My wishlist</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/my_messages">My Messages</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/settings">Settings</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <?php
                        if ($book_count == 0) {
                            ?>
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                <tr>
                                    <td style="width: 100%"><p style="text-align: center; font-size: 20px">You currently have no pending ad</p></td>
                                </tr>
                            </table>
                    <hr></hr>
                        <?php }
                        ?>
                    <?php
                    for ($i = 0; $i < $book_count; $i++) {
                        $book = $book_ids[$i];
                        //if ($i == $book_count)
                        //  break;
                        ?>
                        
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                <tr>
                                    <td style="width: 15%"><img style="width: 120px; height: 200px" src="<?php echo base_url() ?><?php echo $book_images[$i] ?>" alt="" /></td>
                                    <td style="width: 35%; text-align: center">
                                        <h2 style="font-size: 24px"><?php echo $book_names[$i] ?></h2>
                                        <h3 style="font-size: 16px !important;"><?php
                                                while ($i < $book_count && $book == $book_ids[$i]) {
                                                    ?>
                                                    <?php echo $book_authors[$i] ?><br/>
                                                    <?php
                                                    $i++;
                                                    
                                                }
                                                $i--;
                                                ?></h3>
                                            <!--<p style="font-size: 16px"><a href="#">Dhaka - Buet</a></p> -->
                                    </td>
                                    <td style="width: 15%"><p style="font-size: 16px"><b>৳ <?php echo $book_prices[$i] ?><br/> price</b></p></td>
                                    <td style="width: 15%"><p style="font-size: 12px"><?php echo $book_post_time[$i] ?><br/>Time posted</p></td>
                                    <td style="width: 20%"><button class="button_style" style="width: 150px" onclick="delete_ad(<?php echo $book_ids[$i] ?>)">Delete</button><br/>
                                        <button class="button_style" style="width: 150px">Active</button></td>
                                </tr>
                            </table></a>
                        <hr style="margin-bottom: .5cm"></hr>
                    <?php } ?>

                </div>
            </div>
        </div>
        <!-- End Main -->

    </body>
</html>