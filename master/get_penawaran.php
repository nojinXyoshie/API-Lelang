<?php 
	include "../koneksi.php";
	
	$id_pembeli = $_POST['id_pembeli'];
	$query = mysqli_query($con,"SELECT * FROM tabel_data_lelang where id_pembeli = '$id_pembeli'") or die (mysqli_error($con));
	
	$json = array();
	
	// $row = $mysqli_fetch_array($query);
	// for ($i=0; $i <sizeof($row) ; $i++) { 
	// 	$id_order = $row[$i]['id_order'];

	// 	$query2 = mysqli_query($con,"SELECT * FROM detail_order where id_order = '$id_order'") or die(mysqli_error($con));
	// 	$row2 = $mysqli_fetch_array($query2);
	// 	$row[$i]['detail_pesanan'] = $row2[0];


	// }
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;


	
	}
	
	for ($i=0; $i < sizeof($json); $i++) { 
		$id_lelang = $json[$i]['id_lelang'];
		$query2 = mysqli_query($con,"SELECT * FROM tabel_detail_lelang where id_lelang = '$id_lelang'") or die(mysqli_error($con));

		while($row = mysqli_fetch_assoc($query2)){

		$id_barang = $row['id_barang'];
		$query3 = mysqli_query($con,"SELECT * FROM tabel_barang where id_barang = '$id_barang'") or die(mysqli_error($con));
			while($row2 = mysqli_fetch_assoc($query3)){
				$row['tabel_barang'] = $row2;
			}

		$json[$i]['detail'] = $row;

		}
		
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
	
?>