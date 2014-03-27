<?php
$count = 0;
$d_count = 0;
$a_count = 0;
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
    $a = 5;
}

foreach ($category as $r) {
    $ids[] = $r['category_id'];
    $names[] = $r['category_name'];
    $count++;
}
if ($count > 5)
    $c = 5;

$book_count = 0;
if ($criteria == "category") {
    if ($category_book != NULL) {
        foreach ($category_book as $r) {
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
} else if ($criteria == "author") {
    if ($author_book != NULL) {
        foreach ($author_book as $r) {
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
} else if ($criteria == "book_name") {
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
} else if ($criteria == "author_name") {
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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <style>
        </style>
    </head>
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <!-- Sidebar -->
            <div id="sidebar">
                <ul class="categories">
                    <li>
                        <h4>Categories</h4>
                        <ul>
                            <?php
                            for ($i = 0; $i < $c; $i++) {
                                ?>
                                <li><a href="<?php echo base_url() ?>index.php/category_books/category/<?php echo $ids[$i]; ?>"><?php echo $names[$i]; ?></a></li>
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
                            for ($i = 0; $i < $a; $i++) {
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
                                <li><a href="<?php echo base_url() ?>index.php/show_category/location/<?php echo $d_ids[$i]; ?>"><?php echo $d_names[$i]; ?></a></li>
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
            <?php if ($book_count < 5) {
                ?>
                <div id="see_more" style=" width: 75%; height: 1200px; margin-left: 25%;">
                <?php } else {
                    ?>
                    <div id="see_more" style=" width: 75%; margin-left: 25%;">
                    <?php } ?>
                    <a href="<?php echo $agent; ?>" id="backButton">Back</a>
                    <form method="post">
                        <table style="padding-left: 5%; width: 100%">
                            <tr>
                                <td style="color: #0871b3; font-size: 16px; width: 60%">Search in <?php echo $c_name; ?><?php if ($criteria == "author" || $criteria == "author_name") echo "'s" ?> books &nbsp; &nbsp;</td>
                                <td style="width: 30%"><input type="text" placeholder="Search" name="search" list="suggests_book2"/>
                                    <datalist id="suggests_book2">
                                        <?php for ($i = 0; $i < $book_count; $i++) { ?>
                                            <option value="<?php echo $book_names[$i]; ?>">
                                            <?php } ?>
                                    </datalist></td>
                                <td style="width: 10%"><input type="button" value="" id="searchButton" /></td>
                            </tr>
                        </table>
                    </form><!-- do it
                    <div style="width: 100%; padding-left: 72%">
                        <p style="font-size: 16px; float:left; clear:none; display:block; padding: 8px 1em 0 0;">page <b><?php $page ?></b> of <b><?php echo $res + 1; ?></b></p>
                        <input style="float:left; clear:none; margin: 0px 0 0 2px; width: 30px; font-weight:bold; font-size: 24px" type="button" value="<"/>
                        <input style="float:left; clear:none; margin: 0px 0 0 2px; width: 30px; font-weight:bold; font-size: 24px" type="button" value=">"/>
                        <br/>
                    </div>-->
                    <div id="modal" >
                        <header><a style="padding-left: 65%">Price</a><a style="padding-left: 18%">Date</a></header>
                    </div>
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

                    </div>
                    <!-- end book details -->
                </div>
            </div>
            <!-- End Main -->

    </body>
</html>