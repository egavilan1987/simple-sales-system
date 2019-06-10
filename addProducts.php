<!DOCTYPE html>
<html>
	<head>
		<title>Simple Sale System</title>		
	</head>  
<body>
	<ul>
	  <a href="index.html">Home</a>&nbsp; 
	  <a href="newSales.php">New Sales</a>&nbsp;
	  <a href="salesManagement.php"> Sales Management</a>&nbsp; 
	  <a href="addClients.php">Add Clients</a>&nbsp; 
	  <a href="clientsManagement.php">Clients Management</a>&nbsp; 
	  <a href="productsManagement.php">Products Management</a>
	</ul>

	<form method='post' action='addProducts.php'>
		<table width='500' border='3' align='center'>
			<tr>
				<th bgcolor='silver' colspan='2'>Products Registration Form</h>
			</tr>
			<tr >
				<td align='right'>Name:</td>
				<td>
					<input type='text' name='name' maxlength="50" required >
				</td>
			</tr>
			<tr>
				<td align='right'>Description:</td>
				<td>
					<textarea type='text' name='description' rows="4" maxlength="500" required ></textarea>
				</td>
			</tr>
			<tr>
				<td align='right'>Quantity :</td>
				<td>
					<input type='number' name='quantity' min = 0 required>
				</td>
			</tr>
			<tr>
				<td align='right'>Price: </td>
				<td>
					<input type='number' name='price' min = 0 step=".01" required >
				</td>
			</tr>
			<tr>
				<td align='center' colspan='6'>
					<input type='submit' name='submit' value='Submit'>
				</td>
			</tr>  
		</table>  
	</form>
</body>

</html>


<?php

	$conn = mysqli_connect("localhost","root","","sales");

	if(!$conn){
		die("Connection failed: ".mysql_connect_error());
	}

	if(isset($_POST['submit']))
	{

		$name = $_POST['name'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
     
	$sql = "INSERT INTO products(name, description, quantity, price, created_date) VALUES('$name', '$description','$quantity','$price', NOW())";

	$query=mysqli_query($conn,$sql);

	if($query){
		echo "<center><b>New Product Details:</b></center><br>";
		echo 
			"<table align='center' border='4'>
				</tr>
				<tr bgcolor='silver' align='center'>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
				<tr>
					<td>$name</td>
					<td>$description</td>
					<td>$quantity</td>
					<td>$price</td>
				</tr>
			</table>";
			}
	}
?>

