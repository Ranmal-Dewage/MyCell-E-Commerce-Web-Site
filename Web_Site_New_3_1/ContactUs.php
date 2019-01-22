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
		<script type = "text/javascript" src="contactUs.js"></script>
		<style>

			.table1{
				width: 260px;
				height: 35px;
				margin:20px;
			}

		</style>
		<title>MyCell(Pvt) Ltd</title>
	</head>
	<body>

		<?php
			include('dbconnect.php');
		  include('Header.php');
		?>
		<br>


		</div>
		<div id="mainImage" style=" margin-left: 12%; margin-right: 10%; margin-top: 10px">
			<img id = "test1" src="./ContactUs/main.jpg" width="1035px" height="340px"  style="box-shadow: 1px 10px 20px #000000;">
		</div>

		<div style="display: flex">
			<div style="border-style: solid; border-width: 1px; border-color: black; margin-left: 12%; margin-top: 20px; background-color: white;">
				<div id = "form1">
					<form name="myForm1">
						<table>
							<h2 style="text-align: center"><u>Contact Us Today</u></h2>
							<tr>
								<td><input type="text" name = "fname" placeholder="First Name" class="table1"></td>
								<td><input type="text" name = "lname" placeholder="Last Name" class="table1"></td>
							</tr>
							<tr>
								<td><input type="text" name = "email" placeholder="E-mail Address" class="table1"></td>
								<td><input type="text" name = "mobNo" placeholder="Phone Number" class="table1"></td>
							</tr>
							<tr>
								<td><input type="text" name = "country" placeholder="Country" class="table1"></td>
								<td><input type="text" name = "state" placeholder="State" class="table1"></td>
							</tr>
						</table>
						<p style="margin-left:4%"><textarea name="textarea" cols="78" rows="5" placeholder="Comment"></textarea></p>
						<p><input type="submit" name="sbtn" value="Submit" onclick="return validate()" style="width: 100px; height: 40px; background-color: blue; color:white; margin-left: 3%"></p>
					</form>
				</div>
			</div>
			<div style=" margin-left: 85px; margin-top: 20px;">
				<div id = "map1">
					<img src="./ContactUs/map.png" width="71%" height="230px" style="border-style: solid; border-width: 1px; border-color: black;">
				</div>
				<div style="margin-right: 10%">
					<div style="padding: 3%;"><img src="./ContactUs/locate.png" width="6%" height="3%" style="padding-right: 10px;">MyCell (Pvt) Ltd, No 02, Ground Floor, <br> </div>
					<div style="padding-left:8.5%; line-height: 0.2">Liberty Plaza, Colombo 03.</div>
					<br>
					<div style="padding: 3%;"><img src="./ContactUs/call.png" width="6%" height="3%" style="padding-right: 10px;">+94 (0) 11 2333777 / +94 77 7883333</div>
					<div style="padding: 3%;"><img src="./ContactUs/fax.png" width="6%" height="3%" style="padding-right: 10px;">+94 (0) 11 23337800</div>
					<div style="padding: 3%;"><img src="./ContactUs/mail.png" width="6%" height="3%" style="padding-right: 10px;">info@mycell.com</div>
				</div>
			</div>
		</div>
		<footer id="foot1" style="background-color: #373737; color:#c7c7c7; text-align: center; margin-top: 10px">Copyright 2017 - <?php echo date("Y"); ?> &copy; ALPHA Team ( Ranmal Dewage, Tenusha Guruge, Vimukthi Rajapaksha, Aravinda Kulasooriya ). All Rights Reserved.</footer>
		<?php
			mysqli_close($con);
		?>
	</body>
</html>
