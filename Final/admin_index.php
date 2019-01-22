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
					$name=" "; $manufact=" "; $price=" "; $id=" ";
					
					$sql= 'SELECT * FROM products';
					$result=mysqli_query($con,$sql);

					echo '<table style="text-align: center; width: 70%; padding-top: 2%;" align="center" cellspacing="10"><th>Image</th><th>ID</th><th>Name</th><th>Manufacturer</th><th>Price</th><th>Quantity</th><th>Edit</th><th>Delete</th>';
					while($row=mysqli_fetch_array($result)){
						echo
						'<tr>
							<td><img src='.$row[4].' width="60px" height="60px"></td>
							<td>'.$row[0].'</td>
							<td>'.$row[1].'</td>
							<td>'.$row[2].'</td>
							<td>'.$row[3].'</td>
							<td>'.$row[5].'</td>';
							echo "<td style='width:10%'>";
							echo '<a href=admin_edit.php?'.$row[0];
							echo '><img src="./Index/edit.png" width="35%" height="10%"></a></td>';

							echo "<td style='width:10%'>";
							echo '<a href=admin_remove.php?'.$row[0];
							echo '><img src="./Index/remove.png" width="25%" height="5%"></a></td>
						</tr>';
					}
					echo '</table>';

					mysqli_close($con);
				?>
			</div>
		</div>
	</body>
</html>
