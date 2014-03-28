<?php
$book_count = 0;
foreach ($post as $r) {
    $book_ids[] = $r['post_id'];
    $book_names[] = $r['book_name'];
    $author_names[] = $r['author_name'];
    $book_prices[] = $r['post_book_price'];
    $book_images[] = $r['post_image'];
    $book_post_time[] = $r['date_time'];
    $book_count++;
}
//
//foreach ($names as $r) {
//    $book_name[] = $r['book_name'];
//    $book_count++;
//}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main --><?php if ($book_count < 3) { ?>
            <div id="main" class="shell" style="height: 600px !important">
<?php } else { ?>
                <div id="main" class="shell">
            <?php } ?>
                <div id="modal" style="width: 90% !important">
                    <!-- <div id="admin_home" style="width: 100%"> --> 
                    <div class="navbar">
                        <div class="">
                            <ul class="nav">

                                <li class="active"><a href="<?php echo base_url() ?>index.php/admin_home">Approve Ads</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/manage_category">Manage Category</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/ban_user">Ban User</a></li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div>
<?php
if ($book_count == 0) {
    ?>
                        <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                            <tr>
                                <td style="width: 100%"><p style="text-align: center; font-size: 20px">No ads</p></td>
                            </tr>
                        </table>
<?php }
?>
                    <?php for ($i = 0; $i < $book_count; $i++) { ?>
                        <a href="<?php echo base_url() ?>index.php/approve_ad/post/<?php echo $book_ids[$i] ?>" target="_blank">
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                <tr>
                                    <td style="width: 10%"><img style="width: 120px; height: 200px"src="<?php echo base_url() ?><?php echo $book_images[$i] ?>" alt="" /></td>
                                    <td style="width: 25%; text-align: center">
                                        <h2 style="font-size: 18px"><?php echo $book_names[$i] ?></a></h2>
    
                                            <h3 style="font-size: 14px !important;">
                                                <?php
                                                echo $author_names[$i];
                                                ?>
                                                </a></h3>
                                            

    <!--<p style="font-size: 16px"><a href="#">Dhaka - Buet</a></p> -->
                                    </td>
                                    <td style="width: 25%; text-align: center"><p style="font-size: 16px"><b>৳ <?php echo $book_prices[$i] ?></b></p></td>
                                    <td style="width: 15%"><p style="font-size: 12px"><?php echo $book_post_time[$i] ?></p></td>
                                </tr>
                            </table></a>
                        <hr style="margin-bottom: .5cm"></hr>
                    <?php } ?>

                </div>




            </div>
            <!-- End Main -->

    </body>
</html>
