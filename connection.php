<?php

	$conn = mysqli_connect("localhost","root","","sales");

	if(!$conn){
		die("Connection failed: ".mysql_connect_error());
	}

?>
