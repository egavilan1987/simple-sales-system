<!DOCTYPE html>
<html>
	<head>
		<title>Simple Sale System</title>		
	</head>  
<body>
	<ul>
	  <a href="index.html">Home</a>&nbsp; 
	  <a href="newSales.php">New Sales</a>&nbsp;
	  <a href="addClients.php">Add Clients</a>&nbsp; 
	  <a href="clientsManagement.php">Clients Management</a>&nbsp; 
	  <a href="addProducts.php">Add Products</a>&nbsp; 
	  <a href="productsManagement.php">Products Management</a>
	</ul>
	<table align='center' width='1000' border='3'>
		<tr>
			<td colspan='9' align='center' bgcolor='gray'>
				<b>Sales Management</b>
			</td>
		</tr>
		<tr align='center'>
			<th>No.</th>
			<th>Client</th>
			<th>Product</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
            <th colspan='3'>Action</th>
		</tr>
			
	<?php

		include('connection.php');

		$sql = "SELECT * FROM sales";

		$query = mysqli_query($conn,$sql) or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query))
			{		
			?>
			<tr align="center">
			<td><?php echo $row['id_sale'];?></td>
			<td>
				<?php 
					$id_client = $row['id_client'];
					$sql = "SELECT name FROM clients WHERE id_client = '$id_client'";
					$result=mysqli_query($conn,$sql);
					$row2=mysqli_fetch_row($result);
					echo $row2[0];
				?>
			</td>
			<td>
				<?php 
					$id_product = $row['id_product'];
					$sql2 = "SELECT name, price FROM products WHERE id_product = '$id_product'";
					$result2=mysqli_query($conn,$sql2);
					$row3=mysqli_fetch_row($result2);
					echo $row3[0];
				?>
			</td>
			<td><?php echo $row3[1]; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['total']; ?></td>
			<td><a href="viewSale.php?id_sale=<?php echo $row['id_sale']; ?>">View</a></td>
            <td><a href="updateSale.php?id_sale=<?php echo $row['id_sale']; ?>">Edit</a></td>
			<td><a href="deleteSale.php?id_sale=<?php echo $row['id_sale']; ?>" onclick="return confirm('Are you sure want to delete?');">Delete</a></td>
			</tr>
	<?php } ?>
	</table>
	<br>
</body>
</html>

<!--print page-->
<button onclick="myFunction()">Print</button>

<script>
	function myFunction() {
	  window.print();
	}
</script>