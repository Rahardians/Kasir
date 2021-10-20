<?php 
	require '../../../../config.php';
	session_start();
	$id = $_SESSION['admin']['nama'];
	$nama=$_SESSION["nama"];
	$idprint = $_GET['kasir'];
	$koneksi = mysqli_connect("localhost","root","","db_toko");
	$nama_pelanggan = mysqli_query($koneksi,"SELECT nama_pelanggan FROM nota_backup WHERE id_nota='".$idprint."';");
	$nama_kasir = mysqli_query($koneksi,"SELECT nama FROM kasir,nota_backup WHERE nota_backup.id_nota='".$idprint."' AND nota_backup.id_kasir = kasir.id_kasir;");
	$tanggal_input = mysqli_query($koneksi,"SELECT tanggal_input FROM nota_backup WHERE nota_backup.id_nota='".$idprint."';");
	$kodenota = mysqli_query($koneksi,"SELECT id_nota FROM nota_backup WHERE id_nota='".$idprint."';");
	$bayar = mysqli_query($koneksi,"SELECT bayar FROM nota_backup WHERE id_nota='".$idprint."';");
	$total = mysqli_query($koneksi,"SELECT total FROM nota_backup WHERE id_nota='".$idprint."';");
	$sql = mysqli_query($koneksi,"SELECT nota_backup.*,barang.*,kasir.* FROM nota_backup INNER JOIN
						barang ON nota_backup.id_barang = barang.id_barang INNER JOIN kasir ON nota_backup.id_kasir = kasir.id_kasir
						WHERE nota_backup.id_nota= '".$idprint."';");
	$hsl = $sql;
	$row = mysqli_fetch_array($nama_pelanggan);
	$row2 = mysqli_fetch_array($nama_kasir);
	$row3 = mysqli_fetch_array($tanggal_input);
	$row4 = mysqli_fetch_array($kodenota);
	$rowbayar = mysqli_fetch_array($bayar);
	$rowtotal = mysqli_fetch_array($total);
	$hitung = $rowbayar[0] - $rowtotal[0];
?>
<html>
	<head>
		<title>print</title>
		<link rel="stylesheet" href="../../../../assets/css/bootstrap.css">
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
								<p>Kasir : <?php  echo $row2[0];?></p>
								<p>Pelanggan : <?php echo $row[0];?></p>
								<p>ID NOTA : <?php echo $row4[0];?></p>
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
						}?>
					</table>
					<div class="pull-right">
						<?php
						$totalnya = mysqli_query($koneksi,"SELECT SUM(total) as total FROM nota_backup WHERE id_nota='".$idprint."';");
						$hasil = mysqli_fetch_array($totalnya); ?>
						Total : Rp.<?php echo number_format($hasil[0]);?>,-
						<br/>
						Bayar : Rp.<?php echo number_format($rowbayar[0]);?>,-
						<br/>
						Kembali : Rp.<?php echo number_format($hitung);?>,-
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
