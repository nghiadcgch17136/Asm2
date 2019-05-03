<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
		#over {
    display: none;
    background: #000;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0.8;
    z-index: 999;
}
a, a:visited, a:active{
    text-decoration:none;
}
.login
{
    background-color:#85B561;
    height:auto;
    width:450px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:14px;
    padding-bottom:5px;
    display:none;
    overflow:hidden;
    position:absolute;
    z-index:99999;
    top:10%;
    left:50%;
    margin-left:-300px;
}
 
.login .login_title
{
    color:white;
    font-size:16px;
    padding:8px 0 5px 8px;
    text-align:left;
}
 
.login-content label {
    display: block;
    padding-bottom: 7px;
}
 
.login-content span {
    display: block;
}
.login-content
{
    padding-left:35px;
    background-color:white;
    margin-left:5px;
    margin-right:5px;
    height:auto;
    padding-top:15px;
    overflow:hidden;
}
 
.img-close {
    float: right;
    margin-top:-43px;
    margin-right:5px
}
.button{
    display: inline-block;
    min-width: 46px;
    text-align: center;
    color: #444;
    font-size: 14px;
    font-weight: 700;
    height: 36px;
    padding: 0px 8px;
    line-height: 36px;
    border-radius: 4px;
    transition: all 0.218s ease 0s;
    border: 1px solid #DCDCDC;
    background-color: #F5F5F5;
    background-image: -moz-linear-gradient(center top , #F5F5F5, #F1F1F1);
    cursor: pointer;
}
.button:hover{
     border: 1px solid #DCDCDC;
    text-decoration: none;
    -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    box-shadow: 0 2px 2px rgba(0,0,0,0.1);
}
.login input
{
    border:1px solid #D5D5D5;
    border-radius:5px;
    box-shadow:1px 1px 5px rgba(0,0,0,.07) inset;
    color:black;
    font:12px/25px "Droid Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    height:28px;
    padding:0px 8px;
    word-spacing:0.1em;
    width:300px;
}
.submit-button{
    display: inline-block;
    padding: auto;
    margin: 15px 75px;
    width: 150px;
}
	</style>

	<title>ATN shop</title>
</head>
<body>
	
	<div>
		<a class="login-window button" href="#login-box">Đăng nhập</a>
	</div>
	<div class="login" id="login-box">Đăng nhập
 
 <a class="close" href="#"><img class="img-close" title="Close Window" alt="Close" src="close.png" /></a>
<form class="login-content" action="#" method="post"><label class="username">
 <span>Tên hoặc email</span>
 <input id="username" type="text" autocomplete="on" name="username" placeholder="Username" value="" />
 </label>
 <label class="password">
 <span>Mật khẩu</span>
 <input id="password" type="password" name="password" placeholder="Password" value="" />
 </label>
 <form action="login.php"><button class="button submit-button" type="button">Đăng nhập</button></form>
 
 <script>
 	$(document).ready(function() {
    $('a.login-window').click(function() {
        //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
        var loginBox = $(this).attr('href');
 
        //cho hiện hộp đăng nhập trong 300ms
        $(loginBox).fadeIn(300);
 
        // thêm phần tử id="over" vào sau body
        $('body').append('<div id="over">');
        $('#over').fadeIn(300);
 
        return false;
 });
 
 // khi click đóng hộp thoại
 $(document).on('click', "a.close, #over", function() {
       $('#over, .login').fadeOut(300 , function() {
           $('#over').remove();
       });
      return false;
 });
});
 </script>
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