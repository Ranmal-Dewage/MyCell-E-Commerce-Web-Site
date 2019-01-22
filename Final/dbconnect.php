<?php

	$con = mysqli_connect('localhost','root','','ITA');
	
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to server". mysqli_connect_error();
	}

?>
