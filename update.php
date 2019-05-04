<!DOCTYPE html>
<html>
<head>
	<title>ATN shop</title>
</head>
<body>
	<?php
		$db = pg_connect("host=ec2-54-221-236-144.compute-1.amazonaws.com port=5432 user=tkxdkzzzureptd
	 password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453 dbname=d621ll97foi9ku");
		$query = "UPDATE product SET productname = '$_GET[productname]',productdescription = '$_GET[productdescription]',price = '$_GET[price]', quantity = '$_GET[quantity]', image = '$_GET[image]' WHERE productid = '$_GET[productid]'";	
		$result = pg_query($db,$query);	
		?>

		
			
		<form action="admin.php" method="POST"><table style="margin: auto;">
		<tr>
			
			<td>ProductID: <?php echo $_GET['productid'] ?></td>
			<td><input type="hidden" name="productid" value="<?php echo $_GET['productid'] ?>"></td>
		</tr>
		<tr>
			<td>Product name:</td>
			<td><input type="text" name="productname" required></td>
		</tr>
		<tr>
			<td>Product description:</td>
			<td><input type="text" name="productdescription" required></td>
		</tr>
		<tr>
			<td>Price:</td>
			<td><input type="text" name="price" required></td>
		</tr>
		<tr>
			<td>Quantity:</td>
			<td><input type="text" name="quantity" required></td>
		</tr>
		<tr>
			<td>Image:</td>
			<td><input type="text" name="image"></td>
		</tr>
		<tr><td><input type="submit" value="SAVE"></td></tr>

	</table></form>
		
</body>
</html>