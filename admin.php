<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body {font-family: Arial, Helvetica, sans-serif;}
		/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 30%;
  border-radius: 40%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
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
     		window.location="Update.php?id="+id;
         
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
	?><td><form action="" method="POST">
					<button class="button" onclick="return Deleteqry(<?php echo $row['productid'] ?>)"><img src="img/rubbish-bin-delete-button.png" alt=""></button>
					<button class="button" onclick="document.getElementById('id01').style.display='block'" ><a href="update.php?productid=<?=$rows['productid']?>" ><img src="img/edit.png"alt=""></a></button>
					<div id="id01" class="modal">
  						<form class="modal-content animate" action="update.php" method="POST">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      							<img src="img/icon.png" alt="Avatar" class="avatar">
    						</div>
    						<div class="container">
      							<label for="user"><b>Username</b></label>
      							<input type="text" placeholder="Enter Username" name="user" required>
      							<label for="pass"><b>Password</b></label>
      							<input type="password" placeholder="Enter Password" name="pass" required>       
      							<button type="submit">Login</button>
      							<label>
        							<input type="checkbox" checked="checked" name="remember"> Remember me
      							</label>
    						</div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>      
    </div>
  </form>
</div>
		<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
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