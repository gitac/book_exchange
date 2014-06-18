<?php
$wish = 0;
if($wish_list_info!=NULL){
    foreach ($wish_list_info as $r){
        $wishlist_book_ids[] = $r['w_book_id'];
        $wish_book_names[] = $r['book_name'];
       // $book_prices[] = $r['post_book_price'];
        $wish_book_images[] = $r['w_book_image'];
      //  $book_des[] = $r['post_description'];
      //  $wish_book_authors[] = $r['author_name'];
      //  $wish_book_author_ids[] = $r['author_id'];
        $wish ++;
    }
}

$book_count = 0;
if ($wishlist_book != NULL) {
    foreach ($wishlist_book as $r) {
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
            function wishlist(){
                window.location.href = "<?php echo base_url() ?>index.php/create_wishlist/remove";
                //alert("sss");
            }
            
        </script>
    </head> 
    <body >
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal" style="margin-left: 0 !important; height: 100% !important; width: 100% !important">


                <table style="width: 100%;">

                    <tr>
                        <td style="width: 45%; text-align: center">
                            <div id="modal" style="width: 100%; margin-left: .5cm; height: 300px; padding-top: 5%"><img style="width: 200px; height: 280px" src="<?php echo base_url() ?><?php echo $wish_book_images[0] ?>" alt="" /></div>
                        </td>

                    </tr>
                                    <?php
                                    for ($i = 0; $i < $book_count; $i++) {
                                        $book = $book_ids[$i];
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
                                    </td>
                                    <td style="width: 15%"><p style="font-size: 16px"><b>৳ <?php echo $book_prices[$i] ?></b></p></td>
                                    <td style="width: 25%"><p style="font-size: 12px"><?php echo $book_post_time[$i] ?></p></td>
                                </tr>
                            </table></a>
                        <hr style="margin-bottom: .5cm"></hr>
                                        <?php } ?>
                </table>
            </div>
        </div>
        <!-- End Main -->	
    </body>
</html>