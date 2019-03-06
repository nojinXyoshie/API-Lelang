<?php
	/* ===== www.dedykuncoro.com ===== */
/*	include 'koneksi.php';
	
	class usr{}
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	if ((empty($username)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");
	
	$row = mysql_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['username'];
		$response->id = $row['id'];
		$response->username = $row['username'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Username atau password salah";
		die(json_encode($response));
	}
	
	mysql_close();
*/

	//=================== KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI RI UNREMARK ========
	 include_once "koneksi.php";

	 class usr{}
	
	 $email = $_POST["email"];
	 $password = $_POST["password"];
	 $id_pembeli = "";
	 $nama_pembeli = "";
	 $id_penjual = "";
	 $nama_penjual = "";
	
	 if ((empty($email)) || (empty($password))) { 
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom tidak boleh kosong"; 
	 	die(json_encode($response));
	 }
	 $satu = 1;
	 $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='$satu'");
	
	 $row = mysqli_fetch_array($query);

	 if($row['level']=="pembeli"){
	 	
	 	$query_pembeli = mysqli_query($con, "SELECT * FROM tabel_pembeli WHERE email='$email' AND password='$password'");
	 	
	 	$row_pembeli = mysqli_fetch_array($query_pembeli);

	 	$id_pembeli = $row_pembeli['id_pembeli'];
	 	$nama_pembeli = $row_pembeli['nama_pembeli'];
		$email = $row_pembeli['email'];

		if (!empty($row)){
		 	$response = new usr();
		 	$response->success = 1;
		 	$response->message = "Selamat datang ".$nama_pembeli;
		 	$response->id_pembeli = $id_pembeli;
		 	$response->level = $row['level'];
			$response->email = $email;
			$response->nama_pembeli = $nama_pembeli;
		 	die(json_encode($response));
			
		} else { 
		 	$response = new usr();
		 	$response->success = 0;
		 	$response->message = "Username atau password salah";
		 	die(json_encode($response));
	 	}

	 }else if($row['level']=="penjual"){
	 	$query_penjual = mysqli_query($con, "SELECT * FROM tabel_penjual WHERE email = '$email' AND password='$password'");
	 	$row2 = mysqli_fetch_array($query_penjual);

	 	$id_penjual = $row2['id_penjual'];
	 	$nama_penjual = $row2['nama_penjual'];
		$email = $row2['email'];

		if (!empty($row)){
		 	$response = new usr();
		 	$response->success = 1;
		 	$response->message = "Selamat datang ".$nama_penjual;
		 	$response->id_pembeli = $id_penjual;
		 	$response->level = $row['level'];
			$response->email = $email;
			$response->nama_pembeli = $nama_penjual;
		 	die(json_encode($response));
			
		} else { 
		 	$response = new usr();
		 	$response->success = 0;
		 	$response->message = "Username atau password salah";
		 	die(json_encode($response));
	 	}
	}
	
	 mysqli_close($con);

?>