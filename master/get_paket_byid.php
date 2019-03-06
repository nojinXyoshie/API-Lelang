<?php 
	include "../koneksi.php";
	$id_penjual = $_POST['id_penjual'];	
	$query = mysqli_query($con,"SELECT * FROM tabel_penjual WHERE id_penjual = '$id_penjual'");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
	
?>