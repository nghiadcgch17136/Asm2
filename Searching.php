<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>ATN shop</title>
	
</head>
<body>
	<form action="Searching.php" class="searchbar" method="GET">
			<input type="text" placeholder="Search.." name="search" >
  			<button type="submit"><i class="fa fa-search"></i></button>
	</form>
	<div>
		<?php 
$sql = "SELECT * FROM product where productName like '%".$_GET['search']."%'";
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
echo "<table id = 'table'>";
	echo  "<tr>";
	echo "<th>Image</th>";
	echo "<th>Product name</th>";
	echo "<th>Product Description</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	echo "</tr>";
foreach ($resultSet as $row) {
	echo "<tr>";
	echo "<td>";?><div><img src="/<?php echo $row['image']; ?>"></div><?php "</td>";
	echo "<td>" . $row['productname'] . "</td>";
	echo "<td>" . $row['productdescription'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['quantity'] . "</td>"; 
	echo "</tr>";
}
	echo "</table>";
?>
	</div>
</body>
</html>