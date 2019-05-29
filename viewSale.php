    
<?php
	$conn = mysqli_connect("localhost","root","","sales");
	if(!$conn){
		die("Connection failed: ".mysql_connect_error());
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
  <a href="addProducts.php">Add Producs</a>&nbsp; 
  <a href="productsManagement.php">Products Management</a>
</ul>

<form method='post' action='newSales.php'>
<table width='500' border='3' align='center'>
      	<tr>
			<th bgcolor='gray' colspan='5'>Sale Information</h>
		</tr>
		<tr>
		<td align='right'>Client:</td>
			<td>
				<select name='client'>
				<?php
				$sql="SELECT id_client, name 
				FROM clients";
				$result=mysqli_query($conn, $sql);
				while ($client=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $client[0] ?>"><?php echo $client[1] ?></option>
				<?php endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
		<td align='right'>Product:</td>
			<td>
				<select name='product'>
				<?php
				$sql2 = "SELECT id_product, name, price, quantity 
				FROM products";
				$result2 = mysqli_query($conn, $sql2);
				while ($product = mysqli_fetch_row($result2)):
					?>
					<option value="<?php echo $product[0] ?>"><?php echo "Name --> ".$product[1]  ." | Price --> ".$product[2] ." | Quantity --> ".$product[3]?></option>
				<?php endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td align='right'>Quantity :</td>
			<td><input type='number' name='quantity' min = 1 required>
			</font>
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

</body>
</html>
