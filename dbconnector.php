<?php
class DBconnector{
	public $host = 'ec2-54-221-236-144.compute-1.amazonaws.com;port=5432';
	public $dbname = 'd621ll97foi9ku';
	public $un = 'tkxdkzzzureptd';
	public $pw = '597dac569edc9b06099f1027652ff9aab479d2d6c501e71e1c31adc6bd6ed453';	
	public function runquery($sql)
	{
		$conn = new mysqli($this->host,$this->un,$this->pw,$this ->dbname);
		
		//chay cau truy van
		$result = $conn->query($sql);
		//doc ket qua chay cau truy van, tra ve mot mang
		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
		//dong ket noi
		$conn->close();
		return $rows;
	}
	public function exeStatement($sql)
	{
		$conn = new mysqli($this->host,$this->un,$this->pw,$this ->dbname);
		
		//chay cau truy van
		$result = $conn->query($sql);
		//doc ket qua chay cau truy van, tra ve mot mang
		
		//dong ket noi
		$conn->close();
	}
}
?>
	

