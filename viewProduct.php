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

		if(isset($_GET['id_product'])){

		$id_product = $_GET['id_product'];

		$sql = "SELECT * FROM products WHERE id_product = '$id_product'";
		$query = mysqli_query($conn, $sql)or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query)){		
			$id_product = $row['id_product'];
			$name = $row['name'];
			$description = $row['description'];
			$quantity = $row['quantity'];
			$price = $row['price'];
			$created_date = $row['created_date'];
			}
		}
	?>

        <table width='500' border='2' align='center'>
            <tr>
                <th bgcolor='silver' colspan='2'>Product Information</th>
            </tr>
            <tr>
                <td align='right'>ID:</td>
                <td>
                    <?php echo $id_product; ?>
                </td>
            </tr>
            <tr>
                <td align='right'>Name:</td>
                <td>
                    <?php echo $name; ?>
                </td>
            </tr>
            <tr>
                <td align='right'>Description:</td>
                <td>
                    <?php echo $description; ?>
                </td>
            </tr>
            <tr>
                <td align='right'>Available :</td>
                <td>
                    <?php echo $quantity; ?>
                </td>
            </tr>
            <tr>
                <td align='right'>Price : </td>
                <td>
                    <?php echo $price; ?>
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