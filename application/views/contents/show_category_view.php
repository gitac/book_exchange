<?php
$count = 0;
$d_count = 0;
$l_count = 0;
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
if ($type != "categories" && $type != "authors") {
    foreach ($list as $r) {
        $l_ids[] = $r['institute_id'];
        $l_types[] = $r['institute_type'];
        $l_names[] = $r['institute_name'];
        $l_count++;
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
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
                                <li><a href="#"><?php echo $d_names[$i]; ?></a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </li>
                    <li>
                        <h4>Institutes</h4>
                        <ul>
                            <li><a href="schools">Schools</a></li>
                            <li><a href="colleges">Colleges</a></li>
                            <li><a href="varsities">Varsities</a></li>   
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->
            <div id="see_more" style="height: 1000px; width: 75%; margin-left: 25%;">
                <a href="<?php echo base_url() ?>index.php/home" id="backButton">Back</a>
                <h1 style="color: #0871b3; text-align: center; margin-bottom: 1cm;"><b>All <?php echo $type; ?></b></h1>    
                <table style="width: 100%">
                    <?php
                    if ($type == "categories") {
                        ?>
                        <?php for ($i = 0; $i < $count; $i = $i + 2) { ?>
                            <tr>
                                <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="<?php echo base_url() ?>index.php/category_books/category/<?php echo $ids[$i];?>"><?php echo $names[$i]; ?></a></li></ul></td>
                                <?php if ($i % 2 == 0 && $i < $count - 1) { ?>
                                    <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="<?php echo base_url() ?>index.php/category_books/category/<?php echo $ids[$i + 1];?>"><?php echo $names[$i + 1]; ?></a></li></ul></td>
                                <?php } ?>
                            </tr>
                            <?php
                        }
                    }else if($type == "authors"){
                        ?>
                        <?php for ($i = 0; $i < $a_count; $i = $i + 2) { ?>
                            <tr>
                                <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="<?php echo base_url() ?>index.php/category_books/author/<?php echo $a_ids[$i]; ?>"><?php echo $a_names[$i]; ?></a></li></ul></td>
                                <?php if ($i % 2 == 0 && $i < $a_count - 1) { ?>
                                    <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="<?php echo base_url() ?>index.php/category_books/author/<?php echo $a_ids[$i + 1]; ?>"><?php echo $a_names[$i + 1]; ?></a></li></ul></td>
                                <?php } ?>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <?php for ($i = 0; $i < $l_count; $i = $i + 2) { ?>
                            <tr>
                                <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="#"><?php echo $l_names[$i]; ?></a></li></ul></td>
                                <?php if ($i % 2 == 0 && $i < $l_count - 1) { ?>
                                    <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="#"><?php echo $l_names[$i + 1]; ?></a></li></ul></td>
                                <?php } ?>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <!-- End Main -->
    </body>
</html>