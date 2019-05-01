<!DOCTYPE html>
<html>
<head>
	
	<title>ATN shop</title>

</head>
<body>
	<div>
		<?php 
$sql = "SELECT * FROM product";
$db = parse_url(getenv("DATABASE_URL"));
$pdo = new PDO("pgsql:" . sprintf(
    "host=ec2-54-221-236-144.compute-1.amazonaws.com;port=5432;user=tkxdkzzzureptd
	;password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453;dbname=
	d621ll97foi9ku",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
foreach ($resultSet as $row) {

	
	echo "<table align='center'>";
	echo  "<tr>";
	echo "<th>Image</th>";
	echo "<th>Product name</th>";
	echo "<th>Product Description</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	while ($row <= count($row)) {echo "<tr>";
	
		echo "<td>";?><div><img src="/<?php echo $row['image']; ?>"></div><?php "</td>";
		echo "<td>" . $row['productname'] . "<td>";
		echo "<td>" . $row['productdescription'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['quantity'] . "</td>"; 
	}
	
	
}
?>
	</div>
</body>
</html>