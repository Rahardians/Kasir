 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['admin'];
	$hasil = $lihat -> admin($id);
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=admin"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>ADMIN</h3>
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
							<form action="fungsi/edit/edit.php?admin=edit" method="POST">
								<tr>
									<td>ID Admin</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_login'];?>" name="id_login"></td>
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
