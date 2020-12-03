<?php
include'connect.php';
	$username = $_POST['username'];
	$password = md5 ($_POST['password']);

if (!empty($username) && !empty($password)){
	$data = mysqli_query($connection, "SELECT * FROM login where username='$username' AND password='$password' ");
	$result = mysqli_num_rows($data);
	if ($result) {
		echo "Login Behasil";
		header("location:search.php");
	}else{
		echo "<script>window.alert('Username dan Password Salah')
		window.location='loginpage.php'</script>";
		
	}
	
}
?>