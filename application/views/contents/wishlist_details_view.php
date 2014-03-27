<?php
$book_count = 0;
if ($wishlist_book != NULL) {
    foreach ($wishlist_book as $r) {
        $book_ids[] = $r['book_id'];
        $book_names[] = $r['book_name'];
       // $book_prices[] = $r['post_book_price'];
        $book_images[] = $r['w_book_image'];
      //  $book_des[] = $r['post_description'];
        $book_authors[] = $r['author_name'];
        $book_author_ids[] = $r['author_id'];
       // $book_post_time[] = $r['date_time'];
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
                            
                            <li   class="active" ><a href="my_wishlist">My wishlist</a></li>
                            <li><a href="my_messages">My Messages</a></li>
                            <li><a href="settings">Settings</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    
                    <?php
                        if ($book_count == 0) {
                            ?>
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                <tr>
                                    <td style="width: 100%"><p style="text-align: center; font-size: 20px">You currently have no books in the wishlist</p></td>
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
                        <a href=" " target="_blank">
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                                  
                                <tr>
                                    <td style="width: 60%; text-align: center">
                            <div id="modal" style="width: 100%; margin-left: .5cm; height: 300px; padding-top: 5%"><img style="width: 200px; height: 280px" src="<?php echo base_url() ?><?php echo $book_images[0] ?>" alt="" /></div>
                        </td>
                                    <td style="width: 10%"><button class="button_style" style="width: 200px; margin-bottom: 1cm; margin-top: 8cm; margin-left:2cm; position:absolute;left: 600px;top: 55px" onclick="wishlist()">remove</button><br/></td>  
                                    <td style="width: 20%; text-align: center">
                                       <p style="font-size: 24px; font-weight: bold; color: #0252BC; padding-top: .5cm; padding-left: .2cm; padding-bottom: .5cm"><?php echo $book_names[0] ?></p>
                                         <p style="padding-bottom: .5cm"><span style="font-size: 20px; font-weight: bold; font-style: italic; color: #0252BC; padding-left: .5cm;"><?php
                                                while ($i < $book_count && $book == $book_ids[$i]) {
                                                    ?>
                                                    <a href="#"><?php echo $book_authors[0] ?></a><br/>
                                                    <?php
                                                    $i++;
                                                    
                                                }
                                                $i--;
                                                ?></p>
                                           
                                    </td>
                                    
                                    
                                 <td style ="width: 30%"></td>
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