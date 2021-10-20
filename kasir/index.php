<?php
session_start();
require '../config.php';
if (!isset($_SESSION["id_kasir"])) {
	echo '<script>window.location="../login.php"</script>';
	exit;
}

$id_kasir=$_SESSION["id_kasir"];
$nama=$_SESSION["nama"];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistem Penjualan Barang Berbasis Web </title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>
    <style>
		.header{background:#328f6b; color:#fff;}
		#main-content{ background:#fff;}
		#hidden {display:none}
	</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg" style="background: black">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" style="color: #1de9b6;" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo" style="color:#1de9b6"><b>KARUNIA PLASTIK</b> <small style="padding-left:5px;font-size:13px;"><?php echo $toko['alamat_toko'];?></small></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                   
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" onclick="javascript: return confirm('Ingin Logout ?');" href="../logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
        <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a><img src="../assets/img/user/unnamed.jpg" class="img-circle" width="100" height="110"></a></p>
              	  <h5 class="centered"><?php echo $nama; ?></h5>
              	  <h5 class="centered">( <?php echo $id_kasir;?> )</h5>
              	  	
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="notakasir.php">
                          <i class="fa fa-desktop"></i>
                          <span>Laporan Penjualan</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="nota.php">
                          <i class="fa fa-folder-open-o"></i>
                          <span>Cetak Ulang Nota</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
    </section>
    <section id="main-content">
    	<section class="wrapper">
          	<h1 align="center">KASIR</h1>
              <div class="row">
                  <div class="col main-chart">
						<br>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<div class="col-sm-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-search"></i> Cari Barang</h4>
								</div>
								<div class="panel-body">
									<input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan : Kode / Nama Barang  [ENTER]">
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-list"></i> Hasil Pencarian</h4>
								</div>
								<div class="panel-body">
									<div id="hasil_cari"></div>
									<div id="tunggu"></div>
									
								</div>
							</div>
						</div>
						

						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-shopping-cart"></i> KASIR
									<a class="btn btn-danger pull-right" style="margin-top:-0.5pc;" href="../fungsi/hapus/hapus.php?penjualan_kasir=jual">
										<b>RESET KERANJANG</b></a>
									</h4>
								</div>
								<div class="panel-body">
									<div id="keranjang">
										<table class="table table-bordered">
											<tr>
												<td><b>Tanggal</b></td>
												<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
											</tr>
										</table>
										<table class="table table-bordered" id="example1">
											<thead>
												<tr>
													<td> No</td>
													<td> Nama Barang</td>
													<td> Satuan</td>
													<td style="width:10%;"> Jumlah</td>
													<td style="width:20%;"> Total</td>
													<td> Kasir</td>
													<td> Aksi</td>
												</tr>
											</thead>
											<tbody>
												<?php 
												$db = mysqli_connect("localhost","root","","db_toko");
												$sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang, kasir.id_kasir,
														kasir.nama from penjualan 
													   left join barang on barang.id_barang=penjualan.id_barang 
													   left join kasir on kasir.id_kasir=penjualan.id_kasir
													   ORDER BY id_penjualan";
													   $result = mysqli_query($db,$sql) ?>
												<?php $total_bayar=0; $no=1; $hasil_penjualan = $result;?>
												<?php foreach($hasil_penjualan  as $isi){;?>
												<tr>
													<td><?php echo $no;?></td>
													<td><?php echo $isi['nama_barang'];?></td>
													<td><?php echo $isi['satuan'];?></td>
													<td>
												<!-- aksi ke table penjualan -->
												<form method="POST" action="../fungsi/edit/edit.php?jual_kasir=jual">
														<input type="number" name="jumlah" value="<?php echo $isi['jumlah'];?>" class="form-control">
														<input type="hidden" name="id" value="<?php echo $isi['id_penjualan'];?>" class="form-control">
														<input type="hidden" name="id_barang" value="<?php echo $isi['id_barang'];?>" class="form-control">
													</td>
													<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
													<td><?php echo $isi['nama'];?></td>
													<td>
														<button type="submit" class="btn btn-warning">Update</button>
												</form>
												<!-- aksi ke table penjualan -->
														<a href="../fungsi/hapus/hapus.php?jual_kasir=jual&id=<?php echo $isi['id_penjualan'];?>&brg=<?php echo $isi['id_barang'];?>
														&jml=<?php echo $isi['jumlah']; ?>"  class="btn btn-danger"><i class="fa fa-times"></i>
														</a>
													</td>
												</tr>
												<?php $no++; $total_bayar += $isi['total'];}?>
											</tbody>
									</table>
									<br/>
									<?php 
									$sql2 ="SELECT SUM(total) as bayar FROM penjualan";
									$result2 = mysqli_query($db,$sql2);
									$hasil = $result2 ?>
									<div id="kasirnya">
										<table class="table table-stripped">
											<?php
											// proses bayar dan ke nota
											if(!empty($_GET['nota'] == 'yes')) {
												$total = $_POST['total'];
												$bayar = $_POST['bayar'];
												if(!empty($bayar))
												{
													$hitung = $bayar - $total;
													if($bayar >= $total)
													{
														$id_barang = $_POST['id_barang'];
														$id_kasir = $_POST['id_kasir'];
														$jumlah = $_POST['jumlah'];
														$total = $_POST['total1'];
														$tgl_input = $_POST['tgl_input'];
														$periode = $_POST['periode'];
														$jumlah_dipilih = count($id_barang);
														$nama_pelanggan = $_POST['nama_pelanggan'];
														$unique = uniqid().date("Y-m-d H:i:s");
														for($x=0;$x<$jumlah_dipilih;$x++){

															$d = array($id_barang[$x],$id_kasir[$x],$jumlah[$x],$total[$x],$bayar,$nama_pelanggan,$tgl_input[$x],$periode[$x]);
															$gg = array($unique,$id_barang[$x],$id_kasir[$x],$jumlah[$x],$total[$x],$bayar,$nama_pelanggan,$tgl_input[$x],$periode[$x]);
															$sql = "INSERT INTO nota (id_barang,id_kasir,jumlah,total,bayar,nama_pelanggan,tanggal_input,periode) VALUES(?,?,?,?,?,?,?,?)";
															$sql2 = "INSERT INTO nota_backup (id_nota,id_barang,id_kasir,jumlah,total,bayar,nama_pelanggan,tanggal_input,periode) VALUES(?,?,?,?,?,?,?,?,?)";
															$row2 = $config->prepare($sql2);
															$row2->execute($gg);
															$row = $config->prepare($sql);
															$row->execute($d);

															// ubah stok barang
															$sql_barang = "SELECT * FROM barang WHERE id_barang = ?";
															$row_barang = $config->prepare($sql_barang);
															$row_barang->execute(array($id_barang[$x]));
															$hsl = $row_barang->fetch();
															
															$stok = $hsl['stok'];
															$idb  = $hsl['id_barang'];

															$total_stok = $stok - $jumlah[$x];
															// echo $total_stok;
															$sql_stok = "UPDATE barang SET stok = ? WHERE id_barang = ?";
															$row_stok = $config->prepare($sql_stok);
															$row_stok->execute(array($total_stok, $idb));
															
														}
													}else{
														echo '<script>alert("Uang Kurang ! Rp.'.$hitung.'");</script>';
													}
												}
											}
											?>
											<!-- aksi ke table nota -->
											<form method="POST" action="index.php?nota=yes#kasirnya">
												<?php foreach($hasil_penjualan as $isi){;?>
													<input type="hidden" name="id_barang[]" value="<?php echo $isi['id_barang'];?>">
													<input type="hidden" name="id_kasir[]" value="<?php echo $isi['id_kasir'];?>">
													<input type="hidden" name="jumlah[]" value="<?php echo $isi['jumlah'];?>">
													<input type="hidden" name="total1[]" value="<?php echo $isi['total'];?>">
													<input type="hidden" name="tgl_input[]" value="<?php echo $isi['tanggal_input'];?>">
													<input type="hidden" name="periode[]" value="<?php echo date('m-Y');?>">
												<?php $no++; }?>
												<tr>
													<td>Total Semua  </td>
													<td><input style="pointer-events: none;" type="text" class="form-control" name="total" value="<?php echo $total_bayar;?>"></td>
												
													<td>Bayar  </td>
													<td><input type="text" class="form-control" name="bayar" value="<?php echo $bayar;?>"></td>
													<td>Nama Pelanggan</td>
													<td><input type="text" class="form-control" name="nama_pelanggan"></td>
													<td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
													<?php  if(!empty($_GET['nota'] == 'yes')) {?>
													 <a class="btn btn-danger" href="../fungsi/hapus/hapus.php?penjualan_kasir=jual">
														<b>RESET</b></a></td><?php }?></td>
												</tr>
											</form>
											<!-- aksi ke table nota -->
											<tr>
												<td>Kembali</td>
												<td><input style="pointer-events: none;" type="text" class="form-control" value="<?php echo $hitung;?>"></td>
												<td></td>
												<td>
													<?php
													$koneksi = mysqli_connect("localhost","root","","db_toko");
													$sqlidnota = mysqli_query($koneksi,"SELECT id_nota from nota_backup ORDER BY id_nota DESC");
													$idnota = mysqli_fetch_array($sqlidnota);
													?>
													<a href="../print.php?nama=<?php echo $nama;?>
													&bayar=<?php echo $bayar;?>&kembali=<?php echo $hitung;?>&id_nota=<?php echo $idnota[0];?>" target="_blank">
													<button class="btn btn-default">
														<i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
													</button></a>
												</td>

											</tr>
										</table>
										<br/>
										<br/>
									</div>
								</div>
							</div>
						</div>
				  </div>
              </div>
    	</section>
    </section>
      


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>

	<script src="../assets/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/datatables/dataTables.bootstrap.min.js"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../assets/js/sparkline-chart.js"></script>    
	<script src="../assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
		//datatable
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable();
		});
	</script>	
		<?php
			$sql=" select * from barang where stok <=3";
			$row = $config -> prepare($sql);
			$row -> execute();
			$q = $row -> fetch();
				if($q['stok'] == 3){	
				if($q['stok'] == 2){	
				if($q['stok'] == 1){	
		?>
		<script type="text/javascript">
		//template
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Peringatan !',
            // (string | mandatory) the text inside the notification
            text: 'stok barang ada yang tersisa kurang dari 3 silahkan pesan lagi !',
            // (string | optional) the image to display on the left
            image: 'assets/img/seru.png',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
            
        });

        return false;
        });
		</script>
        <?php }}}?>
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "",
                    modal: true
                },
                legend: [  ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
        
        
        //angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
		$(document).ready(function(){setTimeout(function(){$(".alert-danger").fadeIn('slow');}, 500);});
		//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
		setTimeout(function(){$(".alert-danger").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-success").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-warning").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);
		
    </script>
		<script>
			$(".modal-create").hide();
			$(".bg-shadow").hide();
			$(".bg-shadow").hide();
			function clickModals(){
				$(".bg-shadow").fadeIn();
				$(".modal-create").fadeIn();
			}
			function cancelModals(){
				$('.modal-view').fadeIn();
				$(".modal-create").hide();
				$(".bg-shadow").hide();
			}
		</script>
<script>
// AJAX call for autocomplete 
$(document).ready(function(){
	$("#cari").change(function(){
		$.ajax({
		type: "POST",
		url: "../fungsi/edit/edit.php?cari_barang_kasir=yes",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
            $("#hasil_cari").hide();
			$("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
		},
          success: function(html){
			$("#tunggu").html('');
            $("#hasil_cari").show();
            $("#hasil_cari").html(html);
		}
	});
	});
});
//To select country name
</script>