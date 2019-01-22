<?php
	if(empty($_SESSION))
	{
		session_start();
	}
	unset ($_SESSION['username']);
	session_destroy();

	header("location: index.php");
	exit();
	sqli_close($con);
?>