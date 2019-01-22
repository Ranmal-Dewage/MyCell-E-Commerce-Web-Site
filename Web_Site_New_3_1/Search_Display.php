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

		<title>MyCell(Pvt) Ltd</title>
	</head>
	<body>

					<?php
						include('dbconnect.php');
						include('Header.php');
					?>
					<br>
			<!-- main div -->
			<div style="border-top:2px solid #0e2050;border-bottom:2px solid #0e2050;margin-left:15%; margin-right:15%; ">
					<?php
						if(!isset($_SESSION['username']))
						{

						$search=$_POST['n_search'];
						$result=mysqli_query($con," SELECT * FROM products WHERE name LIKE '%$search%' OR d_name LIKE '%$search%' OR manufact LIKE '%$search%' ");

						if(!$row=mysqli_fetch_array($result)){
						echo "<p style='color:#1b1b1d'><b>No Result Found For Your Search!!!!! Try Something Else!!!</b></p>";
						}
						else{

						do{
						echo"
						<div style='display:flex; border-top:2px solid #0e2050; border-bottom:2px solid #0e2050; border-left:4px solid #0e2050; border-right:4px solid #0e2050; background-color:#e7e8ed'>

						<div style='width:30%; height:200px; margin:10px'><img src='".$row['Image']."' height='100%' width='100%'></div>

						<div style='width:40%; color:#2b2d33'>
						<div><h4>".$row['name']."</h4></div>
						<div><h4>".$row['pID']."</h4></div>
						<div><h4>".$row['manufact']."</h4></div>
						<div><h3> Rs.".$row['price']."</h3></div>
						</div>

						<div style='width:40%;'>
						<a href='Ara.php'><img src='add-cart.png'></a>
						</div>

						</div>";
						}while($row=mysqli_fetch_array($result));

						}

						$num = mysqli_num_rows($result);
						//upper main div close here
						echo "</div><p style='color:#1b1b1d; margin-left: 15%'><b>$num Matching Results Are Found !!!!!</b></p>";
						mysqli_close($con);

						}


						else{
	 					$search=$_POST['li_search'];
						$result=mysqli_query($con," SELECT * FROM products WHERE name LIKE '%$search%' OR d_name LIKE '%$search%' OR manufact LIKE '%$search%' ");

						if(!$row=mysqli_fetch_array($result)){
						echo "<p style='color:#1b1b1d'><b>No Result Found For Your Search!!!!! Try Something Else!!!</b></p>";
						}

						else{
						do{
						echo"<div style='display:flex; border-top:2px solid #0e2050; border-bottom:2px solid #0e2050; border-left:4px solid #0e2050; border-right:4px solid #0e2050; background-color:#e7e8ed'>

						<div style='width:30%; height:200px; margin:10px'><img src='".$row['Image']."' height='100%' width='100%'></div>

						<div style='width:40%; color:#2b2d33'>
						<div><h4>".$row['name']."</h4></div>
						<div><h4>".$row['pID']."</h4></div>
						<div><h4>".$row['manufact']."</h4></div>
						<div><h3> Rs.".$row['price']."</h3></div>
						</div>

						<div style='width:40%;'>
						<a href='cart_Action.php?".$row['pID']."'><img src='add-cart.png'></a>
						</div>

						</div>";
						}while($row=mysqli_fetch_array($result));

						}
						$num = mysqli_num_rows($result);
						//upper main div close here
						echo "</div> <p style='color:#1b1b1d; margin-left:15%'><b>$num Matching Results Are Found !!!!!</b></p>";
						mysqli_close($con);
					}

					?>


	<footer id="foot1" style="background-color: #373737; color:#c7c7c7; text-align: center; margin-top: 10px">Copyright 2017 - <?php echo date("Y"); ?> &copy; ALPHA Team ( Ranmal Dewage, Tenusha Guruge, Vimukthi Rajapaksha, Aravinda Kulasooriya ). All Rights Reserved.</footer>
	</body>
</html>
