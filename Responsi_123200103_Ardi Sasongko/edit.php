<?php
	$conn = mysqli_connect("localhost","root","","responsi");
	$sql = mysqli_query($conn, "SELECT * FROM inventaris WHERE kode_barang = '$_GET[kode]'") or die(mysqli_error($conn));
	$data = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div style="background-color: blue; color: white; height: 50px;">
		<center>Edit Inventaris</center>
	</div>
	
	<div class="container" style="margin-top:20px">
		
		<form enctype="multipart/form-data" method="post">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kode barang</label>
					<div class="col-sm-6">
						<input type="text" name="kode" class="form-control" value="<?php echo $data['kode_barang'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama barang</label>
					<div class="col-sm-6">
						<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_barang'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jumlah</label>
					<div class="col-sm-2">
						<input type="number" name="jumlah" class="form-control" value="<?php echo $data['jumlah'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Satuan</label>
					<div class="col-sm-2">
						<input type="text" name="satuan" class="form-control" value="<?php echo $data['satuan'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Datang</label>
					<div class="col-sm-4">
						<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tgl_datang'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kategori</label>
					<div class="col-sm-4">
						<select name="kategori" class="form-control" >
							<option value="<?php echo $data['kategori'] ?>">PILIH KATEGORI</option>
							<option value="<?php echo $data['kategori'] ?>">Bangunan</option>
							<option value="<?php echo $data['kategori'] ?>">Kendaraan</option>
							<option value="<?php echo $data['kategori'] ?>">Alat Tulis kantor</option>
							<option value="<?php echo $data['kategori'] ?>">Elektronik</option>
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
						<input type="number" name="harga" class="form-control" value="<?php echo $data['harga'] ?>">
					</div>
				</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="edit" class="btn btn-primary" value="Ubah">
				</div>
			</div>
		</form>
		
	</div>
	
	
</body>
</html>

		<?php
		if(isset($_POST['edit'])){
			
		$conn->query("UPDATE inventaris SET kode_barang = '$_POST[kode]',nama_barang = '$_POST[nama]', jumlah = '$_POST[jumlah]', satuan = '$_POST[satuan]', tgl_datang='$_POST[tanggal]',kategori = '$_POST[kategori]',status_barang = '$_POST[status]',harga = '$_POST[harga]' WHERE kode_barang = '$_GET[kode]'") or die(mysqli_error($conn));
			
			echo "<div class='alert alert-info'> Data Tersimpan </div>";
			echo "<meta http-equiv='refresh' content='1;url=daftar.php'>";
		}
		?>