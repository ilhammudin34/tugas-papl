<?php
// include './models/BarangModel.php';
/**
 * 
 */
class BarangController extends Controller
{
	function index()
	{
		// echo "barang controler/index";
		$data = $this->model("BarangModel")->getBarang();
		$this->view('barang/index',["barang"=>$data]);
	}

	function get($key,$value)
	{
		$get = BarangModel::get("
			$key like '%$value%'
		");
		return $get;
	}

	 function insert($value)
	 {
	 	// $value = "($kode_barang,$nama_barang,$jumlah_barang)";
	 	return BarangModel::insert($value);
	 }

	
	 function cari($nama_barang)
	 {
		echo "cok =".$nama_barang;
	 }
	 function tambah()
	 {
		$idBarang=$_POST["idBarang"];
		$namaBarang=$_POST["namaBarang"];
		$jumlah=$_POST["jumlah"];

		$this->model("BarangModel")->tambah($idBarang,$namaBarang,$jumlah);

		header("location:".BASEURL."/barang");

	 }
}

// $get = BarangController::get();
// print_r($get);