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
                    <div id="modal">
                        <header><h1>1-4 of 16</h1></header>
                    </div>
                    <div id="modal">
                        <header><a href="#" style="padding-left: 0">Date</a><a href="#" style="padding-left: 90%">Price</a></header>
                    </div>
                    <!-- book details -->
                    <div>
                        <?php for($i=0; $i<4; $i++) {?>
                        <table style="width: 95%; margin-left: 5%; margin-bottom: .5cm">
                            <tr>
                                <td style="width: 15%"><img src="<?php echo base_url() ?>assets/images/image02.jpg" alt="" /></td>
                                <td style="width: 55%; text-align: center">
                                    <h2 style="font-size: 24px"><a>The Shepherd</a></h2>
                                    <h3 style="font-size: 20px !important; margin-bottom: 1cm"><a>Ethan Cross</a></h3>
                                    <p style="font-size: 16px">Dhaka - Buet<br/>Today, 8:30pm</p>
                                </td>
                                <td style="30%"><button style="margin-bottom: .5cm; width: 88% !important; padding-right: 12%; font-size: 16px">Add to my favorite</button>
                                    <button style="margin-bottom: .5cm; width: 88% !important; padding-right: 12%; font-size: 16px">Share this ad</button>
                                    <button style="margin-bottom: .5cm; width: 88% !important; padding-right: 12%; font-size: 16px">Send an Email</button>
                                </td>
                            </tr>
                        </table>
                        <hr style="margin-bottom: .5cm"></hr>
                        <?php }?>
                        
                    </div>
                    <!-- end book details -->
                </div>
	</div>
	<!-- End Main -->
	
</body>
</html>