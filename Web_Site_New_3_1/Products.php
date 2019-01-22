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

		<div style="margin-top: 25px;">
			<img src="./Products/main.jpg" width=98.8% height="600px" style="position: absolute;">
		</div>
		<div>
			<h1 style="position: relative; text-align: center; padding-top: 2%; color: white">Technology Solutions</h1>
			<div style="display: flex; margin-left: 25%">
				<div style="padding-right: 20px"><a href="Phones.php"><img class="item" src="./Products/mobile.jpg" width = "200px" height="200px" style="position: relative; border-style: solid; border-width: 1px; border-color: white"></a>
				</div>
				<div style="padding-right: 20px"><a href="Phones.php"><img class="item" src="./Products/tab.jpg" width = "200px" height="200px" style="position: relative; border-style: solid; border-width: 1px; border-color: white"></a>
				</div>
				<div><a href="PhoneCovers.php"><input class="item" type="image" src="./Products/backcover.jpg" width = "200px" height="200px" style="position: relative; border-style: solid; border-width: 1px; border-color: white">
				</div>
			</div>
			<div style="display: flex; padding-top: 20px; margin-left: 33%">
				<div style="padding-right: 20px"><a href="HeadSets.php"><img class="item" src="./Products/handsfree.jpg" width = "200px" height="200px" style="position: relative; border-style: solid; border-width: 1px; border-color: white"></a>
				</div>
				<div style="padding-right: 20px"><a href="HeadSets.php"><img class="item" src="./Products/headset.jpg" width = "200px" height="200px" style="position: relative; border-style: solid; border-width: 1px; border-color: white"></a>
				</div>
			</div>
			<div><h1 style="position: relative; margin-top: 35px; text-align: center; color:white">Welcome To MyCell</h1></div>
		</div>

		<footer id="foot1" style="background-color: #373737; color:#c7c7c7; text-align: center; margin-top: 10px">Copyright 2017 - <?php echo date("Y"); ?> &copy; ALPHA Team ( Ranmal Dewage, Tenusha Guruge, Vimukthi Rajapaksha, Aravinda Kulasooriya ). All Rights Reserved.</footer>
		<?php
			mysqli_close($con);
		?>
	</body>
</html>
