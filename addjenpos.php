<!DOCTYPE html>
<html>
<head>
	<title> Pilih Jenis Endorsment</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
	<h3 align="center"> ISI JENIS ENDORSMENT </h3>
<div class="login"> 
<form method="POST">
	<tr>
		<td class="font">ID SELEBGRAM </td><br>
		<td><input type="number" name="id_seleb" placeholder="Isi Sesuai ID SELEBGRAM">
		</td>
	</tr><br>
	<tr>
		<td class="font">NOMOR PESAN </td><br>
		<td><input type="number" name="id_pesan" placeholder="Isi Sesuai ID Endorsment">
		</td>
	</tr><br>
	<tr>
		<th align="center" class="font">Jenis Postingan </th> </br>
		<th align="center"><label for="foto"> Foto <input type="checkbox" name="foto" value="foto"> </label></th>
		<th align="center"><label for="video"> Video <input type="checkbox" name="video" value="video"> </label></th>
	</tr> <br>
	<tr>
		<th align="center" class="font"> Produk </th> <br>
		<th align="center"><label for="makanan"> Makanan <input type="checkbox" name="makanan" value="makanan"> </label></th>
		<th align="center"><label for="fashion"> Fashion <input type="checkbox" name="fashion" value="fashion"> </label></th>
		<th align="center"><label for="skincare"> Skincare <input type="checkbox" name="skincare" value="skincare"> </label></th>
	</tr><br>
	<td>
			<input type="submit" name="save" value="Save">
	</td>
</form>	
</div>
<?php
include 'connect.php';
if (isset($_POST['save'])) {
	$id_seleb = $_POST['id_seleb'];
	$id_pesan = $_POST['id_pesan'];
	$foto = $_POST['foto'];
	$video = $_POST['video'];
	$makanan = $_POST['makanan'];
	$fashion = $_POST['fashion'];
	$skincare = $_POST['skincare'];


	$query = mysqli_query($connection, "INSERT INTO jenis_postingan (id_seleb, id_pesan, foto, video) 
		VALUES ($id_seleb, $id_pesan, '$foto', '$video') ");

	$query = mysqli_query($connection, "INSERT INTO produk (id_seleb, id_pesan, makanan, fashion, skincare) 
		VALUES ($id_seleb, $id_pesan, '$makanan', '$fashion', '$skincare')");

	if ($query) {
		header("location:datadiri.php");
	}
?>
<<?php } ?>	
</body>  
</html>