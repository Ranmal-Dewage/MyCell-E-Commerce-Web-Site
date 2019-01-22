<?php

	session_start();

	include('../dbconnect.php');

	$model_no=$_SERVER["QUERY_STRING"];
	$nquantity=$_POST['txtbox'];
  $user=$_SESSION['username'];


	$qty=mysqli_query($con,"SELECT quantity FROM products WHERE pID='$model_no'");
	$qty=mysqli_fetch_array($qty);

	if($qty['quantity']>=$nquantity){
	$que="UPDATE cart SET quantity=$nquantity WHERE model_no='$model_no' AND user='$user'";
	mysqli_query($con,$que);

		if(!mysqli_query($con,$que)){
			die('Error :'.mysqli_error($con));
		}
	}
	mysqli_close($con);

	header("Refresh:0 ; url=../Cart.php");
?>
