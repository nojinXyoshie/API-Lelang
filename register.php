<?php


	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	 include_once "koneksi.php";

	 class usr{}

	 $nama_pembeli = $_POST["nama_pembeli"];
	 $nomor_hp = $_POST["nomor_hp"];
	 $email = $_POST["email"];
	 $password = $_POST["password"];
	 $alamat = $_POST["alamat"];

	 if ((empty($nama_pembeli))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom nama tidak boleh kosong";
	 	die(json_encode($response));
	 } 
	 else if((empty($nomor_hp))){
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom no hp tidak boleh kosong";
	 	die(json_encode($response));
	 }
	 else if ((empty($email))){
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom email tidak boleh kosong";
	 	die(json_encode($response));
	 }
	 else if ((empty($password))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom password tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($alamat))) {
		$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom alamat tidak boleh kosong";
	 	die(json_encode($response));
	 } else {
		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE email='".$email."'"));

		 	if ($num_rows == 0){
		 		$level = "pembeli";
		 		$satu = 1;
		 		$query = mysqli_query($con, "INSERT INTO user (email, password, level, status) VALUES('".$email."','".$password."','".$level."','".$satu."')");
		 		if($query){
		 			$query2 = mysqli_query($con, "SELECT * FROM user WHERE email='".$email."'");
		 			$row = mysqli_fetch_array($query2);
		 			$satu = 1;
		 			$query3 = mysqli_query($con, "INSERT INTO tabel_pembeli (id_pembeli, nama_pembeli, alamat, nomor_hp, email, password, status) VALUES(0,'".$nama_pembeli."','".$alamat."','".$nomor_hp."','".$email."','".$password."','".$satu."')");
		 			if ($query3){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Register berhasil, silahkan Login.";
		 			die(json_encode($response));
		 			}
		 		} else {
		 			$response = new usr();
			        $response->success = 0;
			        $response->message = "Registrasi Gagal";
			        die(json_encode($response));
		 		}

		 	} else if ($num_rows == 1) {
		 			$response = new usr();
					$response->success = 0;
		 			$response->message = "Email sudah digunakan";
		 			die(json_encode($response));
		 		}
		 	}

	 mysqli_close($con);

?>	