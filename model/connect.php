<?php
class connect
{
	var $db = null;
	public function __construct()
	{
		$dsn = 'mysql:host=localhost;port=3306;dbname=raucu';
		$user = 'root';
		$pass = '';
		try {
			$this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			// echo "thành công";
		} catch (\Throwable $th) {
			echo "thất bại";
			echo $th;
		}

	}
	//	https://megacode.vn/files/view/php-phuong-thuc-getinstance-la-gi-va-tai-sao-dung-getinstance-4922.html

	//	lấy đúng 1 ID nên lấy fetch vô luôn
//query để thực hiện câu lệnh select
	public function getInstance($select)
	{
		$results = $this->db->query($select);
		// echo $select;
		$result = $results->fetch();
		return $result;
	}

	//	Lấy nhiều rows
	public function getList($select) // select * from table
	{
		$results = $this->db->query($select);
		// echo $results;
		return ($results);
	}
	//	https://viblo.asia/p/cai-dat-ung-dung-php-thuan-su-dung-mvc-va-oop-4P856aA3lY3
//để thực hiện câu lẹnh insert, update, delete (phương thức exec)	
	public function exec($query)
	{
		$results = $this->db->exec($query); // $this->db->exec(insert into hanghoa.....)
		// echo $results;
		return ($results);
	}

//để dữ liệu an toàn dùng prepare
	function execp($query)
	{
		$statement = $this->db->prepare($query);
		return $statement;
	}
}
?>