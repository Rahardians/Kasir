<?php 
session_start();
if(!empty($_SESSION['admin']) || !empty($_SESSION['id_kasir'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if(!empty($_GET['admin'])){
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$nama = $_POST['nama'];
		$pertanyaan = $_POST['pertanyaan'];
		$jawaban = $_POST['jawaban'];

		$data[] = $user;
		$data[] = $pass;
		$data[] = $nama;
		$data[] = $pertanyaan;
		$data[] = $jawaban;
		$sql = 'INSERT INTO login (user,pass,nama,pertanyaan,jawaban) VALUES (?,?,?,?,?)';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=admin&&success=tambah-data"</script>';
	}
	if(!empty($_GET['kasir'])){
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$nama = $_POST['nama'];
		$pertanyaan = $_POST['pertanyaan'];
		$jawaban = $_POST['jawaban'];
		$data[] = $user;
		$data[] = $pass;
		$data[] = $nama;
		$data[] = $pertanyaan;
		$data[] = $jawaban;
		$sql = 'INSERT INTO kasir (user,pass,nama,pertanyaan,jawaban) VALUES (?,?,?,?,?)';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=kasir&&success=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
		$kasir =  $_GET['id_kasir'];
		$jumlah = '0';
		$total = '0';
		$tgl = date("j F Y, G:i");
		
		$data1[] = $id;
		$data1[] = $kasir;
		$data1[] = $jumlah;
		$data1[] = $total;
		$data1[] = $tgl;
		$sql1 = 'INSERT INTO penjualan (id_barang,id_kasir,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
		$row1 = $config -> prepare($sql1);
		$row1 -> execute($data1);
 		echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual_kasir'])){
		$id = $_GET['id'];
		$kasir =  $_GET['id_kasir'];
		$satuan = $_GET['satuan'];
		$jumlah = '0';
		$total = '0';
		$tgl = date("j F Y, G:i");
		
		$data1[] = $id;
		$data1[] = $kasir;
		$data1[] = $satuan;
		$data1[] = $jumlah;
		$data1[] = $total;
		$data1[] = $tgl;
		$sql1 = 'INSERT INTO penjualan (id_barang,id_kasir,satuan,jumlah,total,tanggal_input) VALUES (?,?,?,?,?,?)';
		$row1 = $config -> prepare($sql1);
		$row1 -> execute($data1);
 		echo '<script>window.location="../../kasir/index.php?page=jual&success=tambah-data"</script>';
	}
}