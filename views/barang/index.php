<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/public/style.css">
</head>
<body>
	<div class="mytabs">
		<input type="radio" id="tabtabel" name="mytabs" checked="checked">
		<label for="tabtabel" >tabel</label>
		<div class="tab">
			<h2>tabel barang</h2>
			<p>
				<form class="cari">
					<input type="text" id="cari" name="cari">
					<button class="buttonCari">search</button><br>
					<button class="hapus">hapus</button>
					<button class="edit">edit</button>
				</form>
				<table class="tabel"border="1" width="80%">
                    <thead>
                        <tr bgcolor="#4CAF50" height="40">
                            <th>NO</th>
                            <th>id Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['barang'] as $i => $barang): ?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= $barang['kode_barang'] ?></td>
                            <td><?= $barang['nama_barang'] ?></td>
                            <td><?= $barang['jumlah_barang'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
				
			</p>
			
		</div>

		<input type="radio" id="tabtambah" name="mytabs">
		<label for="tabtambah" >input</label>
		<div class="tab">
			<h2>tambah barang</h2>
			<p>
				<form class="tambahbarang" action="<?= BASEURL ?>/barang/tambah" method="post">
					<br>
  					idBarang<br>
  					<input type="text" id="idBarang" name="idBarang"><br>
  					Nama Barang<br>
  					<input type="text" id="namaBarang" name="namaBarang"><br>
  					Jumlah Barang<br>
  					<input type="text" id="jumlah" name="jumlah"><br>
  					<br>
  					<button class="clear">clear</button>
					<button type="submit" class="tambah">tambah</button>
				</form>
				
			</p>
			
		</div>
		
	</div>
    <!-- <script>
        function savebarang(e) {
            e.preventDefault()


        }
    </script> -->
</body>
</html>