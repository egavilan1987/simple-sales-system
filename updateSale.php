	<?php

		include('connection.php');

		$id_sale = $_GET['id_sale'];

		$sql = "SELECT * FROM sales WHERE id_sale = '$id_sale'";
		$query = mysqli_query($conn, $sql)or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query)){		
			$id_sale = $row['id_sale'];
			$id_client = $row['id_client'];
			$id_product = $row['id_product'];
			$quantity = $row['quantity'];
			$total = $row['total'];
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

    <form method='POST' action='updateSale.php?id=<?php echo $id_client; ?>'>
        <table width='500' border='3' align='center'>
            <tr>
                <th bgcolor='gray' colspan='2'>Edit Sale</th>
            </tr>
            <tr>
                <td align='right'>ID:</td>
                <td>
                    <input type='number' name='id_sale' value='<?php echo $id_sale; ?>' readonly>
                </td>
            </tr>
            <tr>
                <td align='right'>Client:</td>
                <td>
                    <select name='id_client'>
                        <?php				
								$sql = "SELECT name FROM clients WHERE id_client = '$id_client'";
								$result=mysqli_query($conn,$sql);
								$row2=mysqli_fetch_row($result);

							?>
                            <option value="<?php echo $id_client; ?>">
                                <?php echo $row2[0];?>
                            </option>
                            <?php
								$sql2="SELECT id_client, name FROM clients";
							    $result2=mysqli_query($conn, $sql2);
								while ($client=mysqli_fetch_row($result2)):
							?>
                                <option value="<?php echo $client[0] ?>">
                                    <?php echo $client[1] ?>
                                </option>
                                <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align='right'>Product:</td>
                <td>
                    <select name='id_product'>
                        <?php				
								$sql = "SELECT id_product, name, price, quantity FROM products WHERE id_product = '$id_product'";
								$result=mysqli_query($conn,$sql);
								$row2=mysqli_fetch_row($result);								
							?>
                            <option value="<?php echo $id_product; ?>">
                                <?php echo "Name --> ".$row2[1]  ." | Price --> ".$row2[2] ." | Available --> ".$row2[3]?>
                            </option>
                            <?php
								$sql2 = "SELECT id_product, name, price, quantity FROM products";
								$result2 = mysqli_query($conn, $sql2);
								while ($product = mysqli_fetch_row($result2)):
								?>
                                <option value="<?php echo $product[0] ?>">
                                    <?php echo "Name --> ".$product[1]  ." | Price --> ".$product[2] ." | Available --> ".$product[3]?>
                                </option>
                                <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align='right'>Quantity:</td>
                <td>
                    <input type='number' name='quantity' value='<?php echo $quantity; ?>' maxlength="500" required>
                </td>
            </tr>
            <tr>
                <td align='center' colspan='2'>
                    <input type='submit' name='submit' value='Submit'>
                </td>
            </tr>
        </table>
    </form>
    <br>
</body>

</html>
	<?php

		if(isset($_POST['submit']))
		{ 
			$id_sale = $_POST['id_sale'];
			$id_client = $_POST['id_client'];
			$id_product = $_POST['id_product'];
			$quantity = $_POST['quantity'];
		    $total=45;

			$sql5 = "SELECT name, price, quantity FROM products WHERE id_product = '$id_product'";


			$result5 = mysqli_query($conn, $sql5);

			$row3 = mysqli_fetch_row($result5);

			$product_price = $row3[1];
			$product_quantity = $row3[2];

			$stock = $product_quantity - $quantity;

			$total = $product_price * $quantity;

			if ($product_quantity < $quantity){
				echo
					"<script>
						alert('The quantity of the product in the stock is less than that registered in the sale.');
						window.open('salesManagement.php','_self');
					</script>";
					
			}else {

				$sql4 = "UPDATE sales SET id_client='$id_client', id_product='$id_product', quantity='$quantity', total='$total' WHERE id_sale = '$id_sale'";

				$query4=mysqli_query($conn,$sql4);

				if($query4){
					
					$sql1 = "UPDATE products set quantity = '$stock' WHERE id_product = '$id_product'";
        
					$query1=mysqli_query($conn,$sql1);
					
					echo
					"<script>
						alert('Bill information has been successfully updated!');
						window.open('salesManagement.php','_self');
					</script>";

				}else{
					echo
					"<script>
						alert('Bill information could not be updated!');
						window.open('salesManagement.php','_self');				
					</script>"; 
				}
			}


		}
	?>