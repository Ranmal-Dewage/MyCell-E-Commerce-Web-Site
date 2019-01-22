<?php
	if(empty($_SESSION))
	{
		session_start();
	}
	unset ($_SESSION['username']);
	session_destroy();

	header("location: ../Web_Site_New_3_1/index.php");
	exit();
	sqli_close($con);
?>
