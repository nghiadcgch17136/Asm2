<!DOCTYPE html>
<html>
<head>
	<title>ATN shop</title>
</head>
<body>
	<div>
		<?php
		require_once('./dbconnector.php');
		$conn = new DBconnector();
		$sql = "select * from product";
		$rows = $conn -> runQuery($sql);
		for ($i=0; $i < count($rows); $i++) { 
			?>
			
			<div>

				<div>
					<a><img src="<?=$rows[$i]['image']?>" alt=""></a>
				</div>
				<div ><?=$rows[$i]['productname']?></div>
				<div><?=$rows[$i]['productdescription']?></div>
				<div><?=$rows[$i]['price']?></div>
			
			</div>
			<?php
		}
		?>
	</div>
</body>
</html>