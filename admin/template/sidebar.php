   
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<?php 
  $id = $_SESSION['admin']['id_login'];
  $hasil_profil = $lihat -> admin($id);
?>
      <aside>
          <div id="sidebar"  class="nav-collapse " style="background: black;">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a><img src="assets/img/user/unnamed.jpg" class="img-circle" width="100" height="110"></a></p>
              	  <h5 class="centered"><?php echo $hasil_profil['nama'];?></h5>
              	  <h5 class="centered">( <?php echo $hasil_profil['id_login'];?> )</h5>
              	  	
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Barang <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                      </a>
                      <ul class="sub">
                          <li><a  href="index.php?page=barang">Barang</a></li>
                          <li><a  href="index.php?page=kategori">Kategori</a></li>
                          <!-- <li><a  href="index.php?page=user">User</a></li> -->
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-table"></i>
                          <span>User <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                      </a>
                      <ul class="sub">
                          <li><a  href="index.php?page=admin">Admin</a></li>
                          <li><a  href="index.php?page=kasir">Kasir</a></li>
                      </ul>
                  </li>

                  <li class="">
                      <a href="index.php?page=laporan">
                          <i class="fa fa-folder-open-o"></i>
                          <span>Laporan Penjualan</span>
                      </a>
                  </li>

                  <li class="">
                      <a href="index.php?page=cetaknota">
                          <i class="fa fa-print"></i>
                          <span>Cetak Nota</span>
                      </a>
                  </li>

                  <!-- <li class="">
                      <a href="index.php?page=jual">
                          <i class="fa fa-desktop"></i>
                          <span>Transaksi</span>
                      </a>
                  </li> -->

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cog"></i>
                          <span>Setting <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?page=pengaturan">Pengaturan Toko</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
