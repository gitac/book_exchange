<?php
$count = 0;
$d_count = 0;
    foreach ($division as $r) {
        $d_ids[] = $r['division_id'];
        $d_names[] = $r['division_name'];
        $d_count++;
    }

foreach ($category as $r) {
        $ids[] = $r['category_id'];
        $names[] = $r['category_name'];
        $count++;
    }
    if($count > 5){
        $count = 5;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Slider -->
        <div id="slider">
            <div class="shell">
                <ul>
                    <li>
                        <div class="image">
                            <img src="<?php echo base_url() ?>assets/images/books.png" alt="" />
                        </div>
                        <div class="details">
                            <h2 style="font-family: 'Georgia', Arial, serif; font-style: italic; font-size: 65px; line-height: 70px; color: #fff;">Book Exchange</h2>

                            <p class="title">Do you have any book to exchange ?</p>
                            <p class="description">Post your ad FOR FREE on BookExchange</p>
                            <a href="<?php echo base_url() ?>index.php/post_free_ad" class="add-free-ad">Post a free Ad</a>
                        </div>
                    </li>
                    <li>
                        <div class="image">
                            <img src="<?php echo base_url() ?>assets/images/books.png" alt="" />
                        </div>
                        <div class="details">
                            <h2 style="font-family: 'Georgia', Arial, serif; font-style: italic; font-size: 65px; line-height: 70px; color: #fff;">Book Exchange</h2>
                            <p class="title">Do you have any book to exchange ?</p>
                            <p class="description">Post your ad FOR FREE on BookExchange</p>
                            <a href="<?php echo base_url() ?>index.php/post_free_ad" class="add-free-ad">Post a free Ad</a>
                        </div>
                    </li>
                    <li>
                        <div class="image">
                            <img src="<?php echo base_url() ?>assets/images/books.png" alt="" />
                        </div>
                        <div class="details">
                            <h2 style="font-family: 'Georgia', Arial, serif; font-style: italic; font-size: 65px; line-height: 70px; color: #fff;">Book Exchange</h2>
                            <p class="title">Do you have any book to exchange ?</p>
                            <p class="description">Post your ad FOR FREE on BookExchange</p>
                            <a href="<?php echo base_url() ?>index.php/post_free_ad" class="add-free-ad">Post a free Ad</a>
                        </div>
                    </li>
                    <li>
                        <div class="image">
                            <img src="<?php echo base_url() ?>assets/images/books.png" alt="" />
                        </div>
                        <div class="details">
                            <h2 style="font-family: 'Georgia', Arial, serif; font-style: italic; font-size: 65px; line-height: 70px; color: #fff;">Book Exchange</h2>
                            <p class="title">Do you have any book to exchange ?</p>
                            <p class="description">Post your ad FOR FREE on BookExchange</p>
                            <a href="<?php echo base_url() ?>index.php/post_free_ad" class="add-free-ad">Post a free Ad</a>
                        </div>
                    </li>
                </ul>
                <div class="nav">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                </div>
            </div>
        </div>
        <!-- End Slider -->
        <!-- Main -->
        <div id="main" class="shell">
            <!-- Sidebar -->
            <div id="sidebar">
                <ul class="categories">
                    <li>
                        <h4>Categories</h4>
                        <ul>
                            <?php
                            for($i = 0; $i < $count; $i++){
                                ?>
                            <li><a href="<?php echo base_url() ?>index.php/category_books"><?php echo $names[$i];?></a></li>
                            <?php
                            }
                            ?>
                            
                            <li><a href="<?php echo base_url() ?>index.php/show_category/categories" style="color: #0182B5 !important; font-style: italic !important" >+See more..</a></li>
                        </ul>
                    </li>
                    <li>
                        <h4>Authors</h4>
                        <ul>
                            <li><a href="#">Jacob Millman</a></li>
                            <li><a href="#">Goodrich</a></li>
                            <li><a href="#">Jahanara Imam</a></li>
                            <li><a href="#">Jasim Uddin</a></li>
                            <li><a href="#">Kazi Nazrul Islam</a></li>
                            <li><a href="#" style="color: #0182B5 !important; font-style: italic !important" >+See more..</a></li>
                        </ul>
                    </li>
                    <li>
                        <h4>Location</h4>
                        <ul>
                            <?php
                            for($i = 0; $i < $d_count; $i++){
                                ?>
                            <li><a href="#"><?php echo $d_names[$i];?></a></li>
                            <?php
                            }
                            ?>
                            
                        </ul>
                    </li>
                    <li>
                        <h4>Institutes</h4>
                        <ul>
                            <li><a href="<?php echo base_url() ?>index.php/show_category/schools">Schools</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/show_category/colleges">Colleges</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/show_category/varsities">Varsities</a></li>   
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->
            <!-- Content -->
            <div id="content">
                <!-- Products -->
                <div class="products">
                    <h3>Recently added books</h3>
                    <ul>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image01.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image02.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image03.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image04.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image05.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image06.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image07.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#" class="info">
                                    <span class="holder">
                                        <img src="<?php echo base_url() ?>assets/images/image08.jpg" alt="" />
                                        <span class="book-name">Book Name</span>
                                        <span class="author">by John Smith</span>
                                        <span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
                                    </span>
                                </a>
                                <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">$</span>22<span class="high">00</span></span></a>
                            </div>
                        </li>
                    </ul>
                    <!-- End Products -->
                </div>
                <div class="cl">&nbsp;</div>
                <!-- Best-sellers -->
                <div id="best-sellers">
                    <h3 style="color: #0182B5 !important">Mostly viewed books</h3>
                    <ul>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best01.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>35<span class="high">00</span></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best02.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>45<span class="high">00</span></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best03.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>15<span class="high">00</span></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best04.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>27<span class="high">99</span></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best01.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>35<span class="high">00</span></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best02.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>45<span class="high">00</span></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best03.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>15<span class="high">00</span></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="product">
                                <a href="#">
                                    <img src="<?php echo base_url() ?>assets/images/image-best04.jpg" alt="" />
                                    <span class="book-name">Book Name </span>
                                    <span class="author">by John Smith</span>
                                    <span class="price"><span class="low">$</span>27<span class="high">99</span></span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Best-sellers -->
            </div>
            <!-- End Content -->
            <div class="cl">&nbsp;</div>
        </div>
        <!-- End Main -->





    </body>
</html>