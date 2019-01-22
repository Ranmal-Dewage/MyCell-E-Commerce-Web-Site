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
		<div style="display: flex">
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
					$id= $_SERVER["QUERY_STRING"];
					$name=" "; $manufact=" "; $nprice=" "; $prid=" ";
					$nameerr=" "; $manufacterr=" "; $npriceerr=" "; $priderr=" ";

					$result=mysqli_query($con, "SELECT* FROM products WHERE pID='".$id."'");

					echo "<form name='editForm' method='POST' action='admin_edit.php' enctype='multipart/form-data'><table align='center'><caption><h2>Edit</h2></caption>";
					while($row=mysqli_fetch_array($result)){
						echo
							"<tr>
								<td><table cellspacing='26'>
										<tr>
											<td>Product ID: </td><td><input type='text' name='prID' value='".$row[0]."' size='50%' style='height: 35px;'></td>
										</tr>
										<tr>
											<td>Product Name: </td><td><input type='text' name='pname' value='".$row[1]."' size='50%' style='height: 35px;'></td>
										</tr>
										<tr>
											<td>Manufacturer: </td><td><input type='text' name='manu' value='".$row[2]."' size='50%' style='height: 35px;'></td>
										</tr>
										<tr>
											<td>Price: </td><td><input type='text' name='price' value='".$row[3]."' size='50%' style='height: 35px;'></td>
										</tr>
										<tr>
											<td>Quantity :</td><td><input type='text' name='qty' size='50%' value='".$row[5]."' style='height: 35px;'></td>
										</tr>
										<tr>
											<td>Change Image:</td>
											<td><input type='file' name='imgfile' id='imgfile'></td>
										</tr>
										<tr>
											<td></td>
											<td><input type='submit' name='sbtn' value='Save'>
												<input type='reset' name='rbtn' value='Reset'>
											</td>
										</tr>
									</table>
								</td>
								<td><img src=".$row[4]." width='300px' height='350px' style='padding-left: 15%;'></td>
							</tr>
						</table>";
					}
						if(isset($_POST['sbtn'])){


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
												if($_FILES["imgfile"]["error"]==4){
													mysqli_query($con,"UPDATE products SET name='$name',manufact='$manufact', price='$nprice', quantity='$qty' WHERE pID='$prid'");

												}
												else{
													$path="./Products-Phones/". basename($_FILES["imgfile"]["name"]);
													mysqli_query($con,"UPDATE products SET name='$name',manufact='$manufact', price='$nprice', Image='$path', quantity='$qty' WHERE pID='$prid'");

												}

												echo "<script type='text/javascript'>alert('Item Updated Successfully !');location.replace('admin_index.php')</script>";

											}
											else echo "<script type='text/javascript'>alert('Quantity Can Not be Empty !'); history.go(-1);</script>";
										}
										else echo '<script type="text/javascript">alert("Price Can Not be Empty !"); history.go(-1);</script>';
									}
									else echo '<script type="text/javascript">alert("Manufacturer Can Not be Empty !"); history.go(-1);</script>';
								}
								else echo '<script type="text/javascript">alert("Name Can Not be Empty !"); history.go(-1);</script>';
							}
							else echo '<script type="text/javascript">alert("Product ID Can Not be Empty !"); history.go(-1);</script>';
						}

					mysqli_close($con);
				?>
			</div>
		</div>
	</body>
</html>
