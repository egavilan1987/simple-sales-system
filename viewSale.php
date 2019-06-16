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

		if(isset($_GET['id_sale'])){

		$id_sale = $_GET['id_sale'];

		$sql = "SELECT * FROM sales WHERE id_sale = '$id_sale'";
		$query = mysqli_query($conn, $sql)or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query)){		
			$edit_id = $row['id_sale'];
			$id_client = $row['id_client'];
			$id_product = $row['id_product'];
			$quantity = $row['quantity'];
			$total = $row['total'];
			$created_date = $row['created_date'];
			}
		}
	?>

        <table width='500' border='2' align='center'>
            <tr>
                <th bgcolor='silver' colspan='2'>Bill of Sale</th>
            </tr>
            <tr>
                <td align='right'>ID:</td>
                <td>
                    <?php echo $edit_id; ?>
                </td>
            </tr>
            <tr>
                <td align='right'>Client Name:</td>
                <td>
                    <?php				
					$sql = "SELECT name FROM clients WHERE id_client = '$id_client'";
					$result=mysqli_query($conn,$sql);
					$row2=mysqli_fetch_row($result);
					echo $row2[0];
				?>
                </td>
            </tr>
            <tr>
                <td align='right'>Product Name:</td>
                <td>
                    <?php 
					$sql2 = "SELECT name, price FROM products WHERE id_product = '$id_product'";
					$result2=mysqli_query($conn,$sql2);
					$row3=mysqli_fetch_row($result2);
					echo $row3[0];
				?>
                </td>
            </tr>
            <tr>
                <td align='right'>Product Price:</td>
                <td>
                    <?php 
					echo $row3[1];
				?>
                </td>
            </tr>
            <tr>
                <td align='right'>Quantity :</td>
                <td>
                    <?php echo $quantity; ?>
                </td>
            </tr>
            <tr>
                <td align='right'>Total : </td>
                <td>
                    <?php echo $total; ?>
                </td>
            </tr>
            <tr>
                <td align='right'>Created Date: </td>
                <td>
                    <?php echo $created_date; ?>
                </td>
            </tr>
        </table>

</body>

</html>

<!--print page-->
<button onclick="myFunction()">Print</button>

<script>
    function myFunction() {
        window.print();
    }
</script>