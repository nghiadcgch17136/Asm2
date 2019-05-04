<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	
	<script>
		function Deleteqry(id)
        { 
          if(confirm("Are you sure you want to delete this product?")==true)
                   window.location="admin.php?del="+id;
            return false;
        }
     	function edit(id) {
     		window.location="update.php?id="+id;
         
     	}   
	</script>
	<title>ATN shop</title>
</head>
<body>
	<div>
	<form action="Searching.php" class="searchbar" method="GET">
			<input type="text" placeholder="Search.." name="search">
  			<button type="submit"><i class="fa fa-search"></i></button>
	</form>
	</div>
	<div>
		<?php 
		if (isset($_GET['del'])) {
		$db = pg_connect("host=ec2-54-221-236-144.compute-1.amazonaws.com port=5432 user=tkxdkzzzureptd
	 password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453 dbname=d621ll97foi9ku");
		$sql = "DELETE FROM product WHERE productid=".$_GET['del'];
		$result = pg_query($db,$sql);
		
		}
	 ?>
	 <?php 
		if (isset($_GET['productname'])) {
		$db = pg_connect("host=ec2-54-221-236-144.compute-1.amazonaws.com port=5432 user=tkxdkzzzureptd
	 password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453 dbname=d621ll97foi9ku");
		$ProductName = $_GET['productname'];	
		$Image = $_GET['image'];
		$DescribeProducts = $_GET['productdescription'];
		$Price = $_GET['price'];
		$Quantity = $_GET['quantity'];
		$sql = "UPDATE product SET productname='".$ProductName."',productdescription='".$DescribeProducts."',price= '".$Price."',quantity ='".$Quantity."', image='".$Image."' WHERE productid =" .$_GET['productid'];
		$result = pg_query($db,$sql);
		
		}
	 ?>

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
	echo "<tr>";
	echo "<th>Image</th>";
	echo "<th>Product name</th>";
	echo "<th>Product Description</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	echo "</tr>";
foreach ($resultSet as $row) {
	echo "<tr>";
	echo "<td>";?><div ><img width="130px" height="130px" src="/<?php echo $row['image']; ?>"></div><?php "</td>";
	echo "<td>" . $row['productname'] . "</td>";
	echo "<td>" . $row['productdescription'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['quantity'] . "</td>"; 
	?><td><form action="" method="GET">
					<button class="button" onclick="return Deleteqry(<?php echo $row['productid'] ?>)"><img src="img/rubbish-bin-delete-button.png" alt=""></button>
					<button class="button"><a href="update.php?productid=<?php echo $row['productid'] ?>" ><img src="img/edit.png"alt=""></a></button>
		  </form>
	   </td>
	<?php
	echo "</tr>";
}
	echo "</table>";
?>
	</div>
</body>
</html>