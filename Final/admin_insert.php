<?php
		include('../Web_Site_New_3_1/dbconnect.php');

		if(empty($_SESSION))
		{
			session_start();
		}
?>

<!DOCTYPE html>
<html>
	<head>

		<title>MyCell Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="./HomePage/background.css">

	</head>

	<body>

		<div class="head">
			<img src="./Login/company_logo.png" width="10%" height="90%" style="padding-top: 0.5%; padding-left: 5%; padding-right: 80%;">
			<a href="../Web_Site_New_3_1/Profile.php" class="user"><p><?php echo $_SESSION['username'].' '.'<img src="./Index/t1.gif" height="15%" width="10%">'?></p></a>
		</div>
		<div style="display: flex;">
			<div id="sidebar">
				<div style="padding-top: 5%;">
					<div>
						<form method="POST" action="admin_search.php">
							<input type="text" name="search_1" class="search" style="width: 55%; border: solid 3px #2E343D; border-radius: 5px;">
							<input type="submit" value="Search" style="width: 25%; background-color: #2E343D; border: solid 3px #2E343D; color: white; cursor: pointer;">
						</form>
					</div>
				</div>
				<div style="padding-top: 10%; color: white; font-size: larger; text-align: justify; padding-left: 12%; font-weight: lighter; padding-bottom: 5%;"><img src="./Index/orders.png" width="8%" height="3%" style="padding-right: 4%;">eCommerce</div>
				<div class="sidebutton"><a href="admin_index.php"><img src="./Index/allProducts.png" width="9%" height="60%" style="padding-right: 3%;">View Products</a></div>
				<div class="sidebutton"><a href="admin_insert.php"><img src="./Index/product.png" width="8%" height="60%" style="padding-right: 4%;">Add Products</a></div>
				<div class="sidebutton"><a href="admin_Customers.php"><img src="./Index/dashboard.png" width="8%" height="55%" style="padding-right: 4%;">Customers</a></div>
				<div class="sidebutton"><a href="admin_Payments.php"><img src="./Index/payment.png" width="8%" height="55%" style="padding-right: 4%;">Payment History</a></div>
				<div class="sidebutton"><a href="logout.php"><img src="./Index/logout.png" width="9%" height="60%" style="padding-right: 4%;">Log Out</a></div>
			</div>

			<div id="content">
				<?php
					$name=" "; $manufact=" "; $nprice=" "; $msg="Add New Item"; $prid=" "; $img=" "; $qty=" ";
					$nameerr=" "; $manufacterr=" "; $npriceerr=" "; $priderr=" "; $imgerr=" ";


					echo "<form name='insertForm' method='POST' action='admin_insert.php' enctype='multipart/form-data'><table align='center' cellspacing='25'><col width='130'><caption style='padding-top: 2%'><h2>".$msg."</h2></caption>
							<tr>
								<td>Product ID :</td><td><input type='text' name='prID' size='75%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Product Name :</td><td><input type='text' name='pname' size='75%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Manufacturer :</td><td><input type='text' name='manu' size='75%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Price :</td><td><input type='text' name='price' size='75%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Quantity :</td><td><input type='text' name='qty' size='75%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Image: </td><td><input type='file' name='imgfile' id='imgfile'></td>
							</tr>
							<tr><td></td>
								<td><input type='submit' name='sbtn' value='Save'>
									<input type='reset' name='rbtn' value='Reset'>
								</td>
							</tr></table>";
						if(isset($_POST['sbtn'])){
							$target="./Products-Phones/";
							$path=$target. basename($_FILES["imgfile"]["name"]);

							if(!($path == "./Products-Phones/")){

							if(!empty($_POST['prID'])){
								$prid=$_POST['prID'];

								if(!empty($_POST['pname'])){
									$name=$_POST['pname'];

									if(!empty($_POST['manu'])){
										$manufact=$_POST['manu'];

										if(!empty($_POST['price'])){
											$nprice=$_POST['price'];

											if(!empty($_POST['qty'])){
												$qty=$_POST['qty'];

												if(!mysqli_query($con, "INSERT INTO products VALUES ('$prid', '$name', '$manufact',$nprice, '$path',$qty, NULL)")){
														echo '<script type="text/javascript">alert("Error in Inserting Items to Database !")</script>';
												}
												else{
												mysqli_query($con, "INSERT INTO products VALUES ('$prid', '$name', '$manufact',$nprice, '$path',$qty, NULL)");
												echo '<script type="text/javascript">alert("Item Added Successfully !")</script>';
											}

											}
											else echo '<script type="text/javascript">alert("Quantity Can Not be Empty !")</script>';
										}
										else echo '<script type="text/javascript">alert("Price Can Not be Empty !")</script>';
									}
									else echo '<script type="text/javascript">alert("Manufacturer Can Not be Empty !")</script>';
								}
								else echo '<script type="text/javascript">alert("Name Can Not be Empty !")</script>';
							}
							else echo '<script type="text/javascript">alert("Product ID Can Not be Empty !")</script>';
						}
						else echo '<script type="text/javascript">alert("Image Field Can Not be Empty !")</script>';
					}
					mysqli_close($con);
				?>
			</div>
		</div>
	</body>
</html>
