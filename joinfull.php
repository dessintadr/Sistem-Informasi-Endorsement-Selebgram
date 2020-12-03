<?php
include 'connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Lengkap Pemesanan</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
	<table align="right">
		<td> <form action="loginpage.php" align="center">
    <input type="submit" value="KEMBALI"> </td>
	</table>
	<br>
	<br>
	<h3 align="center"> DAFTAR LENGKAP PEMESANAN </h3>
		<tr>

<form action="edit.php" method="GET">
<table border="1px" width="100%" height="15px" align="center">
	<tr align="center">
	<td> No. </td>
	<td>No Pesanan</td>
	<td>User Name </td>
	<td> email </td>
	<td> No. HP </td>
	<td> Nama Selebgram</td>
	<td> Foto  </td>
	<td> Video</td>
	<td> Makanan</td>
	<td> Fashion</td>
	<td> Skincare</td>
	<td> OPSI</td>
</tr>
</tr>
<?php
include 'connect.php';
$no = 1;
$result = mysqli_query($connection, "SELECT A.id_pesan, A.nama_user, A.no_hp, A.email, B.nama, C.foto, C.video, D.makanan, D.fashion, D.skincare FROM  user A INNER JOIN Selebgram B ON A.id_pesan = B.id_pesan INNER JOIN jenis_postingan C ON a.id_user = c.id_jenpos INNER JOIN produk D ON A.id_user=D.id_produk ");
foreach ($result as $data) {
	# code...
?>
<tr align="center">
	<td> <?php echo $no++ ; ?> </td>
	<td><?php echo $data ['id_pesan'] ?></td>
	<td><?php echo $data ['nama_user'] ?></td>
	<td><?php echo $data ['email'] ?></td>
	<td><?php echo $data ['no_hp'] ?></td>
	<td><?php echo $data ['nama'] ?></td>
	<td><?php echo $data ['foto'] ?></td>
	<td><?php echo $data ['video'] ?></td>
	<td><?php echo $data ['makanan'] ?></td>
	<td><?php echo $data ['fashion'] ?></td>
	<td><?php echo $data ['skincare'] ?></td>
	<td>  <a  href= "edit.php?id_pesan=<?php echo $data['id_pesan']; ?>"> Edit Pesanan </a>
	<a  href= "delete.php?id_pesan=<?php echo $data['id_pesan']; ?>"> Hapus </a>
 </td>
	</tr>
<?php 
} ?>
</table>
</form>
</body>
</html>
