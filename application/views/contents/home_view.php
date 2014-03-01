<?php
$count = 0;
$d_count = 0;
$a_count = 0;
$book_count = 0;
$mostly_viewed_book_count = 0;
foreach ($division as $r) {
    $d_ids[] = $r['division_id'];
    $d_names[] = $r['division_name'];
    $d_count++;
}

foreach ($author as $r) {
    $a_ids[] = $r['author_id'];
    $a_names[] = $r['author_name'];
    $a_count++;
}
if ($a_count > 5) {
    $a_count = 5;
}

foreach ($category as $r) {
    $ids[] = $r['category_id'];
    $names[] = $r['category_name'];
    $count++;
}
if ($count > 5) {
    $count = 5;
}

foreach ($recently_added_book as $r) {
    $book_ids[] = $r['book_id'];
    $book_names[] = $r['book_name'];
    $book_prices[] = $r['book_price'];
    $book_images[] = $r['book_image'];
    $book_des[] = $r['book_description'];
    $book_authors[] = $r['author_name'];
    $book_count++;
}
foreach ($mostly_viewed_book as $r) {
    $m_v_book_ids[] = $r['book_id'];
    $m_v_book_names[] = $r['book_name'];
    $m_v_book_prices[] = $r['book_price'];
    $m_v_book_images[] = $r['book_image'];
    $m_v_book_des[] = $r['book_description'];
    $m_v_book_authors[] = $r['author_name'];
    $mostly_viewed_book_count++;
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
                            for ($i = 0; $i < $count; $i++) {
                                ?>
                                <li><a href="<?php echo base_url() ?>index.php/category_books/category/<?php echo $ids[$i];?>"><?php echo $names[$i]; ?></a></li>
                                <?php
                            }
                            ?>

                            <li><a href="<?php echo base_url() ?>index.php/show_category/categories" style="color: #0182B5 !important; font-style: italic !important" >+See more..</a></li>
                        </ul>
                    </li>
                    <li>
                        <h4>Authors</h4>
                        <ul>
                            <?php
                            for ($i = 0; $i < $a_count; $i++) {
                                ?>
                                <li><a href="<?php echo base_url() ?>index.php/category_books/author/<?php echo $a_ids[$i]; ?>"><?php echo $a_names[$i]; ?></a></li>
                                <?php
                            }
                            ?>

                            <li><a href="<?php echo base_url() ?>index.php/show_category/authors" style="color: #0182B5 !important; font-style: italic !important" >+See more..</a></li>
                        </ul>
                    </li>
                    <li>
                        <h4>Location</h4>
                        <ul>
                            <?php
                            for ($i = 0; $i < $d_count; $i++) {
                                ?>
                                <li><a href="#"><?php echo $d_names[$i]; ?></a></li>
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
                        <?php for ($i = 0; $i < 8; $i++) {
                            ?>
                            <li>
                                <div class="product">
                                    <a href="<?php echo base_url() ?>index.php/ad_details/book/<?php echo $book_ids[$i]?>" target="_blank" class="info">
                                        <span class="holder" style="height: 300px">
                                            <img src="<?php echo base_url() ?><?php echo $book_images[$i]; ?>" alt="" />
                                            <span class="book-name"><?php echo $book_names[$i]; ?></span>
                                            <span class="author">by <?php echo $book_authors[$i]; ?></span>
                                            <!--<span class="description"<br/><br/><br/><br/><br/><br/></span>-->
                                        </span>
                                    </a>
                                    <!--<a href="#" class="buy-btn" style="margin-bottom: 1cm">ADD TO FAVORITE</a>-->
                                    <a href="#" class="buy-btn">BUY NOW <span class="price"><span class="low">৳</span><?php echo $book_prices[$i] ?></span></a>
                                </div>
                            </li>
                        <?php }
                        ?>
                    </ul>
                    <!-- End Products -->
                </div>
                <div class="cl">&nbsp;</div>
                <!-- Best-sellers -->
                <div id="best-sellers">
                    <h3 style="color: #0182B5 !important">Mostly viewed books</h3>
                    <ul>
                        <?php for ($i = 0; $i < 4; $i++) {
                            ?>
                            <li>
                                <div class="product">
                                    <a href="<?php echo base_url() ?>index.php/ad_details/book/<?php echo $m_v_book_ids[$i]?>" target="_blank" class="info">

                                        <img src="<?php echo base_url() ?><?php echo $m_v_book_images[$i]; ?>" alt="" />
                                        <span class="book-name"><?php echo $m_v_book_names[$i]; ?></span>
                                        <span class="author">by <?php echo $m_v_book_authors[$i]; ?></span>
                                        <span class="price"><span class="low">৳</span><?php echo $m_v_book_prices[$i] ?></span>
                                    </a>

                                </div>
                            </li>
                        <?php }
                        ?>

                        <?php for ($i = 0; $i < 4; $i++) {
                            ?>
                            <li>
                                <div class="product" style="height: 100% !important ">
                                    <a href="<?php echo base_url() ?>index.php/ad_details" target="_blank" class="info">

                                        <img src="<?php echo base_url() ?><?php echo $m_v_book_images[$i]; ?>" alt="" />
                                        <span class="book-name"><?php echo $m_v_book_names[$i]; ?></span>
                                        <span class="author">by <?php echo $m_v_book_authors[$i]; ?></span>
                                        <span class="price"><span class="low">৳</span><?php echo $m_v_book_prices[$i] ?></span>
                                    </a>
                                </div>
                            </li>
                        <?php }
                        ?>
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