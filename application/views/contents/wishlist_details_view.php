<?php
$book_count = 0;
if ($wishlist_book != NULL) {
    foreach ($wishlist_book as $r) {
         $book_ids[] = $r['wishlist_id'];
        $wishlist_book_ids[] = $r['w_book_id'];
        $book_names[] = $r['book_name'];
      
        $book_images[] = $r['w_book_image'];
      
        $book_authors[] = $r['author_name'];
        $book_author_ids[] = $r['author_id'];
     
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
           <div id="modal" style="margin-left: 0 !important; height: 100% !important; width: 100% !important">
                
               
                           <table style="width: 100%;">

                    <tr>
                        <td><p style="font-size: 24px; font-weight: bold; color: #0252BC; padding-top: .5cm; padding-left: .5cm; padding-bottom: .5cm"><?php echo $book_names[0] ?></p>
                            <p style="padding-bottom: .5cm"><span style="font-size: 20px; font-weight: bold; font-style: italic; color: #0252BC; padding-left: .5cm;">
                                    <?php
                                      
                                    $book = $book_ids[0];
                                  $i = 0;
                                    while ($i < $book_count && $book == $book_ids[$i]) {
                                        echo $book_authors[$i] . '<br> &nbsp; &nbsp;';
                                        $i++;
                                    }
                                    ?>
                                </span></p></td>
                        <td style="width: 45%; text-align: center">
                            <div id="modal" style="width: 100%; margin-left: .5cm; height: 300px; padding-top: 5%"><img style="width: 200px; height: 280px" src="<?php echo base_url() ?><?php echo $book_images[0] ?>" alt="" /></div>
                        </td>
                        <td style="width: 30%; text-align: center; padding-left: 5%; padding-right: 2%">
                            <div id="modal" style="width: 100%; padding-bottom: .5cm"><p style="font-size: 20px; font-weight: bold; padding-top: .5cm;">
                                    <?php
                                  if ( $available_book == 0) {
                                       echo 'No';
                                   } else {
                                        ?><?php
                                    echo $available_book;
                                }
                                    ?> </p>Copy</div>
                            
                            
                        </td>
                    </tr>
                    <?php
                    if ($available_book != 0) {
                        ?>
                        <tr>
                            <td colspan="3">
                                <p style="font-size: 20px; font-weight: bold;padding-left: .5cm; padding-bottom: .5cm; height: 10%">Copy</p>

                            </td>
                        </tr>
                        <?php for ($i = 0; $i < $available_book; $i++) {
                            ?>
                            <tr>
                                <td colspan="3">
                                    <hr></hr>
                                </td>
                            </tr>
                            <tr style="width: 100%; height: 300px">
                               
                                    <td style="width: 35%; height: 100%; text-align: center">

                                        <img style="width: 150px; height: 150px; margin-top: .2cm" src="<?php echo base_url() ?><?php echo $customer_photos[$i] ?>" alt="" />   
                                        <button id="btn_msg" class="button_style" style="height: 40px !important; margin-left: 20%; margin-top: .2cm; margin-bottom: .2cm">Send Message</button>


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
                              
        <!--                       

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