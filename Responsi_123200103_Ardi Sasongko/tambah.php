<?php
$conn = mysqli_connect("localhost","root","","responsi");
?>

<!DOCTYPE html>
<html>
<head>
	<title>TAMBAH</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<div style="background-color: blue; color: white; height: 50px;">
		<center>Tambah Inventaris</center>
	</div>
	
	<div class="container" style="margin-top:20px">
		
		<form enctype="multipart/form-data" method="post">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kode barang</label>
					<div class="col-sm-6">
						<input type="text" name="kode" class="form-control" placeholder="Kode barang">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama barang</label>
					<div class="col-sm-6">
						<input type="text" name="nama" class="form-control" placeholder="Nama barang">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jumlah</label>
					<div class="col-sm-2">
						<input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Satuan</label>
					<div class="col-sm-2">
						<input type="text" name="satuan" class="form-control" placeholder="satuan">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Datang</label>
					<div class="col-sm-4">
						<input type="date" name="tanggal" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kategori</label>
					<div class="col-sm-4">
						<select name="kategori" class="form-control" required>
							<option value="">PILIH KATEGORI</option>
							<option value="Bangunan">Bangunan</option>
							<option value="Kendaraan">Kendaraan</option>
							<option value="Alat Tulis Kantor">Alat Tulis kantor</option>
							<option value="Elektronik">Elektronik</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Status</label>
					<div class="col-sm-4">
						<td>
							<input type="radio" name="status" value="Baik"> Baik
							<input type="radio" name="status" value="Perawatan"> Perawatan
							<input type="radio" name="status" value="Rusak"> Rusak
						</td>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Harga satuan</label>
					<div class="col-sm-6">
						<input type="number" name="harga" class="form-control" placeholder="harga satuan">
					</div>
				</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<button class="btn btn-primary"><a href="index.php">Batal</a></button>
				</div>
			</div>
		</form>
		
	</div>
	
</body>
</html>

		<?php
		if(isset($_POST['submit'])){
			
			$sql = mysqli_query($conn, "INSERT INTO inventaris(kode_barang,nama_barang,jumlah,satuan,tgl_datang,kategori,status_barang,harga) VALUES('$_POST[kode]','$_POST[nama]','$_POST[jumlah]','$_POST[satuan]','$_POST[tanggal]','$_POST[kategori]','$_POST[status]','$_POST[harga]')") or die(mysqli_error($conn));
			
			echo "<div class='alert alert-info'> Data Tersimpan </div>";
			echo "<meta http-equiv='refresh' content='1;url=daftar.php'>";
		}
		?>