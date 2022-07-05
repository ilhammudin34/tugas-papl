<?php
// include_once('./services/db.php');
// try {
// 	$res = mysqli_query($con, "SELECT * from barang");
// 	$get = mysqli_fetch_assoc($res);

// print_r($get);
	
// } catch (Exception $e) {
// 	print_r($e->getMessage());
// }

/**
 * 
 */
class BarangModel
{	
	private $table = 'barang';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	
	

	// public static function get($where)
	// {
	// 	$db = DB::initialize();

	// 	$query = "SELECT kode_barang,nama_barang from barang where $where";

	// 	$res = $db->query($query);
	// 	$get = $res->fetch_assoc();

	// 	return $get;
	// }

	// public static function insert($value='')
	// {
	// 	$db = DB::initialize();

	// 	$res = $db->query("INSERT INTO `barang`(`kode_barang`, `nama_barang`, `jumlah_barang`) VALUES $value");
	// 	// $get = $res->query();

	// 	return $res;
	// }

	function getBarang()
	{
		// return [
		// 	[
		// 		"id"=>3,
		// 		"nama_barang"=>"Bantal",
		// 		"jumlah_barang"=>30
		// 	],
		// 	[
		// 		"id"=>3,
		// 		"nama_barang"=>"Guling",
		// 		"jumlah_barang"=>30
		// 	],
		// ];
		$this->db->query(
			'select *
			from '. $this->table
		);
		return $this->db->resultset();
	}
	function tambah($idBarang,$namaBarang,$jumlah)
	{
		$query = "INSERT INTO barang (:kode_barang,:nama_barang,:jumlah_barang)";
		$this->db->query($query);
		$this->db->bind("kode_barang",$idBarang);
		$this->db->bind("nama_barang",$namaBarang);
		$this->db->bind("jumlah_barang",$jumlah);
		$this->db->execute();

		return $this->db->rowCount();
	}
	
}
