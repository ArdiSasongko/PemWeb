<?php

$conn = mysqli_connect("localhost","root","","responsi");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
	<div style="background-color: blue; color: white;">
		<center>DAFTAR INVENTARIS BARANG <br>
		KANTOR SERBA ADA</center>
	</div>
	<div style="background-color: lightskyblue">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" href="beranda.php">Beranda</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="daftar.php">Daftar Inventaris</a>
			  </li>
			  <li class="nav-item dropdown">
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH KATEGORI</option>
							<option value="Bangunan">Bangunan</option>
							<option value="Kendaraan">Kendaraan</option>
							<option value="Alat Tulis Kantor">Alat Tulis kantor</option>
							<option value="Elektronik">Elektronik</option>
					</select>
				</div>
			 </li>
			</ul>
			  <span class="navbar-text" style="margin-left: auto">
				 <button class="btn btn-dark"><a href="logout.php">Logout</a></button>
			  </span>
		  </div>
		</nav>
	</div>
	
	<a href="tambah.php" class="btn btn-primary"> Tambah</a>
	<div class="container">
	
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>no</th>
					<th>Kode</th>
					<th>Nama Barang</th>
					<th>Jumlah Satuan</th>
					<th>Tanggal Datang</th>
					<th>Kategori</th>
					<th>Status</th>
					<th>Harga Satuan</th>
					<th>Total Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $data = $conn-> query("SELECT*FROM inventaris");?>
				<?php $total=0;?>
				<?php $no=1; ?>
				<?php while($isi= mysqli_fetch_assoc($data)){ 
				$harga = $isi['harga'];
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $isi['kode_barang'];?></td>
					<td><?php echo $isi['nama_barang']; ?></td>
					<td><?php echo $isi['jumlah']; ?> <?php echo $isi['satuan'];?></td>
					<td><?php echo $isi['tgl_datang']; ?></td>
					<td><?php echo $isi['kategori']; ?></td>
					<td><?php echo $isi['status_barang']; ?></td>
					<td>Rp. <?php echo number_format($harga); ?></td>
					<td>Rp. <?php echo number_format($isi['harga']*$isi['jumlah']);?></td>
					<td>
						<a href="hapus.php?kode=<?php echo $isi ['kode_barang']; ?>" class="btn-danger btn">hapus</a>
						<a  href="edit.php?kode=<?php echo $isi ['kode_barang']; ?>" class="btn-warning btn">edit</a>
					</td>
				</tr>
				<?php $no++;?>
				<?php $total+=$harga ?>
				<?php } ?>
			</tbody>
			<tfoot>
					<tr>
						<th colspan="7">Total</th>
						<th>Rp. <?php echo number_format($total)?></th>
					</tr>
			</tfoot>
		</table>
		<br>
		
	</div>
</body>
</html>







