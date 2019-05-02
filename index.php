<!DOCTYPE html>
<html>
<head>
	
	<style>
		table{
			border-collapse: collapse;	
		}
		table, td ,th{
			border: 1px solid black;
		}
		#table{
			margin: auto;
			width: 65%;
			padding: 100px;
		}
		#table th{
			font-size: 34px;
		}
		.button img{
			height: 30px;
			width: 30px;
		}
		#table td{
			font-size: 20px;
			text-align : center;
		}
	</style>
	<title>ATN shop</title>
</head>
<body>
	
	<div>
		<form action="login.php">
			<button>Log in</button>
		</form>
	</div>
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
	echo "<td>";?><div><img width="130px" height="130px" src="/<?php echo $row['image']; ?>"></div><?php "</td>";
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