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
		$sql = "SELECT * FROM products WHERE ProductID =".$_GET['productid'];
		$result = pg_query($db,$sql);
	?>
		<table style="margin: auto;">
		<tr>
			<td>ProductID:</td>
			<td><?php echo $_GET['productid'] ?> <input type="hidden" name="productid" value="<?php echo $_GET['productid'] ?>"></td>
		</tr>
	</table>
	}
	?>
	
	}
		
</body>
</html>