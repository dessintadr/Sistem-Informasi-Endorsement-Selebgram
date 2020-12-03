<?php
include 'connect.php';
//error_reporting(0);

if (isset($_POST['SIMPAN'])) {
	$id_pesan = $_POST['id_pesan'];
	$nama_user = $_POST['nama_user'];
	$email = $_POST['email'];
	$no_hp = $_POST['no_hp'];
	$foto = $_POST['foto'];
	$video = $_POST['video'];
	$makanan = $_POST['makanan'];
	$fashion = $_POST['fashion'];
	$skincare = $_POST['skincare'];

	$result = mysqli_query($connection, "UPDATE user SET id_pesan='$id_pesan' , nama_user='$nama_user', email='$email', no_hp='$no_hp' WHERE id_pesan='$id_pesan' ");
	
	$result = mysqli_query($connection, "UPDATE jenis_postingan SET id_seleb='$id_seleb', id_pesan='$id_pesan', foto='$foto', video='$video' WHERE id_pesan='$id_pesan' ");

	$result = mysqli_query($connection, "UPDATE produk SET id_seleb='$id_seleb', id_pesan='id_pesan', makanan='$makanan', fashion='$fashion', skincare='skincare' WHERE id_pesan='$id_pesan' ");

	header("location:joinfull.php");
}
	$id_pesan =$_GET['id_pesan'];
	$result = mysqli_query($connection, "SELECT A.id_pesan, A.nama_user, A.no_hp, A.email, B.nama, C.foto, C.video, D.makanan, D.fashion, D.skincare FROM  user A INNER JOIN Selebgram B ON A.id_pesan = B.id_pesan INNER JOIN jenis_postingan C ON a.id_user = c.id_jenpos INNER JOIN produk D ON A.id_user=D.id_produk WHERE A.id_pesan='$id_pesan' ");
	?>
		
<html>
<head>
<link rel ="Stylesheet" href="theme.css">
    <title> Edit Pesanan </title>
</head>
<div class="edit">
<body>
<h3 align="center"> Update Pesanan Anda </h3>
<form action="edit.php" method="post">
<table align="center">
	<?php
	while ($data = mysqli_fetch_array($result)) {
		// //$id_pesan = $data['id_pesan'];
		// //$nama_user = $data['nama_user'];
		// $email = $data['email'];
		// $no_hp = $data['no_hp'];
		echo'
    <tr>
<td> NO PESANAN </td><br>
<td> <input type="text" name="id_pesan" value=" '.$data['id_pesan'].'"></td>
    </tr>
    <tr>
        <td>NAMA USER</td><br>
        <td> 
        <input type="text" name="nama_user" value=" '.$data['nama_user'].'"></td>
    </tr>
     <tr>
        <td>EMAIL </td><br>
        <td>
        <input type="text" name="email" value="'.$data['email'].'"></td>
    </tr>
     
     <tr>
        <td>NO. HP</td><br>
        <td>
        <input type="text" name="no_hp" value=" '.$data['no_hp'].'"></td>
    </tr>
	 <tr>
    	<th align="center">Jenis postingan </th> <br>
		<th align="center"><label for="foto"> foto <input type="checkbox" name="foto" value="foto"> </label></th>
		<th align="center"><label for="video"> video <input type="checkbox" name="video" value="video"> </label></th>
    	</tr>
    	<tr>
    	<th align="center">Produk </th><br>
		<th align="center"><label for="makanan"> makanan <input type="checkbox" name="makanan" value="makanan"> </label></th>
		<th align="center"><label for="fashion"> fashion <input type="checkbox" name="fashion" value="fashion"> </label></th>
		<th align="center"><label for="skincare"> skincare <input type="checkbox" name="skincare" value="skincare"> </label></th>
    </tr>';
    	}
?>
<tr>
<td> 
	<input type="submit" name="SIMPAN" class="SIMPAN" value="SIMPAN">
</td>
</tr>
</form>
</table>
</div>
</body>
</html>