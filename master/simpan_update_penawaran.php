<?php

include_once "../koneksi.php";

$id_barang = $_POST['id_barang'];
$id_penjual = $_POST['id_penjual'];
$id_pembeli = $_POST['id_pembeli'];
$nama_pembeli = $_POST['nama_pembeli'];
$nama_barang = $_POST['nama_barang'];
$harga_barang = $_POST['harga_barang'];
$bobot = $_POST['bobot'];
$deskripsi = $_POST['deskripsi'];

class emp{}

if (empty($nama_barang) || empty($harga_barang)) {
	$response = new emp();
	$response->success = 0;
	$response->message = "Kolom isian tidak boleh kosong";
	die(json_encode($response));
} else {
	$query = mysqli_query($con,"UPDATE tabel_barang SET harga_awal='".$harga_barang."' WHERE id_barang='".$id_barang."'");
		
		if ($query) {
			$query2 = mysqli_query($con,"INSERT INTO tabel_penawaran(id_penawaran, id_barang, id_penjual, id_pembeli, nama_pembeli, harga_tawar) VALUES (0,'".$id_barang."','".$id_penjual."','".$id_pembeli."','".$nama_pembeli."','".$harga_barang."')");
			if($query2){
				$response = new emp();
				$response->success = 1;
				$response->message = "Data berhasil di update";
				die(json_encode($response));
			
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error update Data";
			die(json_encode($response)); 
		}
	}
}

?> 