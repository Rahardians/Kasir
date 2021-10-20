<section id="main-content">
          <section class="wrapper">
          	<h1>DATA NOTA</h1>
		    <div class="modal-view">
				<table class="table table-bordered table-striped" id="example1">
					<thead>
						<tr style="background:#DFF0D8;color:#333;">
							<th style="width:10%;">No.</th>
							<th>ID NOTA</th>
							<th>ID BARANG</th>
							<th>KASIR</th>
							<th>JUMLAH</th>
							<th>TOTAl</th>
							<th>NAMA PELANGGAN</th>
							<th>TANGGAL</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>

					<?php 
						$koneksi = mysqli_connect("localhost","root","","db_toko");
						$sql = mysqli_query($koneksi,"SELECT nota_backup.*,barang.*,kasir.* FROM nota_backup INNER JOIN
						barang ON nota_backup.id_barang = barang.id_barang INNER JOIN kasir ON nota_backup.id_kasir = kasir.id_kasir
						GROUP BY id_nota ORDER BY id_nota DESC");
						$hasil = $sql;
						
						$no=1;
						foreach($hasil as $isi) {
					?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $isi['id_nota'];?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['nama'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
							<td><?php echo $isi['nama_pelanggan'];?></td>
							<td><?php echo $isi['tanggal_input'];?></td>
							<td>
								<a href="admin/module/cetaknota/print/index.php?kasir=<?php echo $isi['id_nota'];?>"><button class="btn btn-warning btn-sm">Print</button></a></td>
						</tr>
					<?php 
						}
					?>
					</tbody>
				</table>
			</div>
			<div class="clearfix" style="margin-top:7pc;"></div>
		</section>
	</section>