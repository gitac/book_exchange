<?php
$book_count = 0;
$count = 0;
if ($wishlist_book != NULL) {
    foreach ($wishlist_book as $r) {
        $book_ids[] = $r['wishlist_id'];
        $wishlist_book_ids[] = $r['w_book_id'];
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
$available_book_count = 0;
if ($available_book != NULL) {
    foreach ($available_book as $r) {
        $avaiable_ids[] = $r['post_book_id'];
        $available_book_count++;
    }
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
   <head>
        <script>
            function wishlist(){
                window.location.href = "<?php echo base_url() ?>index.php/create_wishlist";
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
                    
                    
                    <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                        <tr>
                            <td style="width: 20%"><button class="button_style" style="width: 250px; margin-bottom: .5cm; margin-top: 1cm; margin-left: 15cm" onclick="wishlist()">Create new wishlist</button><br/></td>  
                        </tr>
                    </table>
                    <?php
                    for ($i = 0, $j = 0; $i < $book_count; $i++) {
                        $book = $book_ids[$i];
                        
                        ?>
                        
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                
                                <tr>
                                    <td style="width: 15%"><a href="<?php echo base_url() ?>index.php/wishlist_details/wishlist_book/<?php echo $book_ids[$i] ?>" target="_blank"><img style="width: 150px; height: 200px" src="<?php echo base_url() ?><?php echo $book_images[$i] ?>" alt="" /></a></td>
                                    <td style="width: 40%; text-align: center">
                                        <h2 style="font-size: 24px"><?php echo $book_names[$i] ?></h2>
                                        <h3 style="font-size: 16px !important;"> <?php
                                                while ($i < $book_count && $book == $book_ids[$i]) {                                         
                                                    ?>
                                                    <?php echo $book_authors[$i] ?><br/>
                                                 
                                                   <?php
                                                    
                                                    $i++;
                                                    
                                                }
                                    
                                                $i--;
                                                ?></h3>
                                           <td style="width: 30%"></td>
                                    </td>
                                     
                                    <td style="width: 25%"><p style="font-size: 16px; text-align: center"><b><?php
                                        $count = 0;
                                        while ($j < $available_book_count && $wishlist_book_ids[$i] == $avaiable_ids[$j]) {
                                            $j++;
                                            $count++;
                                        }
                                        if ($count == 0)
                                            echo "NO";
                                        else
                                            echo $count;
                                            ?><br/> Copy </b></p></td>
                                    
                                  <td style="width: 20%"><button class="button_style" style="width: 150px">Edit</button><br/>
                                      <button class="button_style" style="width: 150px">Remove</button></td>
                                    
                                   
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