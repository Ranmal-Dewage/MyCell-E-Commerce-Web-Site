<?php
	include('dbconnect.php');
	if(empty($_SESSION))
	{
		session_start();
 	}
	if(isset($_SESSION['username']))
	{
		header("location: ./index.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>

	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyCell(Pvt) Ltd</title>
	<style>
		.inputs
		{
			height: 30px;
		}
		a.l1:link
		{
            color:white;
            text-decoration:none;
		}
		a.l1:visited
		{
            color:white;
		}
		a.l1:hover
		{
            color:white;
		}
		#main
		{
			height: 300px;
			width: 595px;
			background-color:transparent;
			position:fixed;
			left:10%;
			top:20%;
			box-shadow: 0px 0px 10px black;
		}
		#sub1
		{
			background-color:transparent;
			color:white;
		}
		#sub2
		{
			background-color:transparent;
			color:white;
		}
		body
		{
			background-image: url("./Login/Login.jpg");
			background-size: 100%;
			background-repeat: no-repeat;
		}
	</style>
	</head>

	<body>
		<div>
			<table id="main" border="0">
				<tr>
					<td>
					<form name = "myform1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<table id="sub1" border="0" cellspacing="10" cellpadding="5">
							<tr><td><pre><h5>Aleady have an Account?</h5><h3>LOGIN</h3></pre></td></tr>
							<tr>

								<td colspan='2'><input class="inputs" type="text" name="username" placeholder="Username" style='height:40px; width:200px;'/></td>
							</tr>
							<tr>

								<td colspan='2'><input class="inputs" type="password" name="password" placeholder="Password" style='height:40px; width:200px;'/></td>
							</tr>
							<tr>
								<td colspan="2"><center><input class="buttons" type="submit" name="submit" value="Submit" style='width: 80px; height: 30px; background-color: blue; color:white; ' />
												<input class="buttons" type="reset" name="reset" value="Reset" style='width: 80px; height: 30px; background-color: blue; color:white;' /></center></td>
							</tr>
							<?php
								if(isset($_POST['submit']))
		 						{
									$username = $_POST['username'];
									$password = $_POST['password'];

									if(empty($username) || empty($password))
									{
										$error = "<tr><td colspan='2' style ='color:#fb9a9a'>Username or Password Empty!</td><tr>";
										echo $error;
									}
									else
									{
										$result = mysqli_query($con,"SELECT * FROM account WHERE username = '$username' AND password = '$password'");
										if(mysqli_query($con,"SELECT * FROM account WHERE username = '$username' AND password = '$password'"))
										{
											$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
											$count = mysqli_num_rows($result);

											if($count == 1)
											{
                        	if($row['username']=='Admin' && $row['password']==$password){
													$_SESSION['username'] = 'Admin';
													if (isset($_POST['submit']))
													{
														echo "<script>window.location.href='../Final/admin_index.php';</script>";
													}
												}
												else if($row['username']==$username && $row['password']==$password) {
												$_SESSION['username'] = $username;

												if (isset($_POST['submit']))
												{
													echo "<script>window.location.href='./index.php';</script>";
												}
											}
											else{
												$error = "<tr><td colspan='2' style ='color:#fb9a9a'>Invalid Username or Password</td><tr>";
												echo $error;
											}

											}
											else
											{
												$error = "<tr><td colspan='2' style ='color:#fb9a9a'>Invalid Username or Password</td><tr>";
												echo $error;
											}
										}
										else
										{
											echo "Error : ".mysqli_error($con);
										}
									}
								}
							?>
						</table>
					</form>
					</td>
					<td>
					<form name="myform2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<table id="sub2" border="0" cellspacing="10">
							<tr><td><pre><h5>Dont have an Account?</h5><h3>REGISTER</h3></pre></td></tr>
							<tr>
								<td><input class="inputs" type="text" name="fname" placeholder="First Name" style='height:40px; width:190px;'/></td>
								<td><input class="inputs" type="text" name="lname" placeholder="Last Name" style='height:40px; width:190px;'/></td>
							</tr>
							<tr>
								<td><input class="inputs" type="text"  name="username1" placeholder="Username" style='height:40px; width:190px;'/></td>
							</tr>
							<tr>
								<td><input class="inputs" type="text" name="email" placeholder="E-mail" style='height:40px; width:190px;'/></td>
							</tr>
							<tr>
								<td><input class="inputs" type="password" name="password1" placeholder="Password" style='height:40px; width:190px;'/></td>
								<td><input class="inputs" type="password" name="password2" placeholder="Confirm Password" style='height:40px; width:190px;'/></td>
							</tr>
							<tr>
								<td colspan="2"><center><input class="buttons" type="submit" name="submit1" value="Register" style='width: 80px; height: 30px; background-color: blue; color:white; '/>
												<input class="buttons" type="reset" name="reset1" value="Reset" style='width: 80px; height: 30px; background-color: blue; color:white; '/></center></td>
							</tr>
							<?php
								if(isset($_POST['submit1']))
								{

									$username1 = $_POST['username1'];
									$password1 = $_POST['password1'];
									$password2 = $_POST['password2'];
									$email = $_POST['email'];
									$fname = $_POST['fname'];
									$lname = $_POST['lname'];

									$checkQuery="SELECT * FROM account WHERE username = '$username1' ";
									$res=mysqli_query($con,$checkQuery);
									$numRows=mysqli_num_rows($res);

									if(empty($username1) || empty($password1) || empty($password2) || empty($email) || empty($fname) || empty($lname))
									{
										$error = "<tr><td colspan='2' style ='color:#fb9a9a'>Please Fill All Fields!</td></tr>";
										echo $error;
									}
									else if($password1 <> $password2)
									{
										echo $erro="<tr><td colspan='2' style ='color:#fb9a9a'>Password Don't Match</td></tr>";
									}
									else if($numRows == 1){
											echo $erro="<tr><td colspan='2' style ='color:#fb9a9a'>Username Already Exists</td></tr>";
									}
									else
									{
										$temp_query = "SELECT * FROM account";
										$result = mysqli_query($con,$temp_query);
										$count = mysqli_num_rows($result);
										$count++;
										$query = "INSERT INTO account VALUES ('$count','$username1','$password1', '$fname', '$lname', NULL, '$email', NULL, NULL)";
										if(mysqli_query($con,$query))
										{
											$_SESSION['username'] = $username1;
											echo "<script> alert('Registered Successfully!');
                             window.location.href='index.php';</script>";
										}
										else
										{
											echo $erro="<tr><td colspan='2' style ='color:#fb9a9a'>Cannot Enter Values to Database</td></tr>";
										}
									}
								}
							?>
						</table>
					</form>
					</td>
				</tr>
				<tr>
					<td colspan="2"><a class="l1" href="./resetpass.php"><center>Forgot Password?</center></a></td>
				</tr>
			</table>
		</div>
		<?php
			mysqli_close($con);
		?>
	</body>
</html>
