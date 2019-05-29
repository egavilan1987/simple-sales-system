    
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
			<th bgcolor='gray' colspan='5'>Update Sale</h>
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
<?php
$conn = mysqli_connect("localhost","root","","sales");
if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}
if(isset($_POST['submit']))
{
	 $id_client = $_POST['client'];
	 $id_product = $_POST['product'];
	 $precio = 10;
	 $quantity = $_POST['quantity'];	 
     
$sql2 = "SELECT name FROM clients WHERE id_client = '$id_client'";

$result = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_row($result);

$client_name = $row2[0];

$sql3 = "SELECT name, price, quantity FROM products WHERE id_product = '$id_product'";

$result2 = mysqli_query($conn, $sql3);

$row3 = mysqli_fetch_row($result2);

$product_name = $row3[0];
$product_price = $row3[1];
$product_quantity = $row3[2];

$stock = $product_quantity - $quantity;

$total = $product_price * $quantity;
	if ($product_quantity < $quantity){
		echo "The quantity of the product in the stock is less than that registered in the sale.";
	}else {
		//Insert new sale.
		$sql = "INSERT INTO sales(id_client, id_product, quantity, total, created_date) VALUES('$id_client', '$id_product','$quantity','$total',NOW())";
		$query=mysqli_query($conn,$sql);
		//Actualizar cantidad de productos.
		$sql1 = "UPDATE products set quantity = '$stock' WHERE id_product = '$id_product'";
        
		$query1=mysqli_query($conn,$sql1);
		if($query){
				echo "<center><b>Nueva Venta Registrada:</b></center><br>";
				echo 
				"<table align='center' border='4'>
					</tr>
					<tr bgcolor='gray' align='center'>
						<th>Client</th>
						<th>Product</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
					<tr>
						<td>$client_name</td>
						<td>$product_name</td>
						<td>$product_price</td>
						<td>$quantity</td>
						<td>$total</td>
					</tr>
				</table>";
				}
		}
	}
?>

</body>
</html>

