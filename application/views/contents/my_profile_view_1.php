<?php
$book_count = 0;
if ($books_name != NULL) {
        foreach ($books_name as $r) {
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
        $page = 1;
        $res = $book_count / 5;
        $res = intval($res);
        $mod = $book_count % 5;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
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
                                    <td style="width: 100%"><p style="text-align: center; font-size: 20px">No book found</p></td>
                                </tr>
                            </table>
                        <?php }
                        ?>
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                            //$book = $book_ids[$i];
                            //if ($i == $book_count)
                              //  break;
                            ?>
                            <a href="<?php echo base_url() ?>index.php/ad_details/book/<?php echo $book_ids[$i] ?>" target="_blank">
                                <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                    <tr>
                                        <td style="width: 15%"><img style="width: 120px; height: 200px" src="<?php echo base_url() ?><?php echo $book_images[$i] ?>" alt="" /></td>
                                        <td style="width: 45%; text-align: center">
                                            <h2 style="font-size: 24px"><a href="<?php echo base_url() ?>index.php/category_books/bookname/<?php echo $book_ids[$i] ?>"><?php echo $book_names[$i] ?></a></h2>
                                            <h3 style="font-size: 16px !important;">
                                                <?php
                                                while ($i < $book_count && $book == $book_ids[$i]) {
                                                    ?>
                                                    <a href="<?php echo base_url() ?>index.php/category_books/authorname/<?php echo $book_author_ids[$i] ?>"><?php echo $book_authors[$i] ?></a><br/>
                                                    <?php
                                                    $i++;
                                                    
                                                }
                                                $i--;
                                                ?>
                                            </h3>
                                            <!--<p style="font-size: 16px"><a href="#">Dhaka - Buet</a></p> -->
                                        </td>
                                        <td style="width: 15%"><p style="font-size: 16px"><b>৳ <?php echo $book_prices[$i] ?></b></p></td>
                                        <td style="width: 25%"><p style="font-size: 12px"><?php echo $book_post_time[$i] ?></p></td>
                                    </tr>
                                </table></a>
                            <hr style="margin-bottom: .5cm"></hr>
                        <?php } ?>

                    </div>
                <hr></hr>
            </div>
        </div>
        <!-- End Main -->

    </body>
</html>