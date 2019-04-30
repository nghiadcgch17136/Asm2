<?php
class DBconnector{
	public $host = 'localhost';
	public $dbname = 'newsdb';
	public $un = 'root';
	public $pw = '';	
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
	

