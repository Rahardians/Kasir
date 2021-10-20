 <!--sidebar end-->

      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Admin</h3>
						<br/>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						
						<?php 
							$sql=" select * from barang where stok <= 3";
							$row = $config -> prepare($sql);
							$row -> execute();
							$r = $row -> rowCount();
							if($r > 0){
						?>	
						<?php
								echo "
								<div class='alert alert-warning'>
									<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
									<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
								</div>
								";	
							}
						?>

						<!-- Trigger the modal with a button -->
						
						<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
						
						<a href="index.php?page=admin" style="margin-right :0.5pc;" 
							class="btn btn-success btn-md pull-right">
							<i class="fa fa-refresh"></i> Refresh Data</a>
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th style="width:10%;">No.</th>
										<th>User</th>
										<th>Nama</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$hasil = $lihat -> admin_user();
									
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['user'];?></td>
										<td><?php echo $isi['nama'];?></td>
										<td>
											
										
											<a href="index.php?page=admin/edit&admin=<?php echo $isi['id_login'];?>"><button class="btn btn-warning btn-sm">Edit</button></a>
											<a href="fungsi/hapus/hapus.php?admin=hapus&id_login=<?php echo $isi['id_login'];?>" onclick="javascript:return confirm('Hapus Data barang ?');"><button class="btn btn-danger btn-sm">Hapus</button></a></td>
											
											
									</tr>
								<?php 
									}
								?>
								</tbody>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
						<!-- Modal -->
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
								</div>										
								<form action="fungsi/tambah/tambah.php?kasir=tambah" method="POST">
									<div class="modal-body">
										<table class="table table-striped bordered">
											<tr>
												<td>Username</td>
												<td><input type="text" placeholder="Username" required class="form-control" name="user">
												</td>
											</tr>
											<tr>
												<td>Password</td>
												<td><input type="password" placeholder="Password" required class="form-control" name="pass"></td>
											</tr>
											<tr>
												<td>Nama</td>
												<td><input type="text" placeholder="Nama" required class="form-control"  name="nama"></td>
											</tr>
											<tr>
												<td>Pertanyaan</td>
												<td><select name="pertanyaan" class="form-control">
									                  <option selected="">Pertanyaan</option>
									                  <option value="ibu">Siapa Nama ibu kandung anda</option>
									                  <option value="hewan">Siapa Nama Hewan Peliharaan anda</option>
									                  <option value="kota">Kota yang pertama kali dikunjungi</option>
									                  <option value="barang">Apa Barang Favorit anda</option>
									                  <option value="musik">Apa Judul Musik kesukaan anda</option>
									                </select></td>
											</tr>
											<tr>
												<td>Jawaban</td>
												<td><input type="text" placeholder="Jawaban" required class="form-control"  name="jawaban"></td>
											</tr>
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>
      	</section>
	
