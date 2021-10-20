 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['kasir'];
	$hasil = $lihat -> kasir($id);
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=kasir"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>KASIR</h3>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<table class="table table-striped">
							<form action="fungsi/edit/edit.php?kasir=edit" method="POST">
								<tr>
									<td>ID Kasir</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_kasir'];?>" name="id_kasir"></td>
								</tr>
								<tr>
									<td>Username</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['user'];?>" name="user"></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" class="form-control" value="<?php echo $hasil['pass'];?>" name="pass"></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['nama'];?>" name="nama"></td>
								</tr>
								
								<tr>
									<td>Pertanyaan</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['pertanyaan'];?>" name="pass" disabled></td>
								</tr>
								<tr>
									<td>Jawaban</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['jawaban'];?>" name="nama" disabled></td>
								</tr>
								
								<tr>
									<td></td>
									<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
								</tr>
							</form>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
