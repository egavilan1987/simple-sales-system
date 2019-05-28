<!DOCTYPE html>
<html>
<body>
	<head>
		<title>Simple Sale System</title>		
	</head>  
<ul>
  <a href="index.html">Home</a>&nbsp; 
  <a href="newSales.php">New Sales</a>&nbsp;
  <a href="salesManagement.php"> Sales Management</a>&nbsp; 
  <a href="addClients.php">Add Clients</a>&nbsp; 
  <a href="addProducts.php">Add Producs</a>&nbsp; 
  <a href="productsManagement.php">Products Management</a>
</ul>
		<table align='center' width='1000' border='3'>
			<tr>
			<td colspan='20' align='center' bgcolor='silver'>
			Clients Management</td>
			</tr>

			<tr align='center'>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Telephone</th>
                <th>Update</th>
				<th>Details</th>
			</tr>
			
		<?php
		$conn = mysqli_connect("localhost","root","","sales");
		if(!$conn){
			die("Connection failed: ".mysql_connect_error());
		}
		$sql = "SELECT * FROM clients";
		$query = mysqli_query($conn,$sql) or die("Bad Query: $sql");
		while ($row=mysqli_fetch_assoc($query))
			{		
			?>
			<tr align="center">
			<td><?php echo $row['id_client']; ?>s</td>
			<td><?php echo $row['name']; ?>d</td>
			<td><?php echo $row['email']; ?>d</td>
			<td><?php echo $row['telephone']; ?>d</td>
            <td><a href="updateClient.php?id_client=<?php echo $row['id_client']; ?>">Update</a></td>
			<td><a href="viewClient.php?id_client=<?php echo $row['id_client']; ?>">Details</a></td
			</tr>
		<?php } ?>
		</table>
	</body>
</html>
