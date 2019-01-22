<?php
	session_start();
	$User=$_SESSION["username"];

	include('dbconnect.php');

	$result1=mysqli_query($con,"SELECT * FROM cart WHERE user='$User'");

		//$row=mysqli_fetch_array($result1);
		$card=$_POST["cno"];
    $exp=$_POST["expdate"];
    $scode=$_POST["scode"];


		while($row=mysqli_fetch_array($result1)){
            $tot=$row[4]*$row[5];
            $result2="INSERT INTO payment_history VALUES('$User', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$card', '$exp', '$scode', '$tot')";
            mysqli_query($con,$result2);
        }
        mysqli_query($con, "DELETE FROM cart WHERE user='$User'");


	header("Refresh:0 ; url=./index.php");
	echo"<script>alert('Transaction Successful');</script>";

	mysqli_close($con);
?>
