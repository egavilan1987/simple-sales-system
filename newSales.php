    
<?php
	$conn = mysqli_connect("localhost","root","","sales");
	if(!$conn){
		die("Connection failed: ".mysql_connect_error());
	}
?>
<!DOCTYPE html>
<html>
<body>
	<head>
		<title>Simple Sale System</title>		
	</head>  
<ul>
  <a href="index.html">Home</a>&nbsp; 
  <a href="salesManagement.php"> Sales Management</a>&nbsp; 
  <a href="addClients.php">Add Clients</a>&nbsp; 
  <a href="clientsManagement.php">Clients Management</a>&nbsp; 
  <a href="addProducts.php">Add Producs</a>&nbsp; 
  <a href="productsManagement.php">Products Management</a>
</ul>

<form method='post' action='ventas.php'>
<table width='500' border='3' align='center'>
      	<tr>
			<th bgcolor='gray' colspan='5'>Sales Registration Form</h>
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
			<input type='submit' name='submit' value='Registrar'>
			</td>
		</tr>  
  </table>  
</form><br>
</body>

</html>
<?php
$conn = mysqli_connect("localhost","root","","ventas2");
if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}
if(isset($_POST['submit']))
{
	 $id_cliente = $_POST['cliente'];
	 $id_producto = $_POST['producto'];
	 $precio = 10;
	 $cantidad = $_POST['cantidad'];	 
$sql2 = "SELECT nombre FROM clientes WHERE id_cliente = '$id_cliente'";
$result = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_row($result);
$cliente_nombre = $row2[0];
$sql3 = "SELECT nombre, precio, cantidad FROM productos WHERE id_producto = '$id_producto'";
$result2 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_row($result2);
$producto_nombre = $row3[0];
$producto_precio = $row3[1];
$producto_cantidad = $row3[2];
$producto_almacen = $producto_cantidad - $cantidad;
$total = $producto_precio * $cantidad;
	if ($producto_cantidad < $cantidad){
		echo "La cantidad del producto en el almacen es menor que la registrada en la venta.";
	}else {
		//Insertar nueva venta.
		$sql = "INSERT INTO ventas(id_cliente, id_producto, cantidad, total) VALUES('$id_cliente', '$id_producto','$cantidad','$total')";
		$query=mysqli_query($conn,$sql);
		//Actualizar cantidad de productos.
		$sql1 = "UPDATE productos set cantidad = '$producto_almacen' WHERE id_producto = '$id_producto'";
		$query1=mysqli_query($conn,$sql1);
		if($query){
				echo "<center><b>Nueva Venta Registrada:</b></center><br>";
				echo 
				"<table align='center' border='4'>
					</tr>
					<tr bgcolor='gray' align='center'>
						<th>Cliente</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Total</th>
					</tr>
					<tr>
						<td>$cliente_nombre</td>
						<td>$producto_nombre</td>
						<td>$producto_precio</td>
						<td>$cantidad</td>
						<td>$total</td>
					</tr>
				</table>";
				}
		}
	}
?>

</body>
</html>
