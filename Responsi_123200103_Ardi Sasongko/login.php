<?php

	session_start();
	
	error_reporting(0);
	$conn = mysqli_connect("localhost","root","","responsi");
	
	if ($conn -> connect_error){
		die('gagal menyambungkan database : '. $connect->connect_error);
	}
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT*FROM petugas WHERE username = '$username' && password = '$password'") or die(mysqli_error($conn));

	$hasil = mysqli_num_rows($result);

	if($hasil > 0){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['namalengkap'] = $namalenkap;
		header("location: index.php");
		$_SESSION["login"] = true;
	}
	else{
		echo "<script>
			alert('Username atau password salah');
			  </script>
		";
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Halaman Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		label{
			display: block;
		}
		table{
			border: 1;
		}
	</style>
</head>

<body>
	<?php
		if (isset($error)) :
		echo "<script>
				alert('Username/Password Salah!');
				</script>
			";
		endif;
	?>
	<div class="container" style="margin-top:20px">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Login</a>
		</div>
	</nav>
	<form action="" method="post">
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">USERNAME</label>
				<div class="col-sm-10">
					<input type="username" name="username" id="username" class="form-control" required>
				</div>
		</div>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">PASSWORD</label>
				<div class="col-sm-10">
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
		</div>
		<table>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="login" id="login" class="btn btn-primary" value="LOGIN">
				</div>
			</div>
		</table>
	</form>
</div>
</body>
</html>