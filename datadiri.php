<!DOCTYPE html>
<html>
<head>
	<title>Form data diri user</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
	
</head>
<body>
	<h3 align="center"> Isi Data Diri Anda</h3>
<div class="login">
<form  method="POST">

	<tr>
		<td> No. Pesan
			<label for="id_pesan"><br>
		<input type="text" name="id_pesan">
			</label>
		</td><br>
		<td> Nama 
			<label for="nama_user"><br>
		<input type="text" name="nama_user">
			</label>
		</td><br>

		<td> E-mail 
			<label for="email"><br>
		<input type="text" name="email" >
			</label>
		</td><br>

		<td> No. Telepon
			<label for="no_hp"><br>
		<input type="number" name="no_hp">
			</label>
		</td><br>
	</tr>
<tr>
	<td><input type="submit" name="save" value="save"></td>
</tr>


<?php
include 'connect.php';
if (isset($_POST['save'])) {
$id_pesan = $_POST['id_pesan'];
$nama_user = $_POST['nama_user'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$result = mysqli_query($connection, "INSERT INTO user (id_pesan, nama_user, no_hp, email) VALUES ($id_pesan, '$nama_user', $no_hp, '$email')" );
if ($result) {
		header("location:join.php");
}
}
?> 
</form>
</div>
</body>
</html>