<?php
// include './models/BarangModel.php';
/**
 * 
 */
class BarangController extends Controller
{
	function index()
	{
		$data = $this->model("BarangModel")->getBarang();
		$this->view('barang/index',["barang"=>$data]);
	}

	
	function tambah()
	{
	 $idBarang=$_POST["idBarang"];
	 $namaBarang=$_POST["namaBarang"];
	 $jumlah=$_POST["jumlah"];

	 $insert = $this->model("BarangModel")->tambah($idBarang,$namaBarang,$jumlah);

	 header("location:".BASEURL."/barang");
	}

	function cari($nama_barang)
	{
		$data = $this->model("BarangModel")->getBarang($nama_barang);
		$this->view('barang/index',["barang"=>$data]);
	}

	function edit($kode_barang)
	{
		$idBarang=$_POST["idBarang"];
		$namaBarang=$_POST["namaBarang"];
		$jumlah=$_POST["jumlah"];
		$update = $this->model("BarangModel")->edit($idBarang,$namaBarang,$jumlah,$kode_barang);
		header("location:".BASEURL."/barang");
	}

	function hapus()
	{
		$kode_barang = $_POST['kode_barang'];
		$this->model("BarangModel")->hapus($kode_barang);
		header('Location: '.BASEURL.'/barang');
	}

}