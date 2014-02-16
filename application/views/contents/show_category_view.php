<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
 <!--   <head>
        <style type="text/css" media="screen"> td { border-right: 1px solid #aaaaaa; padding: 1em; } td:last-child { border-right: none; } th { text-align: left; padding-left: 1em; background: #cac9c9; border-bottom: 1px solid white; border-right: 1px solid #aaaaaa; } #pagination a, #pagination strong { background: #e3e3e3; padding: 4px 7px; text-decoration: none; border: 1px solid #cac9c9; color: #292929; font-size: 13px; } #pagination strong, #pagination a:hover { font-weight: normal; background: #cac9c9; } </style>
    </head> -->
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <!-- Sidebar -->
            <div id="sidebar">
                <ul class="categories">
                    <li>
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Bibliographies</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Computer Science</a></li>
                            <li><a href="#">Law</a></li>
                            <li><a href="#">Story book</a></li>
                            <li><a href="show_category" style="color: #0182B5 !important; font-style: italic !important" >+See more..</a></li>
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
                            <li><a href="#">Dhaka</a></li>
                            <li><a href="#">Chittagong</a></li>
                            <li><a href="#">Rajshahil</a></li>
                            <li><a href="#">Barishal</a></li>
                            <li><a href="#" style="color: #0182B5 !important; font-style: italic !important" >+See more..</a></li>
                        </ul>
                    </li>
                    <li>
                        <h4>Universities</h4>
                        <ul>
                            <li><a href="#">BUET</a></li>
                            <li><a href="#">CUET</a></li>
                            <li><a href="#">DU</a></li>
                            <li><a href="#">RUET</a></li>
                            <li><a href="#" style="color: #0182B5 !important; font-style: italic !important" >+See more..</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->
            <div id="see_more" style="height: 1000px; width: 75%; margin-left: 25%;">
                <a href="home" id="backButton">Back</a>
                <h1 style="color: #0871b3; text-align: center; margin-bottom: 1cm;"><b>All categories</b></h1>    
                <table style="width: 100%">
                    <?php for ($i = 0; $i < 40; $i++) { ?>
                        <tr>
                            <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="category_books">ANTIQUES & COLLECTIBLES</a></li></ul></td>
                            <td style="width: 50%; padding-left: 5%; font-size: 16px"><ul><li><a href="category_books">ARCHITECTURE</a></li></ul></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-- End Main -->
    </body>
</html>