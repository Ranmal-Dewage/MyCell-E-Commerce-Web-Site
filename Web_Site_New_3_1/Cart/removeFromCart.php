<?php

  session_start();

  include('../dbconnect.php');

	$model=$_SERVER["QUERY_STRING"];
	$user=$_SESSION['username'];

	$que="DELETE FROM cart WHERE model_no='$model' AND user='$user'";

	mysqli_query($con,$que);

	if(!mysqli_query($con,$que)){
		die('Error :'.mysqli_error($con));
	}

	header("Refresh:0 ; url=../Cart.php");

	mysqli_close($con);
?>
