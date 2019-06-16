<?php

		include('connection.php');

		$id_product = $_GET['id_product'];

		$sql = "SELECT * FROM products WHERE id_product = '$id_product'";
		$query = mysqli_query($conn, $sql)or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query)){		
			$edit_id = $row['id_product'];
			$name = $row['name'];
			$description = $row['description'];
			$quantity = $row['quantity'];
			$price = $row['price'];
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
    <form method='POST' action='updateProduct.php?id=<?php echo $id_product; ?>'>
        <table width='500' border='3' align='center'>
            <tr>
                <th bgcolor='silver' colspan='2'>Update Product Information</th>
            </tr>
            <tr>
                <td align='right'>Name:</td>
                <td>
                    <input type='text' name='name' value='<?php echo $name; ?>' maxlength="50" required>
                </td>
            </tr>
            <tr>
                <td align='right'>Description:</td>
                <td>
                    <textarea name="description" cols=25 rows="4 ">
                        <?php echo $description; ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td align='right'>Quantity :</td>
                <td>
                    <input type='number' name='quantity' value='<?php echo $quantity; ?>' maxlength="500 " required>
                </td>
            </tr>
            <tr>
                <td align='right'>Price : </td>
                <td>
                    <input type='number' name='price' value='<?php echo $price; ?>' min=0 step=".01 " required>
                </td>
            </tr>
            <tr>
                <td align='center' colspan='2'>
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
			$description = $_POST['description'];
			$quantity = $_POST['quantity'];
			$price = $_POST['price'];

		$sql2 = "UPDATE products SET name='$name' , description='$description' , quantity='$quantity' , price='$price' WHERE id_product='$id' ";

		$query2=mysqli_query($conn,$sql2);

		if($query2){
			echo
			"<script>
                alert('Product information has been successfully updated!'); window.open('productsManagement.php','_self');
             </script>";
        	} 
     	} 
    ?>