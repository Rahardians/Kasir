<?php 
	require 'config.php';
	$koneksi = mysqli_connect("localhost","root","","db_toko");
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> penjualan();
	$idprint = $_GET['id_nota'];
	$kodenota = mysqli_query($koneksi,"SELECT id_nota FROM nota_backup WHERE id_nota='".$idprint."';");
	$nama_pelanggan = mysqli_query($koneksi,"SELECT nama_pelanggan FROM nota_backup WHERE id_nota='".$idprint."';");
	$tanggal_input = mysqli_query($koneksi,"SELECT tanggal_input FROM nota_backup WHERE nota_backup.id_nota='".$idprint."';");
	$row = mysqli_fetch_array($nama_pelanggan);
	$row2 = mysqli_fetch_array($kodenota);
	$row3 = mysqli_fetch_array($tanggal_input);
?>
<html>
	<head>
		<title>print</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center><b>
						<br>
						<p>KARUNIA PLASTIK</p>
						<p style="font-size:12px;">Jl. Raya Ciberem Sumbang (utara lapangan desa ciberem)</p>
						<hr>
						<div style="margin-top:-15px;">
							<font style="font-size: 12px;">
							<p><?php  echo $row3[0];?></p>
							<p>Kasir : <?php  echo $_GET['nama'];?></p>
							<p>Pelanggan : <?php echo $row[0];?></p>
							<p>ID NOTA : <?php echo $row2[0];?></p>
							</font>
						</div>	
						<hr>
						</b>
					</center>
					<table class="table table-bordered" style="width:100%;">
						<tr>
							<td>No.</td>
							<td>Barang</td>
							<td>Jumlah</td>
							<td>Total</td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
						</tr>
						<?php $no++; 
						echo $isi['nama_pelanggan'];}?>
					</table>
					<div class="pull-right">
						<?php $hasil = $lihat -> jumlah(); ?>
						Total : Rp.<?php echo number_format($hasil['bayar']);?>,-
						<br/>
						Bayar : Rp.<?php echo number_format($_GET['bayar']);?>,-
						<br/>
						Kembali : Rp.<?php echo number_format($_GET['kembali']);?>,-
					</div>
					<div class="clearfix"></div><br>
					<center>
						<p style="font-size:12px;">Barang yang sudah dibeli tidak dapat ditukar / dikembalikan</p>
						<p>Terima Kasih Telah berbelanja di toko kami !</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
