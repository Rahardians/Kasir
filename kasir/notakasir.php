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
                  <div class="fa fa-bars tooltips" style="color:#1de9b6" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo" style="color:#1de9b6"><b>KARUNIA PLASTIK</b></a>
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
						<form method="post" action="notakasir.php?cari=ok">
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
										<a href="../excel.php?cari=yes&bln=<?=$_POST['bln'];?>&thn=<?=$_POST['thn'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="../excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						<form method="post" action="notakasir.php?hari=cek">
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
										<a href="../excel.php?hari=cek&tgl=<?= $_POST['hari'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="../excel.php" class="btn btn-info"><i class="fa fa-download"></i>
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