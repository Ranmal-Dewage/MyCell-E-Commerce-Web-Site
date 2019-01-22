<?php

	session_start();
	$user=$_SESSION['username'];

		include('dbconnect.php');


		$itemSelected=$_SERVER['QUERY_STRING'];

		$result1=mysqli_query($con,"SELECT * FROM products WHERE pID ='$itemSelected'");
		if(!$result1){
		die('Error :'.mysqli_error($con));
		}

		$row=mysqli_fetch_array($result1);


		$pID=$row['pID'];
		$name=$row['name'];
		$Image=$row['Image'];
		$price=$row['price'];
		$qty=$row['quantity'];


		//$result2="INSERT INTO `cart` (`user`, `model_no`, `model_name`, `image`, `price`, `quantity`) VALUES ('$user', '$pID', '$name', '$Image', '$price', '$qty')";
    mysqli_query($con, "INSERT INTO cart VALUES ('".$user."', '".$pID."', '".$name."', '".$Image."', '".$price."', '1')");


		//$result2="INSERT INTO cart VALUES('$user','$pID','$name','$Image','$price','$qty')";
		//mysqli_query($con,$result2);

	header("location: Cart.php");

	mysqli_close($con);
?>
