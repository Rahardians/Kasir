 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9">
					<div class="row" style="margin-left:1pc;margin-right:1pc;">
				  <h1>DASHBOARD</h1>
				  <hr>
				  
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
								<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
							</div>
							";	
						}
					?>
				  <?php $hasil_barang = $lihat -> barang_row();?>
				  <?php $hasil_kategori = $lihat -> kategori_row();?>
				  <?php $stok = $lihat -> barang_stok_row();?>
				  <?php $jual = $lihat -> jual_row();?>
                    <div class="row">
                      <!--STATUS PANELS -->
					  <div class="col-md-3">
                      		<div class="panel panel-primary">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Nama Barang</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($hasil_barang);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=barang'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
                      <!-- STATUS PANELS -->
                      	<div class="col-md-3">
                      		<div class="panel panel-success">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Stok Barang</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($stok['jml']);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=barang'>Tabel Barang  <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
                      <!-- STATUS PANELS -->
                      	<div class="col-md-3">
                      		<div class="panel panel-info">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Telah Terjual</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($jual['stok']);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='index.php?page=laporan'>Tabel laporan  <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
                      	<div class="col-md-3">
                      		<div class="panel panel-danger">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Kategori Barang</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($hasil_kategori);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=kategori'>Tabel Kategori  <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
					</div>
				</div>
           </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
			<div class="col-lg-3 ds">
				
			  </div><!-- /col-lg-3 -->
		</div><!-- /row -->
		<hr>
		<div class="row">
			  <?php
			  $koneksi = mysqli_connect("localhost","root","","db_toko");
			  $label = ["January","February","March","April","May","June","July","August","September","October","November","December"];
			  for($bulan = 0;$bulan < 12;$bulan++)
				{
					// produk
					$tahun = date('Y');
					$perbulan = $label[$bulan];
					$query = mysqli_query($koneksi,"select sum(jumlah) as jumlah from nota where tanggal_input LIKE '%".$perbulan."%' AND tanggal_input LIKE '%".$tahun."%';");
					$row = $query->fetch_array();
					$jumlah_produk[] = $row['jumlah'];
					// pendapatan
					$sql = mysqli_query($koneksi,"SELECT SUM(total) as total from nota WHERE tanggal_input LIKE '%".$perbulan."%' AND 
						tanggal_input LIKE '%".$tahun."%';");
					$row2 = $sql->fetch_array();
					$jumlah_pendapatan[] = $row2['total'];
				}
			  ?>

			  <div class="col-md-3">
			  	<h2>Grafik Penjualan Tahun <?php echo $tahun; ?></h2>
			  	<div style="width: 600px;height: 500px">
					<canvas id="myChart"></canvas>
				</div>
			  </div>
			  <div class="col-md-4" style="margin-left: 150px;">
			  	<h2>Grafik Pendapatan Tahun <?php echo $tahun; ?></h2>
			  	<div style="width: 600px;height: 500px">
					<canvas id="penghasilan"></canvas>
				</div>
			  </div>
		  </div>
	  </section>
	  
  </section>
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Barang Terjual',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
		var ctx2 = document.getElementById("penghasilan").getContext('2d');
		var penghasilan = new Chart(ctx2, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Pendapatan',
					data: <?php echo json_encode($jumlah_pendapatan); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				tooltips: {
		         callbacks: {
		            label: function(t, d) {
		               var xLabel = d.datasets[t.datasetIndex].label;
		               var yLabel = t.yLabel >= 1000 ? 'Rp. ' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : '$' + t.yLabel;
		               return xLabel + ': ' + yLabel;
		            }
		         }
		      },
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true,
							callback: function(value, index, values) {
				              if(parseInt(value) >= 1000){
				                return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				              } else {
				                return 'Rp. ' + value;
				              }
				            }
						}
					}]
				}
			}
		});
	</script>
