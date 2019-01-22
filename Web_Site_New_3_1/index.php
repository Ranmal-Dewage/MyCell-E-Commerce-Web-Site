<?php
		if(empty($_SESSION))
		{
			session_start();
		}
?>
<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="slideshow.js"></script>
		<link rel="stylesheet" type="text/css" href="./HomePage/background.css">

		<title>MyCell(Pvt) Ltd</title>
	</head>

	<body>

		<?php
			include('dbconnect.php');
			include('Header.php');
		?>

		<br>

			<!-- previosly created slideshow -->

<!--		<div id="mainImage" style=" margin-left: 12%; margin-right: 10%; margin-bottom: 320px; margin-top: 10px">
			<img id = "test1" src="./HomePage/main1.png" width="1040px" height="340px"  style="box-shadow: 1px 10px 20px #000000; position:absolute;">
			<input type="image" name="prev" src="./HomePage/Prev.png" width="5%" height="5%" onclick = "document.getElementById('test1').src='./HomePage/main2.jpg'" style="position: relative; top: 150px">
			<input type="image" name="next" src="./HomePage/Next.png" width="5%" height="5%" onclick = "document.getElementById('test1').src='./HomePage/main3.jpg'" style="position: relative; top: 150px; left: 932px">
		</div>
-->

		<?php

		include('slideshow.html');

		?>

		<div id="bottom1">
			<div id="image3" style="display: flex; margin-top: 30px; text-align: justify">
				<div id="dv1" style="padding-left: 10px"><h3>iPhone 6 Plus</h3><img src="./HomePage/p2.jpg" width="318px" height="150px">
				<p style = "text-align: center;">iPhone 6 Plus, Model No : 45127H4, Manufacturer: Apple, Manu. Date :14/08/2014, Color : Black, Rs. 150,000</p>
				<p style="text-align: center"><input class="button2" type="button" name="btn1" value="View More" onclick="location.href='./Phones.php'"></p>
				</div>
				<div id="dv2" style="padding-left: 25px"><h3>GN1200 Smart Cord</h3><img src="./HomePage/h2.jpg" width="318px" height="150px">
				<p style = "text-align: center">GN1200 Smart Cord, Model No : 7548n4, Manu. Date : 2017/01/20, Color : White/Black, Rs. 2,500</p>
				<p style = "text-align: center"><input class="button2" type="button" name="btn1" value="View More" onclick="location.href='./HeadSets.php'"></p>
				</div>
				<div id="dv3" style="padding-left: 25px; padding-right: 5px"><h3 style="padding-top:-5px">Proof/Water Proof Cover</h3>
					<img src="./HomePage/b2.jpg" width="318px" height="150px" style="padding-top:-2px"></b>
					<p style = "text-align: center;padding-top: 0px">C6009 Drop Proof/Water Proof Cover ,Modle No : C6009, Manufacturer: GunDam, Color : Orange, Rs 14,000</p>
					<p style = "text-align: center"><input class="button2" type="button" name="btn1" value="View More" onclick="location.href='./PhoneCovers.php'"></p>
				</div>
			</div>
			<div id="end1" style="display: flex;">
				<div id="products" style="padding-left: 25px; width: 320px"><a class="bottomlinks" href="Products.php"><h4 style="text-align: center">Our Products</h4></a><p>
					<ul style="list-style-type: none; padding-left:80px">
						<li><a class="atext" href="./Phones.php">Mobile Phones</li>
						<li><a class="atext" href="./Phones.php">Tablets</li>
						<li><a class="atext" href="./PhoneCovers.php">BackCovers</li>
						<li><a class="atext" href="./HeadSets.php">Mobile HeadSets</li>
						<li><a class="atext" href="./HeadSets.php">Mobile HandsFree</li>
					</ul>
				</p></div>
				<div id="abtUs" style="padding-left: 5px; width: 320px"><a class="bottomlinks" href="AboutUs.php"><h4 style="text-align: center">About Us</h4></a><p style=" text-align: justify; ">MyCell (Pvt) Ltd is a premier mobile phones & accessories company in Sri Lanka. We are dealers of mobile phones & other related accessories
				</p></div>
				<div id="cntcUs" style="padding-left: 38px; width: 320px"><a class="bottomlinks" href="ContactUs.php"><h4 style="text-align: center">Contact Us</h4></a><p style=" text-align: justify;">
					MyCell (Pvt) Ltd, No 02, Ground Floor, Liberty Plaza, Colombo 03.
<pre>Phone: +94 (0) 2333777 / +94 77 7883333
Fax  : +94 (0) 11 23337800
Email: info@mycell.com</pre>
				</p></div>
			</div>
		</div>
		<footer id="foot1" style="background-color: #373737; color:#c7c7c7; text-align: center; margin-top: 10px">Copyright 2017 - <?php echo date("Y"); ?> &copy; ALPHA Team ( Ranmal Dewage, Tenusha Guruge, Vimukthi Rajapaksha, Aravinda Kulasooriya ). All Rights Reserved.</footer>
		<?php
			mysqli_close($con);
		?>
	<script>
	var slideIndex=0;
	showSlides(slideIndex);
	autoShowSlides();

	</script>

	</body>
</html>
