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
			<img src="./Login/company_logo.png" width="8%" height="75%" style="padding-top: 0.5%; padding-left: 5%; padding-right: 80%;">
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

					$uname=" "; $pwd=" "; $fname=" "; $lname=" "; $mobno=" "; $mail=" "; $state=" "; $cusno=" ";

					$id= $_SERVER["QUERY_STRING"];

					$result=mysqli_query($con, "SELECT* FROM account WHERE username='".$id."'");

					echo "<form name='editForm' method='POST' action='admin_cus_edit.php'><table align='center' cellspacing='20'><caption style='padding-top: 3%'><h2>Edit</h2></caption>";

					while($row=mysqli_fetch_array($result)){
						echo "<tr>
								<td>Customer No: </td><td><input type='text' name='cusNo' value='".$row[0]."' size='50%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Username: </td><td><input type='text' name='uname' value='".$row[1]."' size='50%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Password: </td><td><input type='text' name='pwd' value='".$row[2]."' size='50%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>First Name: </td><td><input type='text' name='fname' value='".$row[3]."' size='50%' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Last Name:</td><td><input type='text' name='lname' size='50%' value='".$row[4]."' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>Mobile Number:</td><td><input type='text' name='mobno' size='50%' value='".$row[5]."' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>E-mail:</td><td><input type='text' name='mail' size='50%' value='".$row[6]."' style='height: 35px;'></td>
							</tr>
							<tr>
								<td>State:</td><td><input type='text' name='state' size='50%' value='".$row[7]."' style='height: 35px;'></td>
							</tr>
							<tr>
								<td></td>
								<td><input type='submit' name='sbtn' value='Save'>
									<input type='reset' name='rbtn' value='Reset'>
								</td>
							</tr>
						</table>";
					}
						if(isset($_POST['sbtn'])){


							if(!empty($_POST['cusNo'])){
								$cusNo=$_POST['cusNo'];

								if(!empty($_POST['uname'])){
									$uname=$_POST['uname'];

									if(!empty($_POST['pwd'])){
										$pwd=$_POST['pwd'];

										if(!empty($_POST['fname'])){
											$fname=$_POST['fname'];

											if(!empty($_POST['lname'])){
												$lname=$_POST['lname'];

												if(!empty($_POST['mobno'])){
													$mobno=$_POST['mobno'];

													if(!empty($_POST['mail'])){
														$mail=$_POST['mail'];

														if(!empty($_POST['state'])){
															$state=$_POST['state'];

															mysqli_query($con,"UPDATE account SET cusNo='$cusNo', password='$pwd', fname='$fname', lname='$lname', mobileNo='$mobno', email='$mail', state='$state' WHERE username='$uname'");

															echo '<script type="text/javascript">alert("User Deatails Updated Successfully !"); location.replace("admin_Customers.php")</script>';
														}
														else echo "<script type='text/javascript'>alert('State Can not be Empty !'); history.go(-1);</script>";

													}
													else echo "<script type='text/javascript'>alert('E-mail Can not be Empty !'); history.go(-1);</script>";

												}
												else echo "<script type='text/javascript'>alert('Mobile Number Can not be Empty !'); history.go(-1);</script>";
											}
											else echo "<script type='text/javascript'>alert('Last Name Can not be Empty !'); history.go(-1);</script>";
										}
										else echo '<script type="text/javascript">alert("First Name Can not be Empty !"); history.go(-1);</script>';
									}
									else echo '<script type="text/javascript">alert("Password Can not be Empty !"); history.go(-1);</script>';
								}
								else echo '<script type="text/javascript">alert("Username Can not be Empty !"); history.go(-1);</script>';
							}
							else echo '<script type="text/javascript">alert("Customer Number Can not be Empty !"); history.go(-1);</script>';
						}
					mysqli_close($con);
				?>
			</div>
		</div>
	</body>
</html>
