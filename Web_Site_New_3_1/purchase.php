<?php
		if(empty($_SESSION))
		{
			session_start();
		}
?>
<!DOCTYPE html>
<html>

<head>
	<title>MyCell(Pvt) Ltd</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./Cart/cart.css">
	<link rel="stylesheet" type="text/css" href="./HomePage/background.css">
	<script type="text/javascript" src="purchase.js"></script>
</head>

<body>


      <?php
        include('dbconnect.php');
        include('Header.php');
        $tot=$_SERVER["QUERY_STRING"];

      ?>
			<br>


<div class="cartbox" style="margin-bottom: 15px;">
	<div class="box1" style="box-shadow: 1px 10px 20px #000000">

		<pre><img src="./Cart/card.jpg" style="width:50px;height:30px" class="radioimage" class="radio"><font class="radiofont"> Credit or Debit Card</font></pre><hr/>
		<form name="myForm" action="purchase_Action.php" method="POST">
		<div>Card Number<br/><input type="text" name="cno" value=""></div><br/>
		<div class="flex">
			<div class="formbox">Expiration Date<br/><input style="width:173px"  type="date" name="expdate" value=""></div>
			<div>Security Code<br/><input type="text" name="scode" value=""></div>
		</div><br/>
		<div class="flex">
			<div class="formbox">First Name<br/><input type="text" name="fname" value=""></div>
			<div>Last Name<br/><input type="text" name="lname" value=""></div>
		</div><br/>

		<div>Billing Address<br/><textarea name="address" cols="24" rows="4"></textarea><br/><br/></div>
		<div align="right">
			<input type="button" class="canbutton" value="Cancel" onclick="window.location.assign('./index.php')">
		</div>

	</div>

	<div class="box2" style="box-shadow: 1px 10px 20px #000000">


		<table>
		<tr>
			<td><h4>Order Total<h4></td>
			<td  align="right" class="table2"><h4><?php echo 'Rs.'.$tot.'.00'; ?></h4></td>
		</tr>
		</table>
		<p align="justify">
			By clicking <b>Confirm and Pay</b>, you agree to MyCell (Pvt) Ltd. <a href="//" class="foot">Terms</a> and <a href="//" class="foot">Privacy Policy.</a>
		</p>
		<div align="center"><input type="submit" name="confirmPay" onclick="return formValidate()" value="Confirm and Pay" class="confirmPay"></div>
        </form>
	</div>

</div>
<br>

<div  id="end1">
			<div style="display: flex;">
				<div id="products" style=" width: 35%"><a class="bottomlinks2" href="./Products.php"><h4 style="text-align: center">Our Products</h4></a><p>
					<ul style="list-style-type: none; padding-left:80px">
						<li><a class="atext" href="./Phones.php">Mobile Phones</li>
						<li><a class="atext" href="./Phones.php">Tablets</li>
						<li><a class="atext" href="./PhoneCovers.php">BackCovers</li>
						<li><a class="atext" href="./HeadSets.php">Mobile HeadSets</li>
						<li><a class="atext" href="./HeadSets.php">Mobile HandsFree</li>
					</ul>
				</p></div>
				<div id="abtUs" style="padding-left: 5px; width: 35%"><a class="bottomlinks2" href="./AboutUs.php"><h4 style="text-align: center">About Us</h4></a><p style=" text-align: justify; ">MyCell (Pvt) Ltd is a premier mobile phones & accessories company in Sri Lanka. We are dealers of mobile phones & other related accessories
				</p></div>
				<div id="cntcUs" style="padding-left: 38px; width: 35%;padding-right: 10px"><a class="bottomlinks2" href="./ContactUs.php"><h4 style="text-align: center">Contact Us</h4></a><p style=" text-align: justify;">
					MyCell (Pvt) Ltd, No 02, Ground Floor, Liberty Plaza, Colombo 03.
<pre>Phone: +94 (0) 2333777 / +94 77 7883333
Fax  : +94 (0) 11 23337800
Email: info@cellmobile.com</pre>
				</p></div>

			</div>

		<footer id="foot1" style="background-color: #989898; text-align: center; margin-top: 10px">Copyright 2017 - <?php echo date("Y"); ?> &copy; ALPHA Team ( Ranmal Dewage, Tenusha Guruge, Vimukthi Rajapaksha, Aravinda Kulasooriya ). All Rights Reserved.</footer>

</div>
</body>
</html>
