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

</head>

<body>


  <?php
		include('dbconnect.php');
		include('Header.php');
  ?>
	<br>



<div class="cartbox" style="margin-bottom: 15px;">
	<div class="box1" style="box-shadow: 1px 10px 20px #000000">


		<?php

		$user=$_SESSION['username'];

		$total=0;
		$result=mysqli_query($con,"SELECT* FROM cart WHERE user='$user'");
		if(!$row=mysqli_fetch_array($result)){
			echo "
			<p>
			<b>Your shopping cart is empty,but it doesn't have to be.</b><br/><br/>
			There are lots of great deals and one-of-a-kind items just waiting for you.<br/>
			Start shopping and look for the 'Add to cart' button.You can add several items to your cart from different sellers and pay for them all at once.
			<ul>
				<li><a href='index.php' class='continue'>Start Shopping and Search for Great Deals.</a></li>
			</ul>
			</p>";
		}
		else{
		do{
		$cost=$row['quantity']*$row['price'];
		$total=$total+$cost;
		$model_no=$row['model_no'];
		$qty=mysqli_query($con,"SELECT quantity FROM products WHERE pID='$model_no'");
		$qty=mysqli_fetch_array($qty);
		echo"
			<div style='display:flex;border: 1.5px solid #0e2050;'>
				<div style='width:30%; height: 180px;margin: 10px;'><img src='".$row['image']."' height='100%' width='100%'></div>
				<div style='width:70%;'>
					<div style='margin-bottom: 20px'><h3>".$row['model_name']."</h3></div>
					<div style='display:flex;'>
						<div style='width:70%;'>
							<form name='".$row['model_name']."' method='POST' action='./Cart/cartQuantityChange.php?".$row['model_no']."'>
								Quantity :
								<input type='text' name='txtbox' value='".$row['quantity']."' style='width:50px'>
								<input type='submit' value='Update' name='btn1'>
							</form></div>
						<div style='width:30%;'><b>Rs ".$cost."</b></div>
					</div>
						<div>
							<p style='color:red'>".$qty['quantity']." Available</p>
						</div>
						<div align='right' style='margin: 10px; padding-top: 30px;'>

								<a class='remove' href='./Cart/removeFromCart.php?".$row['model_no']."'>Remove Item</a>

						</div>
				</div>
			</div>
			<br>";
		}while($row=mysqli_fetch_array($result));
		}
		mysqli_close($con);
		?>

	</div>

	<?php
	if($total>0){
		echo "
	<div class='box2' style='box-shadow: 1px 10px 20px #000000'>
		<h2>Cart Summary</h2>
		<hr/>


		<div><h3>Order Total : Rs ".$total.".00</h3></div>

		<div align='center'>
			<a class='paybutton' method='POST' href='purchase.php?".$total."'>Proceed to Checkout</a>
			<div class='contShopping'><a class='continue' href='index.php'>Continue Shopping...</a></div>
		</div>
		</div>";
		}
	?>

</div>
<br>

<div  id="end1">
			<div style="display: flex;">
				<div id="products" style=" width: 35%"><a class="bottomlinks2" href="./Products.php"><h4 style="text-align: center">Our Products</h4></a>
					<p>
					<ul style="list-style-type: none; padding-left:80px">
						<li><a class="atext" href="./Phones.php">Mobile Phones</li>
						<li><a class="atext" href="./Phones.php">Tablets</li>
						<li><a class="atext" href="./PhoneCovers.php">BackCovers</li>
						<li><a class="atext" href="./HeadSets.php">Mobile HeadSets</li>
						<li><a class="atext" href="./HeadSets.php">Mobile HandsFree</li>
					</ul>
				</p>
			</div>
				<div id="abtUs" style="padding-left: 5px; width: 35%"><a class="bottomlinks2" href="./AboutUs.php"><h4 style="text-align: center">About Us</h4></a><p style=" text-align: justify; ">MyCell (Pvt) Ltd is a premier mobile phones & accessories company in Sri Lanka. We are dealers of mobile phones & other related accessories
				</p></div>
				<div id="cntcUs" style="padding-left: 38px; width: 35%;padding-right: 10px"><a class="bottomlinks2" href="./ContactUs.php"><h4 style="text-align: center">Contact Us</h4></a><p style=" text-align: justify;">
					MyCell (Pvt) Ltd, No 02, Ground Floor, Liberty Plaza, Colombo 03.
<pre>Phone: +94 (0) 2333777 / +94 77 7883333
Fax  : +94 (0) 11 23337800
Email: info@cellmobile.com</pre>
				</p></div>

			</div>

		<footer id="foot1" style="background-color: #989898; color:#000600;; text-align: center; margin-top: 10px">Copyright 2017 - <?php echo date("Y"); ?> &copy; ALPHA Team ( Ranmal Dewage, Tenusha Guruge, Vimukthi Rajapaksha, Aravinda Kulasooriya ). All Rights Reserved.</footer>

</div>
</body>
</html>
