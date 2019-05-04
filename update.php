<!DOCTYPE html>
<html>
<head>
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
  width: 20%;
  border-radius: 30%;
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
  width: 60%; /* Could be more or less, depending on screen size */
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
    body{
      background-image: url("img/9ae0e9838b0789e3b26d3be5d6c6e01f.jpg");
      
    }
		table{
			border-collapse: collapse;	
		}
		table, td ,th{
			border: 1px solid black;
		}
		#table{
			margin: auto;
			width: 40%;
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
	<form action="admin.php">
		<button style="width: auto;">Admin</button>
	</form>
	<?php
		$db = pg_connect("host=ec2-54-221-236-144.compute-1.amazonaws.com port=5432 user=tkxdkzzzureptd
	 password=597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453 dbname=d621ll97foi9ku");
		$query = "UPDATE product SET productname = '$_GET[productname]',productdescription = '$_GET[productdescription]',price = '$_GET[price]', quantity = '$_GET[quantity]', image = '$_GET[image]' WHERE productid = '$_GET[productid]'";	
		$result = pg_query($db,$query);	
		?>

		
			
		<form action="" method="GET"><table>
		<tr>
			
			<td>ProductID: <?php echo $_GET['productid'] ?></td>
			<td><input type="hidden" name="productid" value="<?php echo $_GET['productid'] ?>"></td>
		</tr>
		<tr>
			<td>Product name:</td>
			<td><input type="text" name="productname" required></td>
		</tr>
		<tr>
			<td>Product description:</td>
			<td><input type="text" name="productdescription" required></td>
		</tr>
		<tr>
			<td>Price:</td>
			<td><input type="text" name="price" required></td>
		</tr>
		<tr>
			<td>Quantity:</td>
			<td><input type="text" name="quantity" required></td>
		</tr>
		<tr>
			<td>Image:</td>
			<td><input type="text" name="image" value="img/"></td>
		</tr>
		<tr><td><input type="submit" value="SAVE"></td></tr>

	</table></form>
		
</body>
</html>