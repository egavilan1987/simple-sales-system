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
	  <a href="addProducts.php">Add Products</a>&nbsp; 
	  <a href="productsManagement.php">Products Management</a>
	</ul>

	<?php

		include('connection.php');

		if(isset($_GET['id_client'])){

		$id_client = $_GET['id_client'];

		$sql = "SELECT * FROM clients WHERE id_client = '$id_client'";
		$query = mysqli_query($conn, $sql)or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query)){		
			$edit_id = $row['id_client'];
			$name = $row['name'];
			$address = $row['address'];
			$email = $row['email'];
			$telephone = $row['telephone'];
			$created_date = $row['created_date'];
			}
		}
	?>

	<table width='500' border='2' align='center'>
		<tr>
			<th bgcolor='silver' colspan='2'>Client Information</th>
		</tr>
		<tr>
			<td align='right'>ID:</td>
			<td>
				<?php echo $edit_id; ?>
			</td>
		</tr>
		<tr>
			<td align='right'>Name:</td>
			<td>
				<?php echo $name; ?>
			</td>
		</tr>
		<tr>
			<td align='right'>Address:</td>
			<td>
				<?php echo $address; ?>
			</td>
		</tr>
		<tr>
			<td align='right'>Email  :</td>
			<td>
				<?php echo $email; ?>
			</td>
		</tr>
		<tr>
			<td align='right'>Telephone : </td>
			<td>
				<?php echo $telephone; ?>
			</td>
		</tr>
		<tr>
			<td align='right'>Created : </td>
			<td>
				<?php echo $created_date; ?>
			</td>
		</tr> 
	</table>
</body>
</html>
