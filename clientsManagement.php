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
        <a href="addProducts.php">Add Products</a>&nbsp;
        <a href="productsManagement.php">Products Management</a>
    </ul>
    <table align='center' width='1000' border='3'>
        <tr>
            <td colspan='20' align='center' bgcolor='silver'>
                <b>Clients Management</b>
            </td>
        </tr>
        <tr align='center'>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th colspan='2'>Action</th>
        </tr>

        <?php

		include('connection.php');

		$sql = "SELECT * FROM clients";

		$query = mysqli_query($conn,$sql) or die("Bad Query: $sql");

		while ($row=mysqli_fetch_assoc($query)){		
			?>
            <tr align="center">
                <td>
                    <?php echo $row['id_client']; ?>
                </td>
                <td>
                    <?php echo $row['name']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['telephone']; ?>
                </td>
                <td><a href="viewClient.php?id_client=<?php echo $row['id_client']; ?>">View</a></td>
                <td><a href="updateClient.php?id_client=<?php echo $row['id_client']; ?>">Edit</a></td>
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