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
		<input type="radio" id="tabtabel" name="mytabs" checked="checked" onclick="changeTab(event)">
		<label for="tabtabel" >tabel</label>
		<div class="tab">
			<h2>tabel barang</h2>
			<p>
				<form action="<?= BASEURL ?>/barang" class="cari" onsubmit="search(event)">
					<input type="text" id="cari" name="cari">
					<button class="buttonCari">search</button><br>
					<button class="hapus" onclick="btnDelete(event)">hapus</button>
					<button class="edit" onclick="btnEdit(event)">edit</button>
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
						<form action="<?= BASEURL ?>/barang/hapus" id="deletaction" method="post">
							<?php foreach ($data['barang'] as $i => $barang): ?>
							<tr>
									<td>
										<input type="checkbox" id="edit_barang" name="kode_barang[]" value="<?= $barang['kode_barang'] ?>" id="delete<?= $barang['kode_barang'] ?>" data-detail="<?= base64_encode(json_encode($barang)) ?>">
										<?= ++$i ?>
									</td>
									<td>
											<?= $barang['kode_barang'] ?>
									</td>
									<td><?= $barang['nama_barang'] ?></td>
									<td><?= $barang['jumlah_barang'] ?></td>
							</tr>
							<?php endforeach; ?>
						</form>
					</tbody>
			</table>
				
			</p>
			
		</div>

		<input type="radio" id="tabtambah" name="mytabs">
		<label for="tabtambah" >input</label>
		<div class="tab">
			<h2>tambah barang</h2>
			<p>
				<form class="tambahbarang" action="<?= BASEURL ?>/barang/tambah" onreset="resetForm()" method="post">
					<br>
  					idBarang<br>
  					<input type="text" id="idBarang" name="idBarang"><br>
  					Nama Barang<br>
  					<input type="text" id="namaBarang" name="namaBarang"><br>
  					Jumlah Barang<br>
  					<input type="text" id="jumlah" name="jumlah"><br>
  					<br>
  					<button class="clear" type="reset">clear</button>
					<button type="submit" class="tambah">tambah</button>
				</form>
				
			</p>
			
		</div>
		
	</div>

	

	<script>
			function search(e) {
				e.preventDefault()
				const form = e.target

				
				var cari = document.getElementById("cari").value;
				let url = form.action

				if (cari) {
					url = "<?= BASEURL ?>/barang/cari/"+cari;
				}

				window.location.href = url;
			}

			function btnDelete(e) {
				e.preventDefault();

				const form = document.getElementById("deletaction");
				form.submit();
			}

			function btnEdit(e) {
				e.preventDefault();

				const edit_barang = document.querySelectorAll("#edit_barang:checked");
				
				if (edit_barang.length != 1) {
					alert("pilih 1 barang");
					return;
				} else {
					const data = JSON.parse(atob(edit_barang[0].dataset.detail))
					formEdit = document.getElementsByClassName("tambahbarang")

					formEdit[0].action = "<?= BASEURL ?>/barang/edit/"+data.kode_barang;
					formEdit[0].idBarang.value = data.kode_barang;
					formEdit[0].namaBarang.value = data.nama_barang;
					formEdit[0].jumlah.value = data.jumlah_barang;

					document.getElementById("tabtambah").click();

					// formEdit find h2 and change text
					const h2 = document.getElementsByTagName("h2")[1];
					h2.innerText = "edit barang";

					// formEdit find button and change text
					const button = document.getElementsByClassName("tambah")[0];
					button.innerText = "edit";
				}

				// let url = "<?= BASEURL ?>/barang/edit";
				
				// console.log(edit_barang);

			}

			function changeTab(e) {
				resetForm();
			}

			function resetForm(e=null) {
				e && e.preventDefault()

				const form = document.getElementsByClassName("tambahbarang")[0];
				form.reset();

				const h2 = document.getElementsByTagName("h2")[1];
				h2.innerText = "tambah barang";

				const button = document.getElementsByClassName("tambah")[0];
				button.innerText = "tambah";

				form.action = "<?= BASEURL ?>/barang/tambah";

				document.getElementById("tabtabel").click();
			}
	</script>
</body>
</html>