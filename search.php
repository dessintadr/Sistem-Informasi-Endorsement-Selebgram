<?php
include 'connect.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Selebgram</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
<h3 align="center"> DATA SELEBGRAM </H3>
<div class="tabelsearch">
<form method = "POST" align="center"> 
<input type = "text" name="nama" placeholder="Cari Nama Selebgram" />
<input type = "submit" name="search" value="Cari"/>
</form> 
<br>
<table border="1px" width="80%" height="10px" align="center">
		<tr align="center">
		<td> NO </td>
		<td> NAMA </td>
		<td> ID SELEBGRAM</td>
		<td> ID ENDORSMENT</td>
		<td> JUMLAH FOLLOWERS </td>
	</tr>
<?php
include 'connect.php';
$no = 1;
$query = $_POST['nama'];
if($query != ''){
	$select = mysqli_query($connection, "SELECT * FROM selebgram WHERE id_seleb LIKE '%".$query."%' OR nama LIKE '%".$query."%' OR id_pesan LIKE '%".$query."%' ");
}else{
	$select = mysqli_query($connection, "SELECT * FROM selebgram");
}
while($baris = mysqli_fetch_array($select)){
?>
	<tr align="center"> 
	    <td><?php echo $no++ ?></td>
    	<td><a href="addjenpos.php"><?php echo $baris['nama']?></td>
    	<td><?php echo $baris['id_seleb']?></td>
    	<td><?php echo $baris['id_pesan']?></td>
    	<td><?php echo $baris['jml_followers']?></td>
    </tr>

<?php } ?>
</form>
</table>
</div>
</body>
</html>