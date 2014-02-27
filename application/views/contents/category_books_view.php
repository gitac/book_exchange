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
                <div id="see_more" style=" width: 75%; margin-left: 25%;">
                    <a href="show_category" id="backButton">Back</a>
                    <form method="post">
                    <table style="padding-left: 5%; width: 100%">
                        <tr>
                            <td style="color: #0871b3; font-size: 16px; width: 60%">Search in ANTIQUES & COLLECTIBLES books &nbsp; &nbsp;</td>
                            <td style="width: 30%"><input type="text" place placeholder="search"></input></td>
                            <td style="width: 10%"><input type="button" value="" id="searchButton" /></td>
                        </tr>
                    </table>
                    </form>
                    <div style="width: 100%; padding-left: 72%">
                        <p style="font-size: 16px; float:left; clear:none; display:block; padding: 8px 1em 0 0;">page <b>1</b> of <b>3</b></p>
                        <input style="float:left; clear:none; margin: 0px 0 0 2px; width: 30px; font-weight:bold; font-size: 24px" type="button" value="<"/>
                        <input style="float:left; clear:none; margin: 0px 0 0 2px; width: 30px; font-weight:bold; font-size: 24px" type="button" value=">"/>
                        <br/>
                    </div>
                    <div id="modal" >
                        <header><a href="#" style="padding-left: 72%">Price</a><a href="#" style="padding-left: 18%">Date</a></header>
                    </div>
                    <div>
                        <?php for($i=0; $i<8; $i++) {?>
                        <a href="#">
                            <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                            <tr>
                                <td style="width: 15%"><img src="<?php echo base_url() ?>assets/images/image02.jpg" alt="" /></td>
                                <td style="width: 50%; text-align: center">
                                    <h2 style="font-size: 24px"><a href="ad_details">The Shepherd</a></h2>
                                    <h3 style="font-size: 20px !important; margin-bottom: 1cm"><a>Ethan Cross</a></h3>
                                    <p style="font-size: 16px"><a href="#">Dhaka - Buet</a></p>
                                </td>
                                <td style="width: 15%"><p style="font-size: 16px"><b>৳ 1 320</b></p></td>
                                <td style="width: 20%"><p style="font-size: 12px">Today, 9:47am</p></td>
                            </tr>
                        </table></a>
                        <hr style="margin-bottom: .5cm"></hr>
                        <?php }?>
                        
                    </div>
                    <!-- end book details -->
                </div>
	</div>
	<!-- End Main -->
	
</body>
</html>