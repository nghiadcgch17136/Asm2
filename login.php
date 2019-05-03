<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$db = pg_connect("host=ec2-54-221-236-144.compute-1.amazonaws.com port=5432 user=tkxdkzzzureptd
	 password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453 dbname=d621ll97foi9ku");
		$sql = "SELECT DISTINCT username from account where username = ".$_GET['uname'];
		$result = pg_query($db,$sql);
		if ($result == 1) {
			# code...
			header('location:admin.php');
		}
		else {
			# code...
			header('location:index.php');
		}
	?>

</body>
</html>