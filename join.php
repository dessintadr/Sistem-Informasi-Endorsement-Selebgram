<?php
include 'connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Data User dan Selebgram </title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>

<h3 align="center"> DAFTAR PESANAN </h3>
<br>
<form action="" method="GET">
<table border="1px" width="100%" height="15px" align="center">
	<tr align="center">
	<td> No. </td>
	<td>No Pesanan</td>
	<td>User Name </td>
	<td> Email </td>
	<td> No. HP </td>
	<td> Nama Selebgram</td>
	<td> Jumlah Folowers </td>
	<td> Detail Lengkap</td>
</tr>
		<?php
include 'connect.php';
$no = 1;
$result = mysqli_query($connection, "SELECT A.id_pesan, A.nama_user, A.no_hp, A.email, B.nama, B.jml_followers FROM  user A INNER JOIN Selebgram B ON A.id_pesan = B.id_pesan ");

foreach ($result as $data) {
	# code...
?>
	<tr align="center">
		<td><?php echo $no++ ; ?></td>
		<td><?php echo $data ['id_pesan'] ;?></td>
		<td><?php echo $data ['nama_user'] ; ?></td>
		<td><?php echo $data ['email'] ;?></td>
		<td><?php echo $data ['no_hp'] ;?></td>
		<td><?php echo $data ['nama'] ;?></td>
		<td><?php echo $data ['jml_followers'] ;?></td>
		<td> <a href="joinfull.php"> Lihat Detail Pesanan </a></td>
	</tr>
<?php 
} ?>
</table>
</form>
</body>
</html>
	
