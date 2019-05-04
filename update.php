<!DOCTYPE html>
<html>
<head>
	<title>ATN shop</title>
</head>
<body>
	<?php
	if (isset($_GET['productid'])) {
		$db = pg_connect("host=ec2-54-221-236-144.compute-1.amazonaws.com port=5432 user=tkxdkzzzureptd
	 password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453 dbname=d621ll97foi9ku");
		$query = "SELECT * FROM product WHERE productid =".$_GET['productid'];	
		$result = pg_query($query);	}
		
	?>
	<?php 
		while ($row = pg_fetch_assoc($result)) {
			?><form action="admin.php" method="GET">
		<table style="margin: 0 auto">
			<tr>
				<td>ProductID:</td>
				<td> <?php echo $_GET['productid'] ?> <input type="hidden" name="productid" value="<?php echo $_GET['productid'] ?>"></td>
			</tr>
			<tr>
				<td>ProductName:</td>
				<td><input type="text" name="productname" value="<?php echo $row['productname'] ?>"></td>
			</tr>
			<tr>
			<td>Image:</td>
			<td><input type="text" name="image" value="<?php echo $row['image'] ?>"></td>
			</tr>
			<tr>
			<td>DescribeProducts:</td>
			<td><input type="text" name="productdescription" value="<?php echo $row['productdescription'] ?>"></td>
			</tr>
			<tr>
			<td>Price:</td>
			<td><input type="text" name="price" value="<?php echo $row['price'] ?>"></td>
			</tr>
		</table>
		}
	?>
</body>
</html>