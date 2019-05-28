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
        <a href="addProducts.php">Add Producs</a>&nbsp; 
        <a href="productsManagement.php">Products Management</a>
	</ul>

	<form method='post' action='addProducts.php'>
	<table width='500' border='3' align='center'>
		<tr>
			<th bgcolor='silver' colspan='5'>Product Information</h>
		</tr>
		<tr >
			<td align='right'>Name:</td>
			<td><input type='text' name='name' maxlength="50" required >
			</td>
		</tr>
		<tr>
			<td align='right'>Description:</td>
			<td><input type='text' name='description' maxlength="500" required >
			</td>
		</tr>
		<tr>
			<td align='right'>Quantity :</td>
			<td><input type='number' name='quantity' min = 0 required>
			</td>
		</tr>
		<tr>
			<td align='right'>Price: </td>
			<td><input type='number' name='price' min = 0 step=".01" required >
			</td>
		</tr>
		<tr>
			<td align='center' colspan='6'>
			<input type='submit' name='submit' value='Submit'>
			</td>
		</tr>  
	  </table>  
	</form><br>
</body>

</html>


