<?php
 session_start();
 $username = $_SESSION['username'];
 $conn = mysqli_connect("localhost","root","","responsi");
 $sql = mysqli_query($conn, "SELECT*FROM petugas WHERE username ='$username'");
 $isi = mysqli_fetch_assoc($sql);

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
	
	<div>
	<center>
	<div style="font-size: 38px; color: black">Selamat Datang <br>
		<strong><?php echo $isi['nama_lengkap']; ?></strong>
	</div>
	</center>
	</div>
</body>
</html>