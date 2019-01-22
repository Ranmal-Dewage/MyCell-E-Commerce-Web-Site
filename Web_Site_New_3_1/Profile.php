<?php
	include("dbconnect.php");

	if(empty($_SESSION))
	{
		session_start();
	}
		$user1 = $_SESSION['username'];
		$query2 = "SELECT * FROM account WHERE username = '$user1'";
		$result1 = mysqli_query($con,$query2);

		if(mysqli_query($con,$query2))
		{
			$row = mysqli_fetch_array($result1);
		}
		else
		{
			echo "Error :". mysqli_error($con);
		}

?>

<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MyCell(Pvt) Ltd</title>
		<style>
			.table1{
						width: 260px;
						height: 35px;
						margin:20px;
					}
			#main{
					height: 500px;
					width: 595px;
					background-color:transparent;
					position:fixed;
					left:25%;
					top:15%;
					box-shadow: 0px 0px 10px black;

				 }
			body{
					background-image: url("./Login/Pro.jpg");
					color:white;
				}
		</style>

	</head>

	<body>

	<div>
		<form name="myForm1" method="post" action= "<?php echo $_SERVER['PHP_SELF'] ?>">
						<table id = "main">
							<tr>
								<td><b>Username : <?php echo $_SESSION['username']; ?></b></td>
							</tr>
							<tr>
								<td><sup>Firstname :</sup><input type="text" name = "fname" placeholder="First Name" value ="<?php echo $row['fname']; ?>" class="table1" style='height:40px; width:300px;'></td>
								<td><sup>Lastname :</sup><input type="text" name = "lname" placeholder="Last Name" class="table1" value ="<?php echo $row['lname']; ?>" style='height:40px; width:300px;'></td>
							</tr>
							<tr>
								<td><sup>E-mail :</sup><input type="text" name = "email" placeholder="E-mail Address" class="table1" value ="<?php echo $row['email']; ?>" style='height:40px; width:300px;'></td>
								<td><sup>Phone No :</sup><input type="text" name = "mobNo" placeholder="Phone Number" class="table1" value ="<?php echo $row['mobileNo']; ?>" style='height:40px; width:300px;'></td>
							</tr>
							<tr>
								<td><sup>State :</sup><input type="text" name = "state" placeholder="State" class="table1" value ="<?php echo $row['state']; ?>" style='height:40px; width:300px;'></td>
								<td><sup>Address :</sup><input type="text" name = "address" placeholder="Address" class="table1" value ="<?php echo $row['address']; ?>" style='height:40px; width:300px;'></td>
							</tr>
							<tr>
								<td colspan = "2"><center><input type="submit" name="submit3" value="Update" style="width: 100px; height: 40px; background-color: blue; color:white; margin-left: 3%"><input type="submit" name="submit4" value="Cancel" style="width: 100px; height: 40px; background-color: blue; color:white; margin-left: 3%"></center></td>
							</tr>
						</table>
		</form>
	</div>
	</body>
</html>

<?php
	if(isset($_POST['submit3']))
	{
		$user = $_SESSION['username'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$mobNo = $_POST['mobNo'];
		$state = $_POST['state'];
		$address = $_POST['address'];



		$query = "UPDATE account SET fname = '$fname', lname = '$lname', mobileNo = '$mobNo', email = '$email', state = '$state', address = '$address'  WHERE username = '$user'";
		$result = mysqli_query($con,$query);
		if(empty($mobNo)){
			echo "<b><center style ='color:#fb9a9a'>Invalid Phone Number Please Re-Enter</center></b>";
		}
		else if(mysqli_query($con,$query))
		{
			if($_SESSION['username'] =='Admin'){
			echo "<script> alert('Relavent Fields Updated Successfully!');
						   window.location.href='../Final/admin_index.php';</script>";
				}
				else{
					echo "<script> alert('Relavent Fields Updated Successfully!');
								   window.location.href='index.php';</script>";
				}
		}
		else
		{
			echo "Error :". mysqli_error($con);
		}

	}
	else if(isset($_POST['submit4']))
	{
        if($_SESSION['username'] =='Admin'){
					echo "<script>window.location.href='../Final/admin_index.php';</script>";
        }
        else{
					echo "<script>window.location.href='index.php';</script>";
        }
	}
?>
<?php
	mysqli_close($con);
?>
