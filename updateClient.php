	<?php

		include('connection.php');

		$id_client = $_GET['id_client'];

		$sql = "SELECT * FROM clients WHERE id_client = '$id_client'";
		$query = mysqli_query($conn, $sql)or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query)){		
			$edit_id = $row['id_client'];
			$name = $row['name'];
			$address = $row['address'];
			$email = $row['email'];
			$telephone = $row['telephone'];
			}
	?>
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

	<form method='POST' action='updateClient.php?id=<?php echo $id_client; ?>'>
		<table width='500' border='3' align='center'>
			<tr>
				<th bgcolor='silver' colspan='5'>Update Client Information</th>
			</tr>
			<tr>
				<td align='right'>Name:</td>
				<td>
					<input type='text' name='name' value='<?php echo $name; ?>' maxlength="50" required>
				</td>
			</tr>
			<tr>
				<td align='right'>Address:</td>
				<td>
					<input type='text' name='address' value='<?php echo $address; ?>' maxlength="500" required>
				</td>
			</tr>
			<tr>
				<td align='right'>Email  :</td>
				<td>
					<input type='email' name='email' value='<?php echo $email; ?>' name='email' required>
				</td>
			</tr>
			<tr>
				<td align='right'>Telephone : </td>
				<td>
					<input type='tel' name='telephone' value='<?php echo $telephone; ?>' maxlength="20" required>
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

		if(isset($_POST['submit']))
		{ 
			$id = $_GET['id'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$telephone = $_POST['telephone'];
		     

		$sql2 = "UPDATE clients SET name='$name', address='$address', email='$email', telephone='$telephone' WHERE id_client = '$id'";


		$query2=mysqli_query($conn,$sql2);

		if($query2){
			echo
			"<script>
				alert('Client information has been successfully updated!');
				window.open('clientsManagement.php','_self');
			</script>";

			}
		}
	?>
