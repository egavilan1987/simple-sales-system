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
        <a href="clientsManagement.php">Clients Management</a>&nbsp;
        <a href="addProducts.php">Add Products</a>&nbsp;
        <a href="productsManagement.php">Products Management</a>
    </ul>

    <form method='post' action='addClients.php'>
        <table width='500' border='3' align='center'>
            <tr>
                <th bgcolor='silver' colspan='2'><b>Clients Registration Form</b></th>
            </tr>
            <tr>
                <td align='right'>Name:</td>
                <td>
                    <input type='text' name='name' maxlength="50" required>
                </td>
            </tr>
            <tr>
                <td align='right'>Address:</td>
                <td>
                    <input type='text' name='address' maxlength="500" required>
                </td>
            </tr>
            <tr>
                <td align='right'>Email :</td>
                <td>
                    <input type='email' name='email' required>
                </td>
            </tr>
            <tr>
                <td align='right'>Telephone : </td>
                <td>
                    <input type='tel' name='telephone' maxlength="20" required>
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

	include('connection.php');

	if(isset($_POST['submit']))
	{
		 $name = $_POST['name'];
		 $address = $_POST['address'];
		 $email = $_POST['email'];
		 $telephone = $_POST['telephone'];

	$sql = "INSERT INTO clients(name, address, email, telephone, created_date) VALUES('$name', '$address','$email','$telephone', NOW())";

	$query=mysqli_query($conn,$sql);

	if($query){
		echo "<center><b>New Client Details:</b></center><br>";
		echo
			"<table align='center' border='4'>
				</tr>
				<tr bgcolor='silver' align='center'>
					<th>Name</th>
					<th>Address</th>
					<th>Email</th>
					<th>Telephone</th>
				</tr>
				<tr>
					<td>$name</td>
					<td>$address</td>
					<td>$email</td>
					<td>$telephone</td>
				</tr>
			</table>";
			}
	}
?>