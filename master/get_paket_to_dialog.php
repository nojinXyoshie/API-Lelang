<?php
	include "../koneksi.php";
	
	$id_	= $_POST['id_barang'];
	
	class emp{}
	
	if (empty($id)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Error Mengambil Data"; 
		die(json_encode($response));
	} else {
		$query 	= mysqli_query($con,"SELECT * FROM tabel_barang WHERE id_barang='".$id."'");
		$row 	= mysqli_fetch_array($query);
		
		if (!empty($row)) {
			$response = new emp();
			$response->success = 1;
			$response->id_barang = $row["id_barang"];
			$response->id_penjual = $row["id_penjual"];
			$response->nama_ikan = $row["nama_ikan"];
			$response->harga_awal = $row["harga_awal"];
			die(json_encode($response));
		} else { 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Mengambil Data";
			die(json_encode($response)); 
		}
	}
?>