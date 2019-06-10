<?php

	include('connection.php');

	$id_sale = $_GET['id_sale'];

	mysqli_query($conn, "DELETE FROM sales WHERE id_sale='$id_sale'");

	echo"<script>window.open('salesManagement.php','_self')</script>";


?>
