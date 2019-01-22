<html>
	<head>
		<style>
			.head{
				height: 8%;
				background-color: #2E343D;
				display: flex;
			}
			#sidebar{
				width: 18%;
				height: 100%;
				background-color: #637283;
				text-align: center;
				
			}
			.sidebutton{
				background-color: transparent;
				width: 100%;
				height: 5%;
				text-align: justify;
				color: white;
				text-decoration: none;
				padding-top: 5%;
				padding-left: 20%;
				
			}
			a{
				color: white;
				text-decoration: none;
			}
			.sidebutton:hover{
				background-color: #2E343D;
			}
			#content{
				background-color: #DDE0E4;
				width: 82%;
				height: 100%;
				
			}
			th{
				border-bottom: solid 1px;
			}
			::-webkit-input-placeholder{
				color: white;
				font-size: medium;
			}
			.search{
				background-color: transparent;
				width: 75%;
				border-style: none;
				font-size: medium;
				color: white;
			}
		</style>
	</head>
	<body>
		<div class="head">
			<img src="./Login/company_logo.png" width="8%" height="75%" style="padding-top: 0.5%; padding-left: 5%; padding-right: 60%">
			<a href="./profile.php"><img src="./Index/user.png" width="20%" height="80%" style="padding-top: 1.5%; padding-left: 100%"></a>
		</div>
		<div class="body_content" style="display: flex;">
			<div id="sidebar">
				<div style="display: flex; padding-top: 5%;"><div><input type="text" name="search" placeholder="Search..." class="search" style="width: 70%; border-bottom: solid 1px;">
				<a href="/search.php/"><img src="./Index/search.png" width="6%" height="2%" style="padding-top: 5%;"></a></div></div>
				<div style="padding-top: 10%; color: white; font-size: larger; text-align: justify; padding-left: 12%; font-weight: lighter; padding-bottom: 5%;"><img src="./Index/orders.png" width="8%" height="3%" style="padding-right: 4%;">eCommerce</div>
				<div class="sidebutton"><a href=""><img src="./Index/dashboard.png" width="8%" height="55%" style="padding-right: 4%;">Dashboard</a></div>
				<div class="sidebutton"><a href="insert.php"><img src="./Index/product.png" width="8%" height="60%" style="padding-right: 4%;">Add Products</a></div>
				<div class="sidebutton"><img src="./Index/allProducts.png" width="9%" height="60%" style="padding-right: 3%;"><a href="insert.php">View Products</a></div>
				<div class="sidebutton"><a href="insert.php"><img src="./Index/orders.png" width="8%" height="55%" style="padding-right: 4%;">Orders</a></div>
				<div class="sidebutton"><a href="insert.php"><img src="./Index/payment.png" width="8%" height="55%" style="padding-right: 4%;">Payments</a></div>
				<div class="sidebutton"><a href="insert.php"><img src="./Index/logout.png" width="9%" height="60%" style="padding-right: 4%;">Log Out</a></div>
			</div>
			<div id="content">
				<?php 
					$name=" "; $manufact=" "; $price=" "; $id=" ";

					$con = mysqli_connect('localhost', 'root', '', 'ITA');
					if(mysqli_connect_errno()){
						echo 'failed to connect to MySQL: '.mysqli_connect_error();
					}
					$sql= 'select* from products';
					$result=mysqli_query($con,$sql);
					$num=mysqli_num_rows($result);
					echo '<table style="text-align: center; width: 70%;"><th>ID</th><th>Name</th><th>Manufacturer</th><th>Price</th><th>Edit</th><th>Delete</th>';
					while($row=mysqli_fetch_array($result)){
						echo 
						'<tr>
							<td>'.$row[0].'</td>
							<td>'.$row[1].'</td>
							<td>'.$row[2].'</td>
							<td>'.$row[3].'</td>';
							echo "<td style='width:10%'>";
							echo '<a href=edit.php?'.$row[0]; 
							echo '><img src="./Index/edit.png" width="35%" height="10%"></a></td>';

							echo "<td style='width:10%'>";
							echo '<a href=remove.php?'.$row[0]; 
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