<?php
		$db = pg_connect("host=ec2-54-221-236-144.compute-1.amazonaws.com port=5432 user=tkxdkzzzureptd
	 password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453 dbname=d621ll97foi9ku");
		$query = "SELECT * FROM account WHERE username = '$_GET[user]' and password = '$_GET[pass]'";	
		$result = pg_query($query);
		$count = pg_num_rows($result);
		if ($count == 1) {
			
			header("location:admin.php");
		}
		else {
			
			header("location:index.php");
		}
	?>

