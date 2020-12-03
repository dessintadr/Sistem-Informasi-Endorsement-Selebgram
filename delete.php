<?php 
include "connect.php";
$id_pesan = $_GET['id_pesan'];
mysqli_query($connection, "DELETE FROM user WHERE id_pesan ='$id_pesan' ");
header("location:joinfull.php");
?>