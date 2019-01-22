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
		<link rel="stylesheet" type="text/css" href="./HomePage/background.css">

		<title>MyCell(Pvt) Ltd</title>
	</head>
	<body>

		<?php
			include('dbconnect.php');
			include('Header.php');
		?>

		</div>
		<br>

		<div id="mainImage" style=" margin-left: 12%; margin-right: 10%; margin-top: 10px">
			<img id = "test1" src="./AboutUs/main.jpg" width="1053px" height="340px"  style="box-shadow: 1px 10px 20px #000000;">
		</div>
		<div style="margin-right: 9%; margin-left: 12%; background-color: white; padding-bottom: 1%; background-image: url('./HomePage/background4.jpg');background-size: cover;">
			<h1 style="color: #ffffff; padding: 1%">About Us</h1>
			<div style="background-color: #fbe3cf; font-size: 25px; font-family: sans-serif; color:#ca7935; padding: 2%; text-align: center; margin: 2%">MyCell (Pvt) Ltd. is proud to participate in serving the economy as a successful Cellular Phone company of Sri Lanka. We have been market researching to gain a successful start and here we are serving the needs of thousands of citizens from all over the country. Our efficient and timely services have made us not a mere cellular phone company but mobile phone business partners who ensure the best of services in all mobile phone related accessories within Sri Lanka. We have gained an excellent name as a mobile phone company in Sri Lanka and have been actively facilitating the people's needs with regard to mobile phones and accessories.</div>

			<h1 style="color: #ffffff; padding: 1%">Our Vision</h1>
			<div style="background-color:#fbe3cf; font-size: 25px; font-family: sans-serif; color:#ca7935; padding: 2%; margin: 2%">Improve the service while reducing your costs</div>

			<h1 style="color: #ffffff; padding: 1%">Our Mission</h1>
			<div style="background-color: #fbe3cf; font-size: 25px; font-family: sans-serif; color: #ca7935; padding: 2%; margin: 2%">To be the best mobile phone company in Sri Lanka, adding value with best services</div>

		</div>
		<footer id="foot1" style="background-color: #373737; color:#c7c7c7; text-align: center; margin-top: 10px">Copyright 2017 - <?php echo date("Y"); ?> &copy; ALPHA Team ( Ranmal Dewage, Tenusha Guruge, Vimukthi Rajapaksha, Aravinda Kulasooriya ). All Rights Reserved.</footer>
		<?php
			mysqli_close($con);
		?>
	</body>
</html>
