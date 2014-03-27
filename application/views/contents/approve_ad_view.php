<?php

$count=1;
foreach ($post_giver_detail as $r) {
    $giver_name['name3'] = $r['ad_giver_name'];
    $giver_email['email'] = $r['ad_giver_email'];
    $giver_phn_no['phn_no'] = $r['ad_giver_phn_no'];
    $giver_address['address'] = $r['ad_giver_address'];
   
}

foreach ($location_name as $r) 
  {
    $giver_location['location'] = $r['division_name'];  
}

    
/* @var $book_info type */
foreach ($book_name as $r) {
    $b_name['name'] = $r['book_name'];
   
}

foreach ($institute_name as $r) {
    $giver_institute['institute'] = $r['institute_name'];
   
}

foreach ($category_name as $r) 
  {
   $c_name['name1']= $r['category_name'];  
}

foreach ($author_name as $r) 
  {
   $a_name['name2']= $r['author_name'];  
}

foreach ($book_edition as $r) 
  {
   $post_id['id'] = $r['post_id']; 
   $edition['no']= $r['post_book_edition'];  
   $book_price['price']=$r['post_book_price'];
   $post_description['des']=$r['post_description'];
   $post_image['image'] = $r['post_image'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal" style="width: 90% !important">
                <header><h1>Pending Ad</h1></header>
                <section>
                    <form action="<?php echo base_url() ?>index.php/approve_ad/approvePost" class="form-horizontal" method="post">
                        <input type ="hidden" name="m" value="<?php  echo $post_id['id'] ;?>" />
                        <fieldset style="padding-top: .5cm">
                            
                            <div class="control-group">
                                <label class="control-label" >Category Name</label>
                                <div class="controls">
                                    <div class="input">
                                        
                                        <input id="c_name"  type="text"  class="input-xlarge" value= "<?php echo $c_name['name1'] ; ?>" name="category_name"/>
                                     <!--   <button type="submit" class="button_style" style="position: absolute; right: 300px; top: 135px; height: 40px; width: 80px;">Add</button>
                                        <button type="submit" class="button_style" style="position: absolute; right: 200px; top: 135px;height: 40px; width: 80px;">Edit</button> -->
                        

                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Book name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" size="40" value="<?php echo   $b_name['name'] ; ?>" name="book_name" />
                                   <!-- <button type="submit" class="button_style" style="position: absolute; right: 300px; top: 185px;height: 40px; width: 80px;">Add</button> -->
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Author name</label>
                                <div class="controls">
                                    <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="text" class="input-xlarge" value="<?php echo   $a_name['name2'] ; ?>" name="author_name" />
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Edition (Optional)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?php echo   $edition['no'] ; ?>" name="edition"/>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Photo</label>
                                <div class="controls">
                                    
                                    <img style="width: 120px; height: 150px"src="<?php echo base_url() ?><?php echo $post_image['image'] ?>" alt="" />
                                    <!-- <input type="" name="img_file"  /> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >Describe what makes your ad unique within 1000 characters</label>
                                <div class="controls">
                                    <input type="text" style="width: 300px;height: 50px; text-align: left " class="input-xlarge" name="book_des" value="<?php echo $post_description['des']; ?>"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Price (Optional)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?php echo $book_price['price']; ?>"/>
                                </div>
                            </div>



                            <header><h1>Seller information</h1></header>  
                            <div class="control-group" style="padding-top: .5cm">
                                <label class="control-label" for="name">Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputName" value="<?php echo  $giver_name['name3'] ; ?>" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputEmail" value="<?php echo  $giver_email['email'] ; ?>" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Phone number</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputPhone" value="<?php echo  $giver_phn_no['phn_no'] ; ?>" name="phone" />
                                    <label style="color: red; font-weight: bold" id="m_error"></label>
                                </div>
                            </div>
                            <div class="control-group">
                                
                                <label class="control-label" for="inputLocation" >Location</label>
                                    
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="inputLocation" value="<?php echo  $giver_location['location'] ; ?>"  />
                                
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Address</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?php echo $giver_address['address'] ;?>" name="address"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Occupation</label>
                                <div class="controls">
                                     <input type="text" class="input-xlarge" value="<?php echo $occupation ;?>" name="occupation"/>
                                </div>
                            </div>
                            
                            
                                                        <div class="control-group">
                                <label class="control-label">Institution</label>
                                <div class="controls">
                                     <input type="text" style="width: 400px " class="input-xlarge" value="<?php echo $giver_institute['institute'] ;?>" name="occupation"/>
                                </div>
                            </div>
                            
                            
                            
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="sbm" value="reject" class="button_style" style="position:absolute; right:350px ;bottom: 85px; width: 150px; margin-top: .2cm; margin-bottom: .2cm">Reject</button>
                                    <button type="submit" name="sbm" value="approve" class="button_style" style=" width: 150px; margin-top: .2cm; margin-bottom: .2cm">Approve</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </section>
            </div>
        </div>
        <!-- End Main -->
    </body>
</html>