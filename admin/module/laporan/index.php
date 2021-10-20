 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
	  <?php 
			$bulan_tes =array(
				'01'=>"Januari",
				'02'=>"Februari",
				'03'=>"Maret",
				'04'=>"April",
				'05'=>"Mei",
				'06'=>"Juni",
				'07'=>"Juli",
				'08'=>"Agustus",
				'09'=>"September",
				'10'=>"Oktober",
				'11'=>"November",
				'12'=>"Desember"
			);
		?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>
							<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
								<button class="btn btn-danger">RESET</button>
							</a>-->
							<?php if(!empty($_GET['cari'])){ ?>
								Data Laporan Penjualan <?= $bulan_tes[$_POST['bln']];?> <?= $_POST['thn'];?>
							<?php }elseif(!empty($_GET['hari'])){?>
								Data Laporan Penjualan <?= $_POST['hari'];?>
							<?php }else{?>
								Data Laporan Penjualan <?= $bulan_tes[date('m')];?> <?= date('Y');?>
							<?php }?>
						</h3>
						<br/>
						<h4>Cari Laporan Per Bulan</h4>
						<form method="post" action="index.php?page=laporan&cari=ok">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Bulan
									</th>
									<th>
										Pilih Tahun
									</th>
									<th>
										Aksi
									</th>
								</tr>
								<tr>
								<td>
								<select name="bln" class="form-control">
									<option selected="selected" value="kosong">Bulan</option>
									<?php
										$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
										$jlh_bln=count($bulan);
										$bln1 = array('01','02','03','04','05','06','07','08','09','10','11','12');
										$no=1;
										for($c=0; $c<$jlh_bln; $c+=1){
											echo"<option value='$bln1[$c]'> $bulan[$c] </option>";
										$no++;}
									?>
									</select>
								</td>
								<td>
								<?php
									$now=date('Y');
									echo "<select name='thn' class='form-control'>";
									echo '
									<option selected="selected">Tahun</option>';
									for ($a=2017;$a<=$now;$a++)
									{
										echo "<option value='$a'>$a</option>";
									}
									echo "</select>";
									?>
								</td>
								<td>
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="index.php?page=laporan" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['cari'])){?>
										<a href="excel.php?cari=yes&bln=<?=$_POST['bln'];?>&thn=<?=$_POST['thn'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						<form method="post" action="index.php?page=laporan&hari=cek">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Hari
									</th>
									<th>
										Aksi
									</th>
								</tr>
								<tr>
								<td>
									<input type="date" value="<?= date('Y-m-d');?>" class="form-control" name="hari">
								</td>
								<td>
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="index.php?page=laporan" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['hari'])){?>
										<a href="excel.php?hari=cek&tgl=<?= $_POST['hari'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						<div class="clearfix" style="border-top:1px solid #ccc;"></div>
						<br/>
						<br/>
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th> No</th>
										<th> ID Barang</th>
										<th> Nama Barang</th>
										<th style="width:10%;"> Jumlah</th>
										<th style="width:10%;"> Modal</th>
										<th style="width:10%;"> Total</th>
										<th> Kasir</th>
										<th> Pelanggan</th>
										<th> Tanggal Input</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$koneksi = mysqli_connect("localhost","root","","db_toko");
										$no=1; 
										if(!empty($_GET['cari'])){
											$periode = $_POST['bln'].'-'.$_POST['thn'];
											$no=1; 
											$jumlah = 0;
											$bayar = 0;
											if ($_POST['bln']=='kosong') {
											$sqltahun = mysqli_query($koneksi,"SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, kasir.id_kasir,
												kasir.nama from nota 
											   left join barang on barang.id_barang=nota.id_barang 
											   left join kasir on kasir.id_kasir=nota.id_kasir WHERE nota.tanggal_input LIKE '%".$_POST['thn']."%' 
											   ORDER BY id_nota ASC");
											$hasil = $sqltahun;
											}else{
											$sql1 = mysqli_query($koneksi,"SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, kasir.id_kasir,
												kasir.nama from nota 
											   left join barang on barang.id_barang=nota.id_barang 
											   left join kasir on kasir.id_kasir=nota.id_kasir WHERE nota.periode = '".$periode."' 
											   ORDER BY id_nota ASC");
											$hasil = $sql1;
											}
										}elseif(!empty($_GET['hari'])){
											$hari = $_POST['hari'];
											$no=1; 
											$jumlah = 0;
											$bayar = 0;
											$ex = explode('-', $hari);
											$monthNum  = $ex[1];
											$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
											if($ex[2] > 9)
											{
												$tgl = $ex[2];
											}else{
												$tgl1 = explode('0',$ex[2]);
												$tgl = $tgl1[1];
											}
											$cek = $tgl.' '.$monthName.' '.$ex[0];
											$sql2 = mysqli_query($koneksi,"SELECT nota.* , barang.id_barang, barang.nama_barang,  barang.harga_beli, kasir.id_kasir,
												kasir.nama from nota 
											   left join barang on barang.id_barang=nota.id_barang 
											   left join kasir on kasir.id_kasir=nota.id_kasir WHERE nota.tanggal_input LIKE '%".$cek."%' 
											   ORDER BY id_nota ASC");
											$hasil = $sql2;
										}else{
											$sekarang = date('m-Y');
											$sql3 = mysqli_query($koneksi,"SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, kasir.id_kasir,
												kasir.nama from nota 
											   left join barang on barang.id_barang=nota.id_barang 
											   left join kasir on kasir.id_kasir=nota.id_kasir 
											   where nota.periode = '".$sekarang."'
											   ORDER BY id_nota DESC");
											$hasil = $sql3;
										}
									?>
									<?php 
										$bayar = 0;
										$jumlah = 0;
										$modal = 0;
										foreach($hasil as $isi){ 
											$bayar += $isi['total'];
											$modal += $isi['harga_beli']* $isi['jumlah'];
											$jumlah += $isi['jumlah'];
									?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['jumlah'];?> </td>
										<td>Rp.<?php echo number_format($isi['harga_beli']* $isi['jumlah']);?>,-</td>
										<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
										<td><?php echo $isi['nama'];?></td>
										<td><?php echo $isi['nama_pelanggan'];?></td>
										<td><?php echo $isi['tanggal_input'];?></td>
									</tr>
									<?php $no++; }?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="3">Total Terjual</td>
										<th><?php echo $jumlah;?></td>
										<th>Rp.<?php echo number_format($modal);?>,-</th>
										<th>Rp.<?php echo number_format($bayar);?>,-</th>
										<th style="background:#0bb365;color:#fff;">Keuntungan</th>
										<th style="background:#0bb365;color:#fff;">
											Rp.<?php echo number_format($bayar-$modal);?>,-</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="padding-top:5pc;"></div>
					</div>
				  </div>
              </div>
          </section>
      </section>
	

