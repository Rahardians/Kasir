<?php 
session_start();
if(!empty($_SESSION['admin']) || !empty($_SESSION['id_kasir'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM kategori WHERE id_kategori=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM barang WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['admin'])){
		$id= $_GET['id_login'];
		$data[] = $id;
		$sql = 'DELETE FROM login WHERE id_login=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=admin&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['kasir'])){
		$id= $_GET['id_kasir'];
		$data[] = $id;
		$sql = 'DELETE FROM kasir WHERE id_kasir=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kasir&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['jual'])){
		
		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from barang where id_barang=?';
		$rowI = $config -> prepare($sqlI);
		$rowI -> execute($dataI);
		$hasil = $rowI -> fetch();
		
		/*$jml = $_GET['jml'] + $hasil['stok'];
		
		$dataU[] = $jml;
		$dataU[] = $_GET['brg'];
		$sqlU = 'UPDATE barang SET stok =? where id_barang=?';
		$rowU = $config -> prepare($sqlU);
		$rowU -> execute($dataU);*/
		
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if(!empty($_GET['jual_kasir'])){
		
		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from barang where id_barang=?';
		$rowI = $config -> prepare($sqlI);
		$rowI -> execute($dataI);
		$hasil = $rowI -> fetch();
		
		/*$jml = $_GET['jml'] + $hasil['stok'];
		
		$dataU[] = $jml;
		$dataU[] = $_GET['brg'];
		$sqlU = 'UPDATE barang SET stok =? where id_barang=?';
		$rowU = $config -> prepare($sqlU);
		$rowU -> execute($dataU);*/
		
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../kasir/index.php?page=jual"</script>';
	}
	if(!empty($_GET['penjualan'])){
		
		$sqlI = 'INSERT INTO nota SELECT * FROM penjualan';
		$rowI = $config -> prepare($sqlI);
		$rowI -> execute($dataI);
		
		$sql = 'DELETE FROM penjualan';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if(!empty($_GET['penjualan_kasir'])){
		
		$sqlI = 'INSERT INTO nota SELECT * FROM penjualan';
		$rowI = $config -> prepare($sqlI);
		$rowI -> execute($dataI);
		
		$sql = 'DELETE FROM penjualan';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../kasir/index.php?page=jual"</script>';
	}
	if(!empty($_GET['laporan'])){
		
		$sql = 'DELETE FROM nota';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=laporan&remove=hapus"</script>';
	}
}

